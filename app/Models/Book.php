<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'published_at',
        'author_id',
        'genre_id',
        'publisher_id',
        'total_copies'
    ];
    protected $dates = ['published_at'];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function bookUsers(){
        return $this->hasMany(BookUser::class);
    }
}
