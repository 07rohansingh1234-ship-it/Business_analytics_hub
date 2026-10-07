<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Department::factory()->create([
            'name'=>'sales'
        ]);
        Department::factory()->create([
            'name'=>'customer'
        ]);
        Department::factory()->create([
            'name'=>'inventory'
        ]);

          //admin,manager,analyst
        User::factory()->create([
            'name' => 'Alex Jose',
            'email' => 'admin@abcelectronics.com',
            'password'=>'ADMIN',
            'role'=>'admin'
        ]);
        User::factory()->create([
            'name' => 'Joe root',
            'email' => 'joe@abcelectronics.com',
            'password'=>'MANAGER',
            'role'=>'manager'

            
        ]);
        User::factory()->create([
            'name' => 'Ellyse Perry',
            'email' => 'ellyse@abcelectronics.com',
            'password'=>'ANALYST',
            'role'=>'analyst'
        ]);
    }
}
