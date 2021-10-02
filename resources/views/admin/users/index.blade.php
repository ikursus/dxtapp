@extends('layouts.induk')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
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
                    <tbody>
                        @foreach ($senaraiUsers as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-md btn-info">EDIT</a>
                                <button type="button" class="btn btn-md btn-danger">DELETE</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $senaraiUsers->links() !!}

            </div>
            <div class="card-footer">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
            </div>
        </div>

    </div>
</div>

@endsection
