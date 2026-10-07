<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\DepartmentFacory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class Department extends Model
{
    //defining relationships
    use HasFactory;

   protected $fillable = [
    'name',
    'description',
    'department_id'
   ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
