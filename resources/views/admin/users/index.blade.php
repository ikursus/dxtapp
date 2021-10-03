@extends('layouts.induk')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Jumlah Aktif</h3>
                                <h1>{{ $userActive }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Jumlah Tidak Aktif</h3>
                                <h1>{{ $userInActive }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered" id="datatables">
                    <thead>
                        <tr>
                            <th>BIL</th>
                            <th>NAME</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>TINDAKAN</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($senaraiUsers as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>

                {{-- {!! $senaraiUsers->links() !!} --}}

            </div>
            <div class="card-footer">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
            </div>
        </div>

    </div>
</div>

@endsection

@section('css_custom')
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@push('js_custom')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.datatables') !!}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'tindakan', name: 'tindakan' }
                ]
            });
        });
        </script>
@endpush
