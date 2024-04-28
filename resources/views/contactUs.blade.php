@extends('template.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <style>
        /* Style untuk mempercantik tampilan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }
        h2 {
            font-weight: bold;
            color: #333;
        }
        .address {
            margin-bottom: 20px;
        }
        .map-container {
            margin-bottom: 20px;
        }
        .map {
            height: 400px;
            width: 100%;
        }
        .contact-form {
            margin-bottom: 20px;
        }
        .contact-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }
        .contact-form textarea {
            height: 150px;
        }
        .contact-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }
        h2 {
            font-weight: bold;
            color: #333;
        }
        .address {
            margin-bottom: 20px;
        }
        .address table {
            width: 100%;
            border-collapse: collapse;
        }
        .address th,
        .address td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .address th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        // Fungsi untuk menginisialisasi peta Google Maps
        function initMap() {
            var myLatLng = {lat: -7.797068, lng: 110.370529}; // Ganti dengan koordinat lokasi kantor Anda
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Kantor Kami'
            });
        }
    </script>
</head>
<body>
<div class="container">
        <h1>Contact Us</h1>
        <div class="address">
            <h2>Alamat Lengkap:</h2>
            <table>
                <tr>
                    <th>Jalan</th>
                    <td>Jl. Caringin, Ds. Limbangansari, Kp. Gombong No. 04</td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td>Kota Cianjur</td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td>43325</td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>Indonesia</td>
                </tr>
            </table>
        </div>
    </div>
        <div class="map-container">
        <h2>Google Maps Lokasi Kantor:</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.592048320188!2d107.11291217410515!3d-6.819369166700475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e685288de440d6f%3A0x6a16ae95cd5f15f!2sGg.%20Banten%2C%20Limbangansari%2C%20Kec.%20Cianjur%2C%20Kabupaten%20Cianjur%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1713838740745!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        </div>
        <div class="contact-form">
            <h2>Hubungi Developer</h2>
            <form action="send.email.php" method="POST"> <!-- Ganti submit_form.php dengan file yang menangani form -->
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>

@endsection
