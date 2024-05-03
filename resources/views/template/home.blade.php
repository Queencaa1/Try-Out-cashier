@extends('template.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin')}}/celestial/template/images/favicon.png" />

    <style>
/* Gaya untuk card transaksi */
.card-transaction {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card-transaction:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-transaction i {
    font-size: 40px;
    color: #007bff;
}

.card-transaction .card-title {
    font-size: 20px;
    font-weight: bold;
    color: #007bff;
    margin-top: 5px;
}

.card-transaction .count {
    font-size: 36px;
    font-weight: bold;
    color: #007bff;
    margin-top: 10px;
}

.card-transaction .card-description {
    color: #6c757d;
}

/* Gaya untuk card stok */
.card-stock {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card-stock:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.card-stock i {
    font-size: 40px;
    color: #28a745;
}

.card-stock .card-title {
    font-size: 20px;
    font-weight: bold;
    color: #28a745;
    margin-top: 15px;
}

.card-stock .count {
    font-size: 36px;
    font-weight: bold;
    color: #28a745;
    margin-top: 10px;
}

.card-stock .card-description {
    color: #6c757d;
}

/* Gaya untuk card pendapatan */
.card-income {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card-income:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.card-income i {
    font-size: 40px;
    color: #dc3545;
}

.card-income .card-title {
    font-size: 20px;
    font-weight: bold;
    color: #dc3545;
    margin-top: 15px;
}

.card-income .sum {
    font-size: 36px;
    font-weight: bold;
    color: #dc3545;
    margin-top: 10px;
}

.card-income .card-description {
    color: #6c757d;
}

/* Gaya untuk top 5 penjualan */
.card-sales {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card-sales:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.card-sales .card-title {
    font-size: 20px;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 15px;
}

.activity-item {
    border-bottom: 1px solid #dee2e6;
    padding: 10px;
    align-items: center;
}

.activity-photo img {
    border-radius: 50%;
    margin-right: 10px;
}

.activity-content {
    flex-grow: 1;
}

.activity-content .fw-bold {
    font-weight: bold;
    color: #343a40;
}

.activity-content .text-muted {
    color: #6c757d;
}
.filter-form {
        display: flex;
        justify-content: flex-end; /* Untuk memindahkan ke kanan */
        align-items: center; /* Untuk mengatur vertikal ke tengah */
    }

    .filter-form label {
        margin-right: 10px; /* Jarak antara label dan input */
    }

    .filter-form input[type="date"] {
        padding: 8px;
        margin-right: 10px; /* Jarak antara input dan tombol */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .filter-form button[type="submit"] {
        padding: 8px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 2px;
        cursor: pointer;
    }

    .filter-form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    </style>
</head>
<body>
<form action="{{ route('transaksi.index') }}" method="GET" class="filter-form">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date">

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date">

    <button type="submit">Filter</button>
</form>
<div class="row">
    <div class="col-xl-6 d-flex grid-margin stretch-card card-transaction">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-shopping-cart mr-2" style="font-size: 40px;"></i>
                <h4 class="card-title d-flex justify-content-center align-items-center">
                    <span>Jumlah Transaksi</span>
                </h4>
                <h2 class="text-primary font-weight-bold justify-content-between align-items-center">
                    <div class="count">{{ $jumlahTransaksi }}</div>
                </h2>
                <p class="card-description text-muted">Transaksi terbaru.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-6 d-flex grid-margin stretch-card card-stock">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-box mr-2" style="font-size: 40px;"></i>
                <h4 class="card-title d-flex justify-content-center align-items-center">
                    <span>Sisa Stok</span>
                </h4>
                <h2 class="text-primary font-weight-bold justify-content-between align-items-center">
                    <div class="count">{{ $totalStok }}</div>
                </h2>
                <p class="card-description text-muted">Sisa Stok Menu</p>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 d-flex grid-margin stretch-card card-income">
    <div class="card">
        <div class="card-body">
            <i class="fas fa-money-bill-alt mr-2" style="font-size: 40px;"></i>
            <h4 class="card-title d-flex justify-content-center align-items-center">
                <span>Total Pendapatan</span>
            </h4>
            <h2 class="text-primary font-weight-bold justify-content-between align-items-center">
                <div class="sum">Rp. {{ $totalPendapatan }}</div>
            </h2>
            <p class="card-description text-muted">Total Pendapatan dari Transaksi</p>
        </div>
    </div>
</div>
<div class="col-xl-12 d-flex grid-margin stretch-card card-sales">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Top 5 Penjualan</h5>
            <div class="activity">
                @foreach ($menuSales as $menu)
                <div class="activity-item d-flex">
                    <div class="activity-photo">
                        <img src="{{ asset('storage/' . $menu->menu->image) }}" alt="{{ $menu->menu->name }}"
                            class="img-thumbnail" width="50">
                    </div>
                    <div class="activity-content ms-3">
                        <!-- Nama menu di atas -->
                        <div class="fw-bold">{{ $menu->menu->nama_menu }}</div>
                        <!-- Terjual di bawah -->
                        <div class="text-muted">Terjual: {{ $menu->total_sales }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Pendapatan per Tanggal</h4>
            </div>
            <div class="card-body">
                <canvas id="totalPendapatanChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan data pendapatan per tanggal dari PHP
    var totalPendapatanData = {!! json_encode($totalPendapatan) !!};

    // Memformat data untuk Chart.js
    var labels = [];
    var data = [];
    totalPendapatanData.forEach(function(item) {
        labels.push(item.tanggal);
        data.push(item.total_pendapatan);
    });

    // Menggambar grafik pendapatan per tanggal
    var ctx = document.getElementById('totalPendapatanlChart').getContext('2d');
    var totalPendapatanChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan per Tanggal',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>

@endsection
