<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nama menu</th>
            <th>jumlah</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($stok as $s)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $s->menu->nama_menu }}</td>
            <td>{{ $s->jumlah }}</td>
          


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalFormStok"
                            data-mode = "edit" data-id = "{{ $s->id }}" 
                            data-menu_id="{{ $s->menu_id}}"
                            data-jumlah ="{{ $s->jumlah }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('stok.destroy', $s->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $s->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
        
        </tr>
        @endforeach
    </tbody>
</table>