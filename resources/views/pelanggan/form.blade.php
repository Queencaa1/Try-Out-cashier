<div class="modal fade" id="modalFormPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormPelanggan">Form Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="pelanggan" enctype="multipart/form-data">
      @csrf
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama" value="" name="nama">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="email" value="" name="email">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Telepon</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nomor_telepon" value="" name="nomor_telepon">
    </div>  

    <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="alamat" value="" name="alamat">
    </div>

    
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
