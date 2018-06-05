@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="panel-title">Vue d'ensemble</span>
        </div>
        <div class="panel-body row overview">
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-user"></i> 203</h2>
                    <h4>Clients</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-th-list"></i> 12</h2>
                    <h4>Catégories</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <h2><i class="fas fa-cubes"></i> 33</h2>
                    <h4>Objets</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Users -->
    <div class="card">
        <div class="card-header">
            <span class="card-title">Clients</span>
        </div>
        <div class="panel-body clients">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
                <tr>
                    <td>Jill Smith</td>
                    <td>jillsmith@gmail.com</td>
                    <td>04 77 75 93 12</td>
                </tr>
                <tr>
                    <td>Eve Jackson</td>
                    <td>ejackson@yahoo.com</td>
                    <td>04 77 75 93 12</td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>jdoe@gmail.com</td>
                    <td>04 77 75 93 12</td>
                </tr>
                <tr>
                    <td>Stephanie Landon</td>
                    <td>landon@yahoo.com</td>
                    <td>04 77 75 93 12</td>
                </tr>
                <tr>
                    <td>Mike Johnson</td>
                    <td>mjohnson@gmail.com</td>
                    <td>04 77 75 93 12</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
