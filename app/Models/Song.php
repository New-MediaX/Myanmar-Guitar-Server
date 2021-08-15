<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Author;
use App\Models\Album;

class Song extends Model
{
    use HasFactory;

    protected $table = "songs";

    protected $guarded = [];

    public function author()
    {
        return $this->hasOne(Author::class,'id','author_id');
    }

    public function album()
    {
        return $this->hasOne(Album::class,'id','album_id');
    }

    protected $casts = [
        'is_new' => 'boolean',
        'is_popular' => 'boolean',
    ];
}
