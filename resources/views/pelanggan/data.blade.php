<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pelanggan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->nomor_telepon }}</td>
            <td>{{ $p->alamat }}</td>


            <td>
            <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $p->id }}" 
                            data-nama ="{{ $p->nama }}"
                            data-email ="{{ $p->email }}" 
                            data-nomor_telepon ="{{ $p->nomor_telepon }}"
                            data-alamat ="{{ $p->alamat }}" >
                
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $p->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
        
        </tr>
        @endforeach
    </tbody>
</table>