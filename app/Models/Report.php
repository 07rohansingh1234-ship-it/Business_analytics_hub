<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Task;

class Report extends Model
{
    protected $fillable = [
        'task_id',
        'created_by',
        'title',
        'summary',
        'recommendation',
        'attachment',
        'status',
        'manager_feedback',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}