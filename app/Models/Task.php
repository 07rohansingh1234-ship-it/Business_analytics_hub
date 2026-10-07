<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Report;
use App\Models\Dataset;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'dataset_id',
        'assigned_by',
        'assigned_to',
        'priority',
        'status',
        'due_date',
        'remarks'
    ];

    // Task belongs to a Dataset
    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }

    // Manager who assigned the task
    public function manager()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    // Analyst assigned to the task
    public function analyst()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function report()
{
    return $this->hasOne(Report::class);
}
}