@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <!-- < class="card"> -->
      <div class="card-header">
        <h3 class="card-title">Pemesanan </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPemesanan">
         Tambah Pemesanan
      </button>
      <div class="mt-3">
            @include('pemesanan.data')
            @include('pemesanan.edit')
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
    <!-- /.card -->
    @include('pemesanan.form')
   
  </section>
@endsection

@push('scripts')

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
            const meja_id = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${meja_id}</b> akan di hapus?`,
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
    console.log('nip')
$('#modalEdit').on('show.bs.modal', function(e) {
    let button = $(e.relatedTarget)
    let id = $(button).data('id')
    let neja_id = $(button).data('neja_id')
    let tanggal_pemesanan = $(button).data('tanggal_pemesanan')
    let jam_mulai = $(button).data('jam_mulai')
    let jam_selesai = $(button).data('jam_selesai')
    let nama_pemesan = $(button).data('nama_pemesan')
    let jumlah_pelanggan = $(button).data('jumlah_pelanggan')
    console.log('nip')


    $(this).find('#meja_id').val(meja_id)
    $(this).find('#tanggal_pemesanan').val(tanggal_pemesanan)
    $(this).find('#jam_mulai').val(jam_mulai)
    $(this).find('#jam_selesai').val(jam_selesai)
    $(this).find('#nama_pemesan').val(nama_pemesan)
    $(this).find('#jumlah_pelanggan').val(jumlah_pelanggan)

    $('.form-edit').attr('action',` /pemesanan/${id}`)
})
  })
  </script>
  <script>
    let table = new DataTable('#myTable');
  </script>
@endpush   