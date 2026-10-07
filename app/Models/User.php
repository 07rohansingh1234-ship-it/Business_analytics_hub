<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Task;
use App\Models\Report;
use App\Models\Department;
use App\Models\Dataset;
use App\Models\AiInsight;




class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'department_id'
    ];
    //defining relationships of user table with other tables

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function uploadedDatasets()
    {
        return $this->hasMany(Dataset::class,'uploaded_by');
    }

   public function assignedTasks()
{
    return $this->hasMany(Task::class, 'assigned_to');
}

public function createdTasks()
{
    return $this->hasMany(Task::class, 'assigned_by');
}

    // public function reports()
    // {
    //     return $this->hasMany(Report::class);
    // }

    // public function aiinsights()
    // {
    //     return $this->hasMany(AiInsight::class);
    // }





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
