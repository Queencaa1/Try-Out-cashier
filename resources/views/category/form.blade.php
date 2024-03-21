<div class="modal fade" id="modalFormPemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormPemesanan">Form Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="pemesanan" enctype="multipart/form-data">
      @csrf
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Meja Id</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="meja_id" value="" name="meja_id">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal pemesanan</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="tanggal_pemesanan" value="" name="tanggal_pemesanan">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Jam mulai</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="jam_mulai" value="" name="jam_mulai">
    </div>  

    <label for="staticEmail" class="col-sm-4 col-form-label">Jam selesai</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="jam_selesai" value="" name="jam_selesai">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemesan</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama_pemesan" value="" name="nama_pemesan">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah pelanggan</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="jumlah_pelanggan" value="" name="jumlah_pelanggan">
    </div>

    
   

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>