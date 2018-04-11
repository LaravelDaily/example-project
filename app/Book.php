<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['author_id', 'name', 'description', 'image_path'];

    public static $storeValidation = [
        'name' => 'required',
        'author_id' => 'exists:authors,id',
        'book_image' => 'image'
    ];
    public static $updateValidation = [
        'name' => 'required',
        'author_id' => 'exists:authors,id',
        'book_image' => 'image'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
