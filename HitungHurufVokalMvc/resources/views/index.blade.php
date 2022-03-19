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
        Kata : <input type="text" name="kata" id="kata">
        <input type="submit" value="hitung">
    </form>
</body>