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
                            <th>PRICE</th>
                            <th>TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memberships as $membership)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $membership->name }}</td>
                            <td>{{ $membership->price }}</td>
                            <td>
                                <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-md btn-info">EDIT</a>
                                <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $membership->id }}">DELETE</button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modal-delete-{{ $membership->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form method="POST" action="{{ route('memberships.destroy', $membership->id) }}">
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

                                                <p>{{ $membership->name }}</p>

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

                {!! $memberships->links() !!}

            </div>
            <div class="card-footer">
                <a href="{{ route('memberships.create') }}" class="btn btn-primary">Add Membership</a>
            </div>
        </div>

    </div>
</div>

@endsection
