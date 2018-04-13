@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-6 offset-3">
                <a class="btn btn-info btn-sm" href="{{ route('books.index') }}">Back to list</a>
            </div>
        </div>

        <h3 class="page-title text-center">Book</h3>

        <div class="row">
            <div class="col-6 offset-3">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-center">Name</th>
                        <td class="text-center">{{ $book->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Description</th>
                        <td class="text-center">{{ $book->description }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Author</th>
                        <td class="text-center">{{ $book->author->fullname }}</td>
                    </tr>
                    @if($book->image_url)
                        <tr>
                            <td class="text-center" colspan="2">
                                <img width="300px" src="{{ asset($book->image_url) }}" alt="">
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

    </div>

@endsection