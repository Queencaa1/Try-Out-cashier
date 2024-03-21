<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Image</th>
            <th>Deskripsi</th>
            <th>jenis_id</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($menu as $m)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $m->nama_menu }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->image }}</td>
            <td>{{ $m->deskripsi }}</td>
            <td>{{ $m->jenis_id }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $m->id }}" 
                            data-nama_menu ="{{ $m->nama_menu }}"
                            data-harga ="{{ $m->harga }}" 
                            data-image ="{{ $m->image }}"
                            data-deskripsi ="{{ $m->deskripsi }}" 
                            data-jenis_id ="{{ $m->jenis_id }}"
                
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('menu.destroy', $m->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $m->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            

        </tr>
        @endforeach
    </tbody>
</table>