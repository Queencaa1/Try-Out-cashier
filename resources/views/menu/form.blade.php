<div class="modal fade" id="modalFormMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormMenu">Form Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="menu" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
    <label for="nama_menu" class="col-sm-4 col-form-label">Nama menu</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_menu" value="" name="nama_menu">
    </div>
</div>
<div class="form-group row">
    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="harga" value="" name="harga">
    </div>
</div>
<div class="form-group row">
    <label for="image" class="col-sm-4 col-form-label">Image</label>
    <div class="col-sm-8">
        <input type="file" class="form-control" id="image" value="" name="image">
    </div>
</div>
<div class="form-group row">
    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="deskripsi" value="" name="deskripsi">
    </div>
</div>
<div class="form-group row">
    <label for="jenis_id" class="col-sm-4 col-form-label">Nama jenis</label>
    <div class="col-sm-8">
        <select name="jenis_id" id="jenis_id" class="form-select">
            <option value="" selected disabled>Pilih Nama jenis</option>
            @foreach ($jenis as $j)
                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
            @endforeach
        </select>
    </div>
</div>

  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
