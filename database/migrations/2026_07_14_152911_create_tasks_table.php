<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); //id,title,description,datasetid,assigned_by,asiigned_by,prioity
            $table->string('title');
            $table->text('description');
            $table->foreignId('dataset_id')->constrained()->cascadeOnDelete();;
            $table->foreignId('assigned_by')->constrained('users');
            $table->foreignId('assigned_to')->constrained('users');
            $table->enum('priority',['high','medium','low'])->default('medium');
            $table->enum('status',['pending','in_progress','completed']);
             $table->date('due_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
