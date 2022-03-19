<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
</head>

<body>
    <table style="width: 100%" border="1">
        <thead style="height: 40px;">
            <tr>
                <th>No</th>
                <th>Angka</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $angka++ }}</td>
                <td>{{ $d }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>