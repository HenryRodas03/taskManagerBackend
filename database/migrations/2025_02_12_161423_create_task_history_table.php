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
        Schema::create('task_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->tinyInteger('previous_status')->nullable()->comment('0 = Sin iniciar, 1 = En proceso, 2 = Completada, 3 = Anulada');
            $table->tinyInteger('new_status')->comment('0 = Sin iniciar, 1 = En proceso, 2 = Completada, 3 = Anulada');
            $table->timestamp('changed_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_history');
    }
};
