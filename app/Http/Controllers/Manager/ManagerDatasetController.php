<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AiInsight;
use App\Models\Task;
use App\Models\Report;

class ManagerDatasetController extends Controller
{
    /**
     * Display a listing of datasets.
     */
    public function index()
    {
        $datasets = Dataset::with(['department','uploader'])
                    ->latest()
                    ->get();

        return view('manager.datasets.index', compact('datasets'));
    }

    /**
     * Show upload form.
     */
    public function create()
    {
        $departments = Department::all();

        return view('manager.datasets.create', compact('departments'));
    }

    /**
     * Store dataset.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            
            
            'file' => 'required|mimes:csv,xlsx,xls|max:10240'
        ]);

        $file = $request->file('file');

        $path = $file->store('datasets', 'public');

        Dataset::create([

            'title' => $validated['title'],

            

            

            'uploaded_by' => Auth::id(),

            'file_path' => $path,

            'file_name' => $file->getClientOriginalName(),

           
        ]);

        return redirect()
            ->route('manager.datasets.index')
            ->with('success','Dataset uploaded successfully.');
    }

    /**
     * Display dataset.
     */
    public function show(Dataset $dataset)
{
    $file = storage_path('app/public/' . $dataset->file_path);

    $headers = [];
    $rows = [];

    if (file_exists($file)) {

        if (($handle = fopen($file, "r")) !== false) {

            // First row = headings
            $headers = fgetcsv($handle);

            // Read first 50 rows
            while (($data = fgetcsv($handle)) !== false && count($rows) < 50) {
                $rows[] = $data;
            }

            fclose($handle);
        }
    }

    return view('manager.datasets.show', compact(
        'dataset',
        'headers',
        'rows'
    ));
}
public function analytics(Dataset $dataset)
{
    $file = storage_path('app/public/' . $dataset->file_path);

    if (!file_exists($file)) {
        return redirect()->route('manager.datasets.index')
            ->with('error', 'Dataset file not found.');
    }

    $rows = [];

    if (($handle = fopen($file, 'r')) !== false) {

        $headers = fgetcsv($handle);

        while (($data = fgetcsv($handle)) !== false) {

            if (count($headers) == count($data)) {
                $rows[] = array_combine($headers, $data);
            }
        }

        fclose($handle);
    }

    $totalRevenue = 0;
    $totalProfit = 0;
    $orders = count($rows);

    $products = [];
    $cities = [];
    $monthly = [];

    foreach ($rows as $row) {

        $revenue = (float) $row['Revenue'];
        $profit  = (float) $row['Profit'];

        $totalRevenue += $revenue;
        $totalProfit += $profit;

        // Revenue by Product
        $product = $row['Product'];

        $products[$product] = ($products[$product] ?? 0) + $revenue;

        // Revenue by City
        $city = $row['City'];

        $cities[$city] = ($cities[$city] ?? 0) + $revenue;

        // Monthly Revenue
        $month = date('M', strtotime($row['Order Date']));

        $monthly[$month] = ($monthly[$month] ?? 0) + $revenue;
    }

    // Sort
    arsort($products);
    arsort($cities);

    // Keep months in calendar order
    $monthOrder = [
        'Jan','Feb','Mar','Apr','May','Jun',
        'Jul','Aug','Sep','Oct','Nov','Dec'
    ];

    $sortedMonths = [];

    foreach ($monthOrder as $m) {
        if (isset($monthly[$m])) {
            $sortedMonths[$m] = $monthly[$m];
        }
    }

    $average = $orders > 0
        ? round($totalRevenue / $orders, 2)
        : 0;

    // Arrays for ApexCharts
    $productLabels = array_keys($products);
    $productValues = array_values($products);

    $cityLabels = array_keys($cities);
    $cityValues = array_values($cities);

    $monthLabels = array_keys($sortedMonths);
    $monthValues = array_values($sortedMonths);

    return view('manager.datasets.analytics', compact(
        'dataset',
        'totalRevenue',
        'totalProfit',
        'orders',
        'average',
        'productLabels',
        'productValues',
        'cityLabels',
        'cityValues',
        'monthLabels',
        'monthValues'
    ));
}

    /**
     * Show edit form.
     */
    public function edit(Dataset $dataset)
    {
        $departments = Department::all();

        return view('manager.datasets.edit', compact('dataset','departments'));
    }

    /**
     * Update dataset.
     */
    public function update(Request $request, Dataset $dataset)
    {
        $validated = $request->validate([

            'title'=>'required|string|max:255',

            'description'=>'nullable|string',

            'department_id'=>'required|exists:departments,id',

            'file'=>'nullable|mimes:csv,xlsx,xls|max:10240'

        ]);

        if($request->hasFile('file'))
        {
            Storage::disk('public')->delete($dataset->file_path);

            $file = $request->file('file');

            $path = $file->store('datasets','public');

            $dataset->file_path = $path;
            $dataset->file_name = $file->getClientOriginalName();
            $dataset->file_type = $file->getClientMimeType();
            $dataset->file_size = $file->getSize();
        }

        $dataset->title = $validated['title'];
        $dataset->description = $validated['description'];
        $dataset->department_id = $validated['department_id'];

        $dataset->save();

        return redirect()
            ->route('manager.datasets.index')
            ->with('success','Dataset updated successfully.');
    }

    /**
     * Delete dataset.
     */
    public function destroy(Dataset $dataset)
{
    // Get all task IDs of this dataset
    $taskIds = Task::where('dataset_id', $dataset->id)->pluck('id');

    // Delete reports of those tasks
    Report::whereIn('task_id', $taskIds)->delete();

    // Delete tasks
    Task::where('dataset_id', $dataset->id)->delete();

    // Delete AI Insights
    AiInsight::where('dataset_id', $dataset->id)->delete();

    // Delete dataset file
    if ($dataset->file_path && Storage::disk('public')->exists($dataset->file_path)) {
        Storage::disk('public')->delete($dataset->file_path);
    }

    // Delete dataset
    $dataset->delete();

    return redirect()
        ->route('manager.datasets.index')
        ->with('success', 'Dataset deleted successfully.');
}}