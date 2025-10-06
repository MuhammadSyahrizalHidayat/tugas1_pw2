<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $fillable = ['Tanggal Penayangan', 'Jam Penayangan', 'movie_id'];
    public function Showtime_Movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id'); 
    }
}
