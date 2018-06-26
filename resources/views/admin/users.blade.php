@extends('layouts.admin')

@section('title', 'Clients')

@section('content')

    {{--{{ dd($categories) }}--}}

    <div class="add">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_user">
            <i class="fas fa-plus"></i> Nouveau client
        </button>
    </div>

    <table class="table table-striped table-hover users">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Appels API</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr id="{{ $user->id }}">
                <td>{{ $user->first_name .  ' ' . $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ chunk_split($user->phone, 2, ' ') }}</td>
                <td>{{ $user->nb_api_call }}</td>
                <td>
                    <button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>
                    <button type="button" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="modal fade" id="m_new_user" tabindex="-1" role="dialog" aria-labelledby="m_new_user" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="new_user" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouveau client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_first_name">Prénom</label>
                            <input type="text" class="form-control" id="user_first_name" placeholder="Prénom" name="user_first_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="user_last_name">Nom</label>
                            <input type="text" class="form-control" id="user_last_name" placeholder="Nom" name="user_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Adresse email</label>
                            <input type="text" class="form-control" id="user_email" placeholder="Adresse email" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Téléphone</label>
                            <input type="text" class="form-control" id="user_phone" placeholder="Téléphone" name="user_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="user_categories">Catégories</label>
                            <select class="new-category-select" id="user_categories" name="user_categories[]" multiple="multiple">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="m_edit_user" tabindex="-1" role="dialog" aria-labelledby="m_edit_user" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit_user" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvel objet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_first_name">Prénom</label>
                            <input type="text" class="form-control" id="user_first_name" placeholder="Prénom" name="user_first_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="user_last_name">Nom</label>
                            <input type="text" class="form-control" id="user_last_name" placeholder="Nom" name="user_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Adresse email</label>
                            <input type="text" class="form-control" id="user_email" placeholder="Adresse email" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Téléphone</label>
                            <input type="text" class="form-control" id="user_phone" placeholder="Téléphone" name="user_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="user_categories">Catégories</label>
                            <select class="edit-category-select" id="user_categories" name="user_categories[]" multiple="multiple">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="m_delete_user" tabindex="-1" role="dialog" aria-labelledby="m_delete_user" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel objet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>


@endsection