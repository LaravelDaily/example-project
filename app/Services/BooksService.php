<?php

namespace App\Services;

use App\Book;
use Illuminate\Support\Facades\Storage;

class BooksService
{

    public function store($request)
    {

        if ($request->hasFile('book_image')) {
            $path = $request->book_image->store('public/images');
        }

        $data = $request->all();
        $data['image_path'] = isset($path) ? $path : '';

        return Book::create($data);

    }

    public function update($request, $id)
    {

        $data = $request->all();

        $book = Book::findOrFail($id);

        if ($request->hasFile('book_image')) {
            if ($book->image_path) {
                unlink(storage_path('app/' . $book->image_path));
            }
            $path = $request->book_image->store('public/images');
            $data['image_path'] = $path;
        }


        return $book->update($data);

    }

}