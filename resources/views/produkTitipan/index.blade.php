@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <!-- < class="card"> -->
    <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
      <div class="card-header">
        <h3 class="card-title">Produk Titipan </h3>
      </div>
      <div class="card-body">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
              </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }} </li>
                     @endforeach
                    </ul>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
              </div>    
      @endif
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProdukTitipan">
         Tambah Produk
      </button>
      <a href="{{ route('menu-pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                    <a href="{{ route('menuexcel') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export XSLX
            </a>
            <button href="{{ route('ikan') }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i> Import </button>
      <div class="mt-3">
            @include('produkTitipan.data')
            @include('produkTitipan.edit')
        </div>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card -->
    @include('produkTitipan.form')
   
  </section>
@endsection

@push('script')

<script>
   $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
       $('.alert-success').slideUp(500)
   })

   $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
     $('.alert-danger').slideUp(500)
   })
  

  </script>
   <!-- dialog hapus data -->
   <script>
   $('.delete-data').on('click', function(e) {
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama}</b> akan di hapus?`,
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak',
                'showDenyButton': true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

</script>
@stack('script')
<script>
  $(document).ready(function() {
    $('#harga_beli').on('input', function() {
                        var hargaBeli = $(this).val();
                        var keuntungan = hargaBeli * 1.7;
                        var hargaJual = Math.ceil(keuntungan / 500) * 500;
                        $('#harga_jual').val(hargaJual);
                    });
    console.log('nip')
$('#modalEdit').on('show.bs.modal', function(e) {
    let button = $(e.relatedTarget)
    let id = $(button).data('id')
    let nama_produk = $(button).data('nama_produk')
    let nama_supplier = $(button).data('nama_supplier')
    let harga_beli = $(button).data('harga_beli')
    let harga_jual = $(button).data('harga_jual')
    let stok = $(button).data('stok')
    let keterangan = $(button).data('keterangan')
    console.log('nip')


    $(this).find('#nama_produk').val(nama_produk)
    $(this).find('#nama_supplier').val(nama_supplier)
    $(this).find('#harga_beli').val(harga_beli)
    $(this).find('#harga_jual').val(harga_jual)
    $(this).find('#stok').val(stok)
    $(this).find('#keterangan').val(keterangan)
  
    $('.form-edit').attr('action',` /produkTitipan/${id}`)
})
document.getElementById("harga_beli").addEventListener("input", function(){
  var harga_beli = parseFloat(this.value);
  var harga_jual = harga_beli * 1.7;
  harga_jual = Math.round(harga_jual);
  document.getElementById("harga_jual").value = harga_jual;
});

  })

  
  </script>
  <script>
    let table = new DataTable('#myTable');
  </script>
@endpush   



