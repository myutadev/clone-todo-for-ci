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
            $table->id()->comment('主キー');
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete()->comment;
            $table->string('name')->comment('タスク名');
            $table->text('description')->nullable()->comment('詳細説明');
            $table->integer('priority')->default(1)->comment('優先度');
            $table->integer('status')->default(1)->comment('ステータス');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
