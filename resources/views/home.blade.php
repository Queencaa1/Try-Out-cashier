<!-- resources/views/home.blade.php -->
@extends('template.layout')

@section('content')
<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tambahkan link CSS, JavaScript, dan lain-lain di sini -->
   
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 50px;
            text-align: center;
        }
        h1 {
            color: #007bff;
            font-size: 48px;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Halaman Home</h1>
        <p>Ini adalah contoh tampilan halaman "home" menggunakan Blade.</p>
        <p>Silakan modifikasi tampilan ini sesuai dengan kebutuhan Anda.</p>
    </div>

    <!-- Tambahkan JavaScript jika diperlukan -->
    <!-- <script src="script.js"></script> -->
</body>
</html>

@endsection
