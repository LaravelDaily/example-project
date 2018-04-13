@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="alert alert-danger text-center" role="alert">
                    {{ $errors->first('message') }}
                </div>
            </div>
        </div>
    </div>
@endsection