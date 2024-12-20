<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('label_task', function (Blueprint $table) {
            $table->foreignId('task_id')->constrained();
            $table->foreignId('label_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('label_task');
    }
};
