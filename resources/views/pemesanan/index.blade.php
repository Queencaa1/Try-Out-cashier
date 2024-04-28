@extends('template.layout')

@push('style')
@endpush
@section('content')
<section class="content">
        <main id="main" class="main">
            <div class="c">
                <div class="pagetitle">
                    <h1>Pemesanan</h1>

                </div><!-- End Page Title -->

                <div class="container">
    {{-- <div class="item header">Header</div> --}}
    <div class="item">
        <ul class="menu-container">
            @foreach ($jenis as $j)
                <li>
                    <h3>{{ $j->nama_jenis }}</h3>
                    <ul class="menu-item" style="cursor: pointer;">
                                        @foreach ($j->menu as $menu)
                                            <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                                <div class="menu-item">
                                                    <div class="menu-name">
                                                        <h6 style=" font-weight: bold;">{{ $menu->nama_menu }}</h6>
                                                    </div>
                                                    <div class="image-menu">
                                                        <img src="{{ asset('storage/' . $menu->image) }}"
                                                            alt="{{ $menu->nama_menu }} Image" style="width: 70px;">
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>


                </div>
          
    
    <div class="item content">
        <h3>Order</h3>
        <ul class="ordered-list">
            <!-- Daftar Pesanan -->
        </ul>
        Total Bayar : <h2 id="total"> 0</h2>
        <div>
            <button id="btn-bayar">Bayar</button>
        </div>
    </div>
</div>
            <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </main><!-- End #main -->
    </section>
@endsection

@push('script')
<script>
        $(function() {
            // Inisialisasi
            const orderedList = [];
            let total = 0;

            const sum = () => {
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0);
            };

            const changeQty = (el, inc) => {
                // Ubah di array
                const id = $(el).closest('li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id);
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;

                // Ubah qty dan ubah subtotal
                const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
                const txt_qty = $(el).closest('li').find('.qty-item')[0];
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

                // Ubah jumlah total
                $('#total').html(sum());
            };

            // Events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1);
            });

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1); // Perbaiki parameter di sini
            });

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id));
                orderedList.splice(index, 1);
                $(this).closest('li').remove(); // Perbaiki pemanggilan remove
                $('#total').html(sum());
            });

            $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data) { // Perbaiki pengejaan di sini
                        console.log(data)
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                        confirmButtonText: `Cetak Nota`
                        // denyButtonText: `Ok`
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota') }}/" +data.notrans)
                                // location.reload()
                            } else if (result.isDenied) {
                                  location.reload()
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error)
                        // Swal.fire('Pemesanan Gagal!')
                    }
                });
            });

            $(".menu-item li").click(function() {
                // Mengambil data
                const menu_clicked = $(this).text();
                const data = $(this)[0].dataset;
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);

                if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    };
                    orderedList.push(dataN);
                    let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`;
                    listOrder += `Sub Total : Rp. ${harga}`;
                    listOrder += `<button class='remove-item'>hapus</button>
                           <button class="btn-dec"> - </button>`;
                    listOrder += `<input class="qty-item"
                                  type="number"
                                  value="1"
                                  style="width:30px"
                                  readonly
                              />
                              <button class="btn-inc">+</button><h2>
                              <span class="subtotal">${harga * 1}</span>
                          </li>`;
                    $('.ordered-list').append(listOrder);
                }
                $('#total').html(sum());
            });
        });
    </script>
@endpush
    <style>
     /* Menentukan gaya untuk daftar menu */
     .menu-item {
        list-style-type: none; /* Menghilangkan bullet points */
        margin: 0;
        padding: 0;
    }

    /* Menentukan gaya untuk setiap elemen menu */
    .menu-item li {
        margin-bottom: 10px; /* Spasi antar elemen menu */
        padding: 10px; /* Padding untuk membuat area klik lebih besar */
        border: 1px solid #ccc; /* Menambahkan border */
        border-radius: 5px; /* Membuat ujung elemen menjadi bulat */
        overflow: hidden; /* Mengatur overflow untuk elemen yang lebih besar dari ukurannya */
        transition: all 0.3s ease; /* Animasi transisi */
    }

    /* Menentukan gaya untuk gambar menu */
    .menu-item li .image-menu img {
        width: 100%; /* Mengisi lebar parent container */
        display: block; /* Menghindari spasi ekstra */
        border-radius: 5px; /* Membuat ujung gambar menjadi bulat */
    }

    /* Menentukan gaya hover pada elemen menu */
    .menu-item li:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambahkan efek bayangan saat dihover */
        transform: translateY(-2px); /* Membuat efek angkat ketika dihover */
    }
        .main {
            display: flex;
        }

        .c {
            width: 400px;
            display: flex;
            flex-direction: column;
        }

        .container {
            border: 1px solid pink;
            padding: 10px; /* Meningkatkan padding */
        }

        .item-content {
            width: 800px;
        }

        .menu-container {
            list-style-type: none;
            padding: 0;
        }

        .menu-container li {
            margin-bottom: 10px; /* Mengatur jarak antara item menu */
        }

        .menu-container li h3 {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 18px;
            background-color: aliceblue;
            padding: 10px 15px; /* Mengatur padding */
            margin: 0; /* Menghilangkan margin */
        }
        .flex-container {
    display: flex;
    gap: 20px; /* Jarak antara elemen-elemen */
}

.menu-container,
.item.content {
    flex: 1; /* Meratakan lebar elemen */
}
/* Style for the content container */
.item.content {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style for the order list */
.ordered-list {
    list-style-type: decimal;
    padding-left: 20px;
}

/* Style for the total payment */
#total {
    color: #ff5733;
    font-size: 24px;
    margin-top: 10px;
}

/* Style for the button */
#btn-bayar {
    background-color: pink;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

/* Style for the button hover effect */
#btn-bayar:hover {
    background-color: pink;
}


    </style>
