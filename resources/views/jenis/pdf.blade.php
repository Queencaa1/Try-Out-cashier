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
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
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
    <h1>Data Jenis</h1>

    <table>
        <thead>
            <tr>
                <th>Makanan</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $j)
            <tr>
                <td>{{ $j->nama_jenis }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
