@extends('layouts.induk')

@section('content')

@php
    $variable = '<input type="text" name="umur">'
@endphp

<p>{{ $variable }}</p>

<p>{!! $variable !!}</p>

{{-- comment --}}
<!-- comment -->
<?php // ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAMA</th>
            <th>EMAIL</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($senaraiPelajar as $seorangPelajar)
        <tr>
            <td>{{ $seorangPelajar['id'] }}</td>
            <td>{{ $seorangPelajar['nama'] }}</td>
            <td>{{ $seorangPelajar['email'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
