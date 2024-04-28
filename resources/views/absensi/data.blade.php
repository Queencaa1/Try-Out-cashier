<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Masuk</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th>Waktu Keluar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($absensi as $a)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $a->namaKaryawan }}</td>
            <td>{{ $a->tanggalMasuk }}</td>
            <td>{{ $a->waktuMasuk }}</td>
            <td>
    <select name="status" id="status">
        <option value="1" {{ $a->status == '1' ? 'selected' : '' }}>Masuk</option>
        <option value="2" {{ $a->status == '2' ? 'selected' : '' }}>izin</option>
        <option value="3" {{ $a->status == '3' ? 'selected' : '' }}>Cuti</option>
    </select>
</td>

            <td>{{ $a->waktuKeluar }}</td>
    


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $a->id }}" 
                            data-namaKaryawan ="{{ $a->namaKaryawan }}"
                            data-tanggalMasuk ="{{ $a->tanggalMasuk }}" 
                            data-waktuMasuk ="{{ $a->waktuMasuk }}"
                            data-status ="{{ $a->status }}" 
                            data-waktuKeluar ="{{ $a->waktuKeluar }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('absensi.destroy', $a->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $a->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            
            
        </tr>
        @endforeach
    </tbody>
</table>