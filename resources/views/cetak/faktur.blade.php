<!-- <body>
    <h2>Caffe Ratna suci</h2>
    <h5>Jl.Limbangansari Kp.gombong</h5>
    <hr>
    <h5>No.Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5>
    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama }}</td>
                <td>{{ number_format($item->menu->harga, 0, ",", ".") }}</td>
                <td>{{ number_format($item->subtotal, 0, ",", ".") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ number_format($transaksi->total_harga, 0, ",", ".") }}</td>
            </tr>
        </tfoot>
    </table>
</body> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            text-align: left;
        }
        h2{
            text-align: center;
        }
        h5{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
        <h2>Caffe Ratna suci</h2>
        <h5>Jl.Limbangansari Kp.gombong</h5>
    </div>
    <hr>
    <h5>No.Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $index => $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga, 0, ",", ".") }}</td>
                <td>{{ number_format($item->subtotal, 0, ",", ".") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($transaksi->total_harga, 0, ",", ".") }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
