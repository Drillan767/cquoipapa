@extends('layouts.admin')

@section('title', 'Clients')

@section('content')

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
                    <button type="button" class="btn btn-outline-primary"><i class="far fa-share-square"></i></button>
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
                            <label for="first_name">Prénom</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Prénom" name="first_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Nom" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="text" class="form-control" id="email" placeholder="Adresse email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Téléphone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="categories">Catégories</label>
                            <select class="new-category-select" id="categories" name="categories[]" multiple="multiple">
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
                            <label for="first_name">Prénom</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Prénom" name="first_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Nom" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="text" class="form-control" id="email" placeholder="Adresse email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Téléphone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Nouveau mot de passe" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="categories">Catégories</label>
                            <select class="edit-category-select" id="categories" name="categories[]" multiple="multiple">
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

    <!-- Modal -->
    <div class="modal fade" id="exported" tabindex="-1" role="dialog" aria-labelledby="exported" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Images exportées</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Les images ont correctement été exportées.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection