@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mailchimp</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('mailchimp.store') }}" method="POST">
                        <div class="form-group row">
                            <label class="col-md-2 form-label" for="emails">Emails *</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="10" name="emails" placeholder="Emails separated by space">{{ old('emails') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-2">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
