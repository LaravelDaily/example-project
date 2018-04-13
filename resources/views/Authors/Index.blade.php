@extends('layouts.app')


@section('content')

    <div class="container mt-5">

        <h3>Authors</h3>

        <a class="btn btn-info btn-sm mb-3" href="{{ route('authors.create') }}">Create</a>

        <table class="table table-sripped">
            <thead>
            <tr>
                <th> #</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Books</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->lastname }}</td>
                    <td>{{ $author->books->count() }}</td>
                    <td class="text-center">
                        <a href="{{ route('authors.edit', ['id'=>$author->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('authors.show', ['id'=>$author->id]) }}" class="btn btn-warning btn-sm">View</a>
                        <form action="{{ route('authors.destroy', ['id'=>$author->id]) }}" method="POST" style="display: inline-block;">
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