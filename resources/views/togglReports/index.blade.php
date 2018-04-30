@extends('layouts.app')


@section('content')

    <div class="container mt-5">

        @if(session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif

        <h3>Toggl reports</h3>
        <a class="btn btn-info btn-sm my-4" href="{{ route('togglReports.create') }}">Create</a>
        <table class="table table-sripped">
            <thead>
            <tr>
                <th>#</th>
                <th>User name</th>
                <th>From</th>
                <th>To</th>
                <th>Report</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->user_name }}</td>
                    <td>{{ $report->start_date }}</td>
                    <td>{{ $report->end_date }}</td>
                    <td>
                        <a href="{{ asset('reports/' . $report->file_name . '.pdf') }}" target="_blank">
                            Download
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('togglReports.destroy', ['id' => $report->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="confirm('Are you sure?')">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $reports->links() }}
    </div>

@endsection