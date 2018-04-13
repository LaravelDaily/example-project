@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-6 offset-3">
                <a class="btn btn-info btn-sm" href="{{ route('authors.index') }}">Back to list</a>
            </div>
        </div>

        <h3 class="text-center">Author</h3>

        <div class="row">
            <div class="col-6 offset-3">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Name</th>
                        <td class="text-center">{{ $author->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">lastname</th>
                        <td class="text-center">{{ $author->lastname }}</td>
                    </tr>
                </table>

                <h3 class="text-center mt-5">Books</h3>

                <table class="table table-bordered table-stripped">
                    <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($author->books as $book)
                        <tr>
                            <td class="text-center">{{ $book->name }}</td>
                            <td class="text-center">{{ $book->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Empty</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection