<div class="modal fade" id="modalFormMeja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormMeja">Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="meja" enctype="multipart/form-data">
      @csrf
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">nomor meja</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="nomor_meja" value="" name="nomor_meja">
    </div>
    
    <label for="staticEmail" class="col-sm-4 col-form-label">Kapasitas</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="kapasitas" value="" name="kapasitas">
    </div>

    <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
    <div class="col-sm-8">
      <input type="text"  class="form-control" id="status" value="" name="status">
    </div>  



    
   

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>