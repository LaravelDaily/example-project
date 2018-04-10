@extends('layouts.app')

@section('content')

    <div class="container">

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
                </table>
            </div>
        </div>

    </div>

@endsection