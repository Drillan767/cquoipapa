@extends('layouts.admin')

@section('content')

    <div class="col-md-8 offset-md-2">

        <div class="add">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_category">
                <i class="fas fa-plus"></i> Nouvelle catégorie
            </button>
        </div>
        <div id="status"></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr id="{{ $category->id }}">
                    <td><a href="/admin/category/{{ $category->id }}">{{ $category->title }}</a></td>
                    <td>{{ $category->description }}</td>
                    <td><img src="{{ $category->illustration }}" class="thumbnail" alt="{{ basename($category->illustration) }}"></td>
                    <td>
                        @if ($category->actif)
                            <span class="enabled">Actif</span>
                        @else
                            <span class="disabled">Inactif</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#m_delete_category">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Nouvelle catégorie -->
    <div class="modal fade" id="m_new_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="new_category" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvelle catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_title">Titre</label>
                            <input type="text" class="form-control" id="category_title" placeholder="Titre" name="category_title">
                        </div>
                        <div class="form-group">
                            <label for="category_description">Description</label>
                            <textarea
                                class="form-control"
                                name="category_description"
                                id="category_description"
                                rows="3"
                                placeholder="Description..."
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_illustration">Illustration</label>
                            <input type="file" class="form-control-file" name="category_illustration" id="category_illustration">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category_enabled" class="form-check-input" id="category_enabled" checked="checked">
                            <label class="form-check-label" for="category_enabled">Actif</label>
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
    <!-- /nouvelle catégorie -->

    <!-- editer catégorie -->
    <div class="modal fade" id="m_edit_category" tabindex="-1" role="dialog" aria-labelledby="m_edit_category" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit_category" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvelle catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_id">
                        <div class="form-group">
                            <label for="category_title">Titre</label>
                            <input type="text" class="form-control" placeholder="Titre" name="category_title">
                        </div>
                        <div class="form-group">
                            <label for="category_description">Description</label>
                            <textarea
                                    class="form-control"
                                    name="category_description"
                                    rows="3"
                                    placeholder="Description..."
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_illustration">Illustration</label>
                            <input type="file" class="form-control-file" name="category_illustration">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category_enabled" class="form-check-input">
                            <label class="form-check-label" for="category_enabled">Actif</label>
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

    <!-- supprimer catégorie -->
    <div class="modal fade" id="m_delete_category" tabindex="-1" role="dialog" aria-labelledby="m_delete_category" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Êtes-vous sûr de vouloir supprimer ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /editer catégorie -->


@endsection