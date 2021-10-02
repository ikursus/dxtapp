@extends('layouts.induk')

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    @include('admin.users.form')

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
