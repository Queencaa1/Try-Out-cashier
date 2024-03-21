<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($meja as $m)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $m->nomor_meja }}</td>
            <td>{{ $m->kapasitas }}</td>
            <td>{{ $m->status }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $m->id }}" 
                            data-nomor_meja ="{{ $m->nomor_meja }}"
                            data-kapasitas ="{{ $m->kapasitas }}" 
                            data-status ="{{ $m->status }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('meja.destroy', $m->id) }}" style="display:inline">
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