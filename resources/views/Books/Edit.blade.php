@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-6 offset-3 text-center">

                <h3 class="page-title text-center">Edit Book</h3>

                <form action="{{ route('books.update', ['id'=>$book->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('Books.FormFields')

                    <input type="submit" class="btn btn-info" value="Save">

                </form>

            </div>
        </div>

    </div>

@endsection