<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inputan</title>
</head>

<body>
    <form action="/" method="POST">
        @csrf
        <div>
            Angka 1 : <input type="number" name="angka1" id="angka1" placeholder="angka 1">
        </div>
        <p></p>
        <div>
            Angka 2 : <input type="number" name="angka2" id="angka2" placeholder="angka 2">
        </div>
        <p></p>
        <input type="submit" value="Operasikan">
    </form>
</body>