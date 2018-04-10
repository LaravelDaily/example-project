<?php

namespace App\Services;

use App\Author;
use Illuminate\Http\Request;

class AuthorsService
{

    protected $validationRules = [
        'name' => 'required',
    ];

    public function validate(Request $request)
    {
        $request->validate($this->validationRules);

        return $this;
    }

    public function create($data)
    {
        Author::create($data);
        return $this;
    }

    public function update($id, $data)
    {
        Author::find($id)->update($data);
        return $this;
    }

}