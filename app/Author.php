<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'lastname'];

    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
