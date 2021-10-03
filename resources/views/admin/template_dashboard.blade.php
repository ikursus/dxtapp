@extends('layouts.induk')

@section('content')

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

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Jumlah Subscription</h3>
                <h1>{{ $subscriptionTotal }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Jumlah Membership</h3>
                <h1>{{ $membershipTotal }}</h1>
            </div>
        </div>
    </div>
</div>


@endsection
