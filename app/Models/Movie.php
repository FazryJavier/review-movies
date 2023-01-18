<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table='movies';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = true;

    public function role() {
        return $this->hasMany(Role::class, 'movie_id');
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'movie_id');
    }

    public function genre() {
        return $this->belongsToMany(Genre::class, 'genre_movie', 'genre_id', 'movie_id');
    }
}
