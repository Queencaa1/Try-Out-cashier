<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FormController;


class FormController extends Controller
{
    // Method untuk menampilkan formulir
    public function showForm()
    {
        return view('send_email'); // Ubah 'form' dengan nama view Anda
    }

    // Method untuk menangani pengiriman formulir
    public function submitForm(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Kirim email
        Mail::raw($validatedData['message'], function ($message) use ($validatedData) {
            $message->to('suciratnaa84@gmail.com')
                    ->subject('Pesan dari ' . $validatedData['name'])
                    ->from($validatedData['email']);
        });

        // Redirect kembali ke halaman formulir dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
