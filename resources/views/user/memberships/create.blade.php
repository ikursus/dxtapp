@extends('layouts.induk')

@section('content')

<div class="row">
    <div class="col-12">

        <form method="POST" action="{{ route('user.memberships.store') }}">
        @csrf

        <div class="card">
            <div class="card-body">


                <p>Sila pilih memberships yang ingin dilanggan:</p>

                @forelse ($memberships as $membership)
                    <input type="radio" name="membership_id" value="{{ $membership->id }}"> {{ $membership->name }}<br>
                @empty
                    Tiada rekod membership.
                @endforelse


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </div>
        </div>
        </form>

    </div>
</div>

@endsection
