<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\AiInsight;
use App\Models\Dataset;
use Illuminate\Support\Facades\Auth;

class ManagerAiInsightController extends Controller
{
    /**
     * Display all AI insights of logged-in manager.
     */
    public function index()
    {
        $insights = AiInsight::with('dataset')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('manager.ai-insights.index', compact('insights'));
    }

    /**
     * Show AI insights for a dataset.
     */
    public function show(Dataset $dataset)
    {
        if ($dataset->uploaded_by != Auth::id()) {
            abort(403);
        }

        $insights = AiInsight::where('dataset_id', $dataset->id)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('manager.ai-insights.show', compact('dataset', 'insights'));
    }

    /**
     * Generate AI insights.
     */
    public function generate(Dataset $dataset)
    {
        if ($dataset->uploaded_by != Auth::id()) {
            abort(403);
        }

        AiInsight::where('dataset_id', $dataset->id)->delete();

        $file = storage_path('app/public/' . $dataset->file_path);

        if (!file_exists($file)) {
            return back()->with('error', 'Dataset file not found.');
        }

        $rows = [];

        if (($handle = fopen($file, "r")) !== false) {

            $headers = fgetcsv($handle);

            if (!$headers) {
                return back()->with('error', 'Invalid CSV file.');
            }

            // Trim header names
            $headers = array_map('trim', $headers);

            while (($data = fgetcsv($handle)) !== false) {

                if (empty(array_filter($data))) {
                    continue;
                }

                if (count($headers) != count($data)) {
                    continue;
                }

                $rows[] = array_combine($headers, $data);
            }

            fclose($handle);
        }

        if (count($rows) == 0) {
            return back()->with('error', 'Dataset is empty.');
        }

        $totalRevenue = 0;
        $totalProfit = 0;

        $products = [];
        $cities = [];

        foreach ($rows as $row) {

            $revenue = (float) ($row['Revenue'] ?? 0);
            $profit = (float) ($row['Profit'] ?? 0);

            $product = $row['Product'] ?? 'Unknown';
            $city = $row['City'] ?? 'Unknown';

            $totalRevenue += $revenue;
            $totalProfit += $profit;

            $products[$product] = ($products[$product] ?? 0) + $revenue;
            $cities[$city] = ($cities[$city] ?? 0) + $revenue;
        }

        arsort($products);
        arsort($cities);

        $topProduct = array_key_first($products);
        $topCity = array_key_first($cities);

        $insights = [

            [
                'question' => 'How many records are present?',
                'answer' => count($rows) . ' records found.'
            ],

            [
                'question' => 'What is the total revenue?',
                'answer' => '₹ ' . number_format($totalRevenue, 2)
            ],

            [
                'question' => 'What is the total profit?',
                'answer' => '₹ ' . number_format($totalProfit, 2)
            ],

            [
                'question' => 'Which product generated the highest revenue?',
                'answer' => $topProduct ?? 'N/A'
            ],

            [
                'question' => 'Which city generated the highest revenue?',
                'answer' => $topCity ?? 'N/A'
            ],

            [
                'question' => 'AI Recommendation',
                'answer' => $topProduct && $topCity
                    ? "Increase inventory of {$topProduct} in {$topCity}."
                    : 'Not enough data to generate recommendations.'
            ],

            [
                'question' => 'Business Suggestion',
                'answer' => $topCity
                    ? "Focus marketing campaigns on {$topCity}."
                    : 'Not enough data.'
            ],

        ];

        foreach ($insights as $insight) {

            AiInsight::create([
                'dataset_id' => $dataset->id,
                'user_id' => Auth::id(),
                'question' => $insight['question'],
                'answer' => $insight['answer'],
            ]);
        }

        return redirect()
            ->route('manager.ai-insights.show', $dataset)
            ->with('success', 'AI Insights generated successfully.');
    }
}