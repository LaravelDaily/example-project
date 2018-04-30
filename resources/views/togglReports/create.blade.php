@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-6 offset-3">
                <a class="btn btn-info btn-sm" href="{{ route('togglReports.index') }}">Back to list</a>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">

                <h3 class="page-title">Create Report</h3>

                <form action="{{ route('togglReports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="report_title">Report tile</label>
                        <input name="report_title" type="text" id="report_title" placeholder="Report title" class="form-control {{ $errors->has('report_title') ? 'is-invalid' : '' }}" required>
                        @if($errors->has('report_title'))
                            <p class="invalid-feedback">
                                {{ $errors->first('report_title') }}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                        @if($errors->has('start_date'))
                            <p class="invalid-feedback">
                                {{ $errors->first('start_date') }}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="end_date">End date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                        @if($errors->has('end_date'))
                            <p class="invalid-feedback">
                                {{ $errors->first('end_date') }}
                            </p>
                        @endif
                    </div>

                    <input type="submit" class="btn btn-info" value="Create">
                </form>

            </div>
        </div>

    </div>

@endsection