<html>
<head>
</head>
<body>

@include('togglReports.pdf.partials.header')

<main style="margin-left: 45px; margin-right: 60px;">
    <span style="font-size: 30px"><strong>Total: </strong>{{ $totalTime }}</span>
    <br>
    <ul>
        @foreach($entries as $description => $time)
            <li style="font-size: 20px">{{ ucfirst($description) }} - <strong><em>{{ $time }}</em></strong></li>
        @endforeach
    </ul>
</main>
</body>
</html>