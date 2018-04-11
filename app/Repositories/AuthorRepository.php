<?php

namespace App\Repositories;

use App\Author;

class AuthorRepository {

    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getAuthorsByBooksSold()
    {
        $authors = $this->author->with('books')->get()->sortByDesc(function($author)
        {
            return $author->books->count();
        });

        return $authors;
    }

}