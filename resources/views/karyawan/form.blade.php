<div class="modal fade" id="modalFormKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormKaryawan">Form Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="karyawan" enctype="multipart/form-data">
      @csrf
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nip</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nip" value="" name="nip">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Nik</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nik" value="" name="nik">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Nama</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama" value="" name="nama">
    </div>  

    <label for="staticEmail" class="col-sm-4 col-form-label">Jenis kelamin</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="jenis_kelamin" value="" name="jenis_kelamin">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat lahir</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="tempat_lahir" value="" name="tempat_lahir">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal lahir</label>
    <div class="col-sm-8">
      <input type="date"  class="form-control" id="tanggal_lahir" value="" name="tanggal_lahir">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Telephon</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="telpon" value="" name="telpon">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Agama</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="agama" value="" name="agama">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Status nikah</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="status_nikah" value="" name="status_nikah">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="alamat" value="" name="alamat">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Foto</label>
    <div class="col-sm-8">
      <input type="file"  class="form-control" id="foto" value="" name="foto">
    </div>
    
   

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
