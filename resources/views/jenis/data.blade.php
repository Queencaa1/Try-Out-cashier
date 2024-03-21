<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nama Jenis</th>
            <th>Kategori Id</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($jenis as $j)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $j->nama_jenis }}</td>
            <td>{{ $j->kategory_id }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $j->id }}" 
                            data-nama_jenis ="{{ $j->nama_jenis }}"
                            data-kategory_id ="{{ $j->kategory_id }}" 
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('jenis.destroy', $j->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $j->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            
        </tr>
        @endforeach
    </tbody>
</table>