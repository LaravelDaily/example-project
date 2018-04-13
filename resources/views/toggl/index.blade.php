@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="alert alert-success text-center" role="alert">
                    Hello, {{ $me->data->fullname }}
                </div>
            </div>
        </div>
    </div>
@endsection