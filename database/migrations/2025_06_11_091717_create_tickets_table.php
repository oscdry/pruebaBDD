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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description'); 
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps(); 

            
            $table->foreign('assigned_to')->references('id')->on('administrators')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('ticket_types')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
