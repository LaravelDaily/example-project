@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">
                    Time entries
                </h3>
                <h5>
                    From: {{ $startDate }}
                </h5>
                <h5>
                    To: {{ $endDate }}
                </h5>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Start</th>
                        <th>Stop</th>
                        <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($timeEntries as $entry)
                        <tr>
                            <td>{{ $entry->description ?? '-'}}</td>
                            <td>{{ \Carbon\Carbon::parse($entry->start)->format('Y-m-d H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($entry->stop)->format('Y-m-d H:i:s') }}</td>
                            <td>{{ gmdate("H:i:s", $entry->duration) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No time entries</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection