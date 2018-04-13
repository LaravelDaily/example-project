@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-6 offset-3">
                <a class="btn btn-info btn-sm" href="{{ route('books.index') }}">Back to list</a>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3 text-center">

                <h3 class="page-title text-center">Edit Book</h3>

                <form action="{{ route('books.update', ['id'=>$book->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('books.formFields')

                    <input type="submit" class="btn btn-info" value="Save">

                </form>

            </div>
        </div>

    </div>

@endsection