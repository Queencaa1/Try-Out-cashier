<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama </th>
                <th>Email</th>
                <th>Password</th>


                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>

                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->password }}</td>



                    <td>

                        <form action="{{ route('register.destroy', $u->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn delete-data btn-danger" data-id="{{ $u->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>