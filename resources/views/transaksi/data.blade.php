<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Metode Pembayaran</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $t->tanggal }}</td>
            <td>{{ $t->total_harga }}</td>
            <td>{{ $t->metode_pembayaran }}</td>
            <td>{{ $t->keterangan }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $t->id }}" 
                            data-tanggal ="{{ $t->tanggal }}"
                            data-total_harga ="{{ $t->total_harga }}" 
                            data-metode_pembayaran ="{{ $t->metode_pembayaran }}"
                            data-keterangan ="{{ $t->keterangan }}" >
                
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('transaksi.destroy', $t->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $t->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            

        </tr>
        @endforeach
    </tbody>
</table>