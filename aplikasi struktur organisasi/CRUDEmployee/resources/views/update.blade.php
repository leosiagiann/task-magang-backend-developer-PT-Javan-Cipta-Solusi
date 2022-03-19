<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Employee</title>

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

    <!-- Tables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <!-- Tables -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="p-3">
            <h1 class="alert-default pb-3">Update Employee</h1>
        </div>
        <form action="{{ url('/employee/update/'.$employee->id) }}" method="POST">
            @method('patch')
            @csrf
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $employee->nama }}"
                        required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="atasan_id" class="col-sm-2 col-form-label">Atasan ID</label>
                <div class="col-sm-5">
                    <select name="atasan_id" id="atasan_id" name="atasan_id" class="form-control">
                        @if ($employee->atasan_id != 0)

                        @foreach ($allemployee as $e)
                        @if ($employee->atasan_id == $e->id)
                        <option value="{{ $e->id }}" selected>{{ $e->nama }}</option>
                        @else
                        <option value="{{ $e->id }}">{{ $e->nama }}</option>
                        @endif
                        @endforeach
                        <option value="0">null</option>

                        @else
                        @foreach ($allemployee as $e)
                        <option value="{{ $e->id }}">{{ $e->nama }}</option>
                        @endforeach
                        <option value="0" selected>null</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="company_id" class="col-sm-2 col-form-label">Company ID</label>
                <div class="col-sm-5">
                    <select name="company_id" id="company_id" name="company_id" class="form-control">
                        <option value="1">PT JAVAN</option>
                        @if ($employee->company_id == 2)
                        <option value="2" selected>PT Dicoding</option>
                        @else
                        <option value="2">PT Dicoding</option>
                        @endif
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>