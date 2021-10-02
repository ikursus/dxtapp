@extends('layouts.induk')

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <h1>Info {{ $user->name }}</h1>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <td>EMAIL</td>
                            <td>{{ $user->email }}</td>
                        </tr>


                        <tr>
                            <td>EMAIL</td>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <td>Memberships</td>
                            <td>
                                <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-membership">Subscribe Membership</button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modal-membership" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form method="POST" action="{{ route('users.memberships.subscribe', $user->id) }}">
                                            @csrf

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Subscribe Membership</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Sila pilih senarai membership yang ingin disubscribe</p>

                                                <div class="form-group">
                                                    <select name="membership_id" class="form-control">
                                                        <option value="">--Pilih Membership--</option>
                                                        @foreach ($memberships as $membership)
                                                        <option value="{{ $membership->id }}">{{ $membership->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

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

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection
