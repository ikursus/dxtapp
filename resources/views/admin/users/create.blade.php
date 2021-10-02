@extends('layouts.induk')

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">USERNAME</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="">STATUS</label>
                        <select name="status" class="form-control">
                            <option value="">--PILIH STATUS--</option>
                            <option value="active">ACTIVE</option>
                            <option value="pending">PENDING</option>
                            <option value="banned">BANNED</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
