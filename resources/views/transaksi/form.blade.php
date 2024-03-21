<div class="modal fade" id="modalFormTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormTransaksi">Form Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="transaksi" enctype="multipart/form-data">
      @csrf

    <div class="card-body">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="tanggal" value="" name="tanggal">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Total Harga</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="total_harga" value="" name="total_harga">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Metode Pembayaran</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="metode_pembayaran" value="" name="metode_pembayaran">
    </div>  

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


