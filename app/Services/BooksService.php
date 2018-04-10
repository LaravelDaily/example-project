<?php

namespace App\Services;

use App\Book;
use Illuminate\Http\Request;

class BooksService
{

    protected $validationRules = [
        'name' => 'required',
        'author_id' => 'exists:authors,id'
    ];

    public function validate(Request $request)
    {
        $request->validate($this->validationRules);
        return $this;
    }

    public function create($data)
    {
        Book::create($data);
        return $this;
    }

    public function update($id, $data)
    {
        Book::find($id)->update($data);
        return $this;
    }

}