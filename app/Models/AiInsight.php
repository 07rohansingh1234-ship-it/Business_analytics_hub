<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiInsight extends Model
{
    protected $fillable = [
        'dataset_id',
        'user_id',
        'question',
        'answer',
    ];

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}