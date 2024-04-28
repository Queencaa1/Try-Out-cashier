<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form method="post" action="register">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Nama Akun</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" value="" name="name">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="" name="email">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" value="" name="password">
            </div>
        </div>
        <div class="form-group row">
    <label for="level" class="col-sm-4 col-form-label">Level</label>
    <div class="col-sm-8">
        <select class="form-select" id="level" name="level">
            <option value="" selected disabled>Pilih Level</option>
            <option value="1">1</option> <!-- Opsi dengan nilai 1 -->
            <option value="2">2</option> <!-- Opsi dengan nilai 2 -->
            <option value="3">3</option> <!-- Opsi dengan nilai 3 -->
            <option value="4">4</option> <!-- Opsi dengan nilai 4 -->
            <option value="5">5</option> <!-- Opsi dengan nilai 5 -->
        </select>
    </div>
</div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>


<div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('absensi/import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
