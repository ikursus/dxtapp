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
                        {{-- @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subscription->membership->name }}</td>
                            <td>{{ $subscription->membership->price }}</td>
                            <td>

                            </td>
                        </tr>
                        @endforeach --}}
                        @forelse ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subscription->membership->name }}</td>
                            <td>{{ $subscription->membership->price }}</td>
                            <td>

                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tiada rekod subscription</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>

    </div>
</div>

@endsection
