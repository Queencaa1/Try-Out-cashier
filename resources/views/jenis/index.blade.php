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
        <h3 class="card-title">Jenis </h3>

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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormJenis">
         Tambah Jenis
      </button>
      <a href="{{ route('jenis-pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                    <a href="{{ route('jenisexcel') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export XSLX
            </a>
            <button href="{{ route('ikan') }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i> Import </button>
      <div class="mt-3">
            @include('jenis.data')
            @include('jenis.edit')
        </div>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card -->
    @include('jenis.form')
   
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
    console.log('nip')
$('#modalEdit').on('show.bs.modal', function(e) {
    let button = $(e.relatedTarget)
    let id = $(button).data('id')
    let nama_jenis = $(button).data('nama_jenis')
    let kategory_id = $(button).data('kategory_id')

    console.log('nip')


    $(this).find('#nama_jenis').val(nama_jenis)
    $(this).find('#kategory_id').val(kategory_id)

    $('.form-edit').attr('action',` /jenis/${id}`)
})
  })
  </script>
  <script>
    let table = new DataTable('#myTable');
  </script>
@endpush   