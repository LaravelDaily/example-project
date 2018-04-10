<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['author_id', 'name', 'description'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
