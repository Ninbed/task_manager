<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Task owner
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('status', ['pending', 'started', 'completed'])->default('pending');
        $table->timestamp('due_date')->nullable();
        $table->timestamps();
    });
}

public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
