<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = [
        'title',
        'description',
        'department_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'uploaded_by',
        'status'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function aiInsights()
    {
        return $this->hasMany(AiInsight::class);
    }
}