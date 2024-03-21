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
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Menu</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nama_menu" value="" name="nama_menu">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Harga</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="harga" value="" name="harga">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Image</label>
    <div class="col-sm-8">
      <input type="file"  class="form-control" id="image" value="" name="image">
    </div>  

    <label for="staticEmail" class="col-sm-4 col-form-label">Deskripsi</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="deskripsi" value="" name="deskripsi">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Id</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="jenis_id" value="" name="jenis_id">
    </div>


    
   

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>