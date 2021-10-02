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
                                <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">DELETE</button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Adakah anda bersetuju untuk menghapuskan data berikut?</p>

                                                <p>{{ $user->name }}</p>

                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
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
