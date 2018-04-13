@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->has('message'))
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="alert alert-danger text-center" role="alert">
                        {{ $errors->first('message') }}
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="mb-3">
                        Get time entries:
                    </div>
                    <form action="{{ route('toggl.timeEntries') }}" method="GET">
                        <div class="form-group"><label>From:</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group"><label>To:</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-info" value="Submit">
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection