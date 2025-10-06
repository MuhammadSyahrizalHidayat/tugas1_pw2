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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('Judul Film',30);                   
            $table->string('Genre',10);                         
            $table->text('Sinopsis Film');        
            $table->integer('Durasi Film');         
            $table->date('Tanggal Rilis');       
            $table->string('Bahasa')->nullable();          
            $table->decimal('Rating', 4, 2);     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
