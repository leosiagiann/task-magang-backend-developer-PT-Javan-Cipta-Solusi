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
    <div class="container">
        <table class="table table-bordered">
            <thead style="border: 1px solid #000000">
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>Posisi</td>
                    <td>Perusahaan</td>
                </tr>
            </thead>
            <tbody style="border: 1px solid #000000">
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
</body>

</html>