@extends('layouts.admin')

@section('title', 'Administration')

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="panel-title">Vue d'ensemble</span>
        </div>
        <div class="panel-body row overview">
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-user"></i> {{ count($users) }}</h2>
                    <h4>Clients</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-th-list"></i> {{ $categories }}</h2>
                    <h4>Catégories</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-cubes"></i> {{ $items }}</h2>
                    <h4>Objets</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Users -->
    <div class="card clients">
        <div class="card-header">
            <span class="card-title">Clients</span>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{$user->last_name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
