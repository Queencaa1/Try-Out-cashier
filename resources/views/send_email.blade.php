@extends('template.layout')

@section('content')
<?php
// Cek apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Konfigurasi penerima email
    $to = "suciratnaa84@gmail.com"; // Ganti dengan alamat email penerima
    $subject = "Pesan dari $name"; // Subjek email

    // Konten email
    $email_content = "Nama: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Pesan:\n$message\n";

    // Header email
    $headers = "From: $name <$email>";

    // Kirim email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Email berhasil terkirim.";
    } else {
        echo "Maaf, ada masalah dalam pengiriman email.";
    }
} else {
    // Jika bukan metode POST, redirect kembali ke halaman form
    header("Location: contact_form.html"); // Ganti dengan nama file form Anda
}
?>
@endsection
