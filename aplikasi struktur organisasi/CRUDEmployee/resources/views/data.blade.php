<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Export Employee</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <!-- Bootstrap -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <text class="navbar-brand">Magang Leonardo</text>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/company') }}">Company</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="p-3">
            <h1 class="alert-default pb-3">Employee</h1>
            <a href="{{ url('/employee/export_pdf') }}"><button class="btn btn-primary mb-3">Eksport PDF</button></a>
            <a href="{{ url('/employee/export_excel') }}"><button class="btn btn-primary mb-3">Eksport
                    Excel</button></a>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>nama</td>
                        <td>Posisi</td>
                        <td>Perusahaan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $e)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $e->nama }}</td>
                        <td>
                            @if($e->atasan_id == 0)
                            CEO
                            @elseif($e->atasan_id == 1)
                            Direktur
                            @elseif($e->atasan_id == 2 || $e->atasan_id == 3)
                            Manager
                            @else
                            Staff
                            @endif
                        </td>
                        <td>{{ $e->company->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>