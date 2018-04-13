@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-6 offset-3">
                <a class="btn btn-info btn-sm" href="{{ route('authors.index') }}">Back to list</a>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3 text-center">

                <h3 class="page-title text-center">Edit Author</h3>

                <form action="{{ route('authors.update', ['id'=>$author->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('authors.formFields')

                    <input type="submit" class="btn btn-info" value="Save">

                </form>

            </div>
        </div>

    </div>

@endsection