<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>

    <style>
       /* Gaya CSS untuk tampilan PDF */
body {
    font-family: Arial, sans-serif;
    
    color: #333;
}

h1 {
    color: #007bff; /* Biru */
    text-align: center;
    margin-top: 20px;
}

table {
    width: 50%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
}

th {
    background-color: #007bff; /* Biru */
    color: #fff; /* Putih */
}

tr:nth-child(even) {
    background-color: #f2f2f2; /* Abu-abu muda */
}

tr:hover {
    background-color: #ddd; /* Abu-abu terang saat hover */
}

    </style>
</head>
<body>
    <h1>Data Karyawan</h1>

    <table>
        <thead>
            <tr>
                <th>Nip</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Tempat lahir</th>
                <th>Tanggal lahir</th>
                <th>Telephon</th>
                <th>Agama</th>
                <th>Status Nikah</th>
                <th>Alamat</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
            <tr>
                <td>{{ $k->nip }}</td>
                <td>{{ $k->nik }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->tempat_lahir }}</td>
                <td>{{ $k->tanggal_lahir }}</td>
                <td>{{ $k->telephon }}</td>
                <td>{{ $k->agama }}</td>
                <td>{{ $k->status_nikah }}</td>
                <td>{{ $k->alamat }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
