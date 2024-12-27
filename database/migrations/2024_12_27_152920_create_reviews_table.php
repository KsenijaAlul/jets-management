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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jet_id')->constrained()->onDelete('cascade');  
            $table->string('reviewer_name');
            $table->text('text');
            $table->integer('rating')->unsigned()->check('rating >= 1 AND rating <= 5');
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
