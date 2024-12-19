<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{   
    protected $fillable = [
        'title',
        'name',
        'description',
        'priority',
        'status',
    ];


    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name',100)->nullable(false);
            $table->text('description')->nullable();
            $table->integer('priority')->default(1)->nullable(false);
            $table->integer('status')->default(1)->nullable(false);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }


};