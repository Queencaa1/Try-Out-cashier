<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
        <th>No</th>
            <th>Nip</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Tempat lahir</th>
            <th>Tanggal lahir</th>
            <th>Telephon</th>
            <th>Agama</th>
            <th>Status Nikah</th>
            <th>Alamat</th>
            <th>Foto</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($karyawan as $k)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $k->nip }}</td>
            <td>{{ $k->nik }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->jenis_kelamin }}</td>
            <td>{{ $k->tempat_lahir }}</td>
            <td>{{ $k->tanggal_lahir }}</td>
            <td>{{ $k->telpon }}</td>
            <td>{{ $k->agama }}</td>
            <td>{{ $k->status_nikah }}</td>
            <td>{{ $k->alamat }}</td>
            <td>{{ $k->foto }}</td>


            <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $k->id }}" data-nip ="{{ $k->nip }}"
                            data-nik ="{{ $k->nik }}" data-nama ="{{ $k->nama }}"
                            data-jenis_kelamin ="{{ $k->jenis_kelamin }}" data-tempat_lahir ="{{ $k->tempat_lahir }}"
                            data-tanggal_lahir ="{{ $k->tanggal_lahir }}" data-telpon ="{{ $k->telpon }}"
                            data-agama ="{{ $k->agama }}" data-status_nikah ="{{ $k->status_nikah }}"
                            data-alamat ="{{ $k->alamat }}" data-foto ="{{ $k->foto }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('karyawan.destroy', $k->id) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-id="{{ $k->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            
            
            <!-- <td>
                <button class="btn"  data-toggle="modal" data-target="#editKaryawanModal"
                 data-mode="edit" 
                 data-id="{{ $k->nip }}" 
                 data-nama="{{ $k->nik }}"
                 data-nama="{{ $k->nama }}"
                 data-nama="{{ $k->jenis_kelamin }}"
                 data-nama="{{ $k->tempat_lahir }}"
                 data-nama="{{ $k->telpon }}"
                 data-nama="{{ $k->agama }}"
                 data-nama="{{ $k->status_nikah }}"
                 data-nama="{{ $k->alamat}}"
                 data-nama="{{ $k->foto }}"
                 
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('karyawan.destroy', $k->nip) }}" style="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-nama="{{ $k->nama }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>