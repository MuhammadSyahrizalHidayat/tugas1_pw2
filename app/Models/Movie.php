<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['Judul Film', 'Genre', 'Sinopsis', 'Durasi', 'Tanggal Rilis', 'Bahasa', 'Rating'];
    public function Movie_Showtime(){
        return $this->hasMany(Showtime::class); //1 to n
    }
}
