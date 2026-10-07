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
        Schema::create('datasets', function (Blueprint $table) {
            $table->id(); //id,title,type,filename,filepath,uploadedby,status
            $table->string('title');
            $table->enum('type',['sales','customers','inventory']);
            $table->string('file_name');
            $table->string('file_path');
            $table->foreignId('uploaded_by')->constrained('users');
            $table->enum('status',['uploaded','processing','completed','failed'])->default('uploaded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
