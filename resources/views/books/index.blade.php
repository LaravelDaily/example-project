@extends('layouts.app')


@section('content')

    <div class="container mt-5">

        <h3>Books</h3>
        <a class="btn btn-info btn-sm mb-3" href="{{ route('books.create') }}">Create</a>
        <table class="table table-sripped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Author</th>
                <th>Image</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author->fullname }}</td>
                    <td>
                        <img width="100px;" src="{{ $book->image_url ? asset($book->image_url) : '' }}" alt="">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('books.edit', ['id'=>$book->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('books.show', ['id'=>$book->id]) }}" class="btn btn-warning btn-sm">View</a>
                        <form action="{{ route('books.destroy', ['id'=>$book->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="confirm('Are you sure?')">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>


    </div>

@endsection