@extends('layouts.admin')

@section('title', 'Clients')

@section('content')
    <table class="table table-striped table-hover">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>John Smith</td>
                <td>{{ $user->email }}</td>
                <td>04 77 75 93 12</td>
            </tr>
        @endforeach
    </table>
@endsection