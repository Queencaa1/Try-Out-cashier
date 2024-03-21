<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Meja id</th>
            <th>Tanggal pemesanan</th>
            <th>Jam mulai</th>
            <th>Jam selesai</th>
            <th>Nama pemesan</th>
            <th>Jumlah pelanggan</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pemesanan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->meja_id }}</td>
            <td>{{ $p->tanggal_pemesanan }}</td>
            <td>{{ $p->jam_mulai }}</td>
            <td>{{ $p->jam_selesai }}</td>
            <td>{{ $p->nama_pemesan }}</td>
            <td>{{ $p->jumlah_pelanggan }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit"
                             data-id = "{{ $p->id }}" 
                             data-meja_id ="{{ $p->meja_id }}"
                            data-tanggal_pemesanan ="{{ $p->tanggal_pemesanan }}" 
                            data-jam_mulai ="{{ $p->jam_mulai }}"
                            data-jam_selesai ="{{ $p->jam_selesai }}" 
                            data-nama_pemesan ="{{ $p->nama_pemesan }}"
                            data-jumlah_pelanggan ="{{ $p->jumlah_pelanggan }}" 
                            >
                            
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('pemesanan.destroy', $p->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-nama="{{ $p->meja_id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            
            
          
        </tr>
        @endforeach
    </tbody>
</table>