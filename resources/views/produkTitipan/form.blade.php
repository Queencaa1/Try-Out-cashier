<div class="modal fade" id="modalFormProdukTitipan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormProdukTitipan">Form Produk Titipan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="produkTitipan" enctype="multipart/form-data">
      @csrf
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama_produk" value="" name="nama_produk">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama_supplier" value="" name="nama_supplier">
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Rp.</span>
    </div>
    <input type="number" class="form-control" id="harga_beli" name="harga_beli" oninput="hitungHarga_jual()">
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Rp.</span>
    </div>
    <input type="number" class="form-control" id="harga_jual" name="harga_jual" readonly>
</div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="stok" value="" name="stok">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Keterangan</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="keterangan" value="" name="keterangan">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

