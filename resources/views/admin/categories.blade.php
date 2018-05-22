@extends('layouts.admin')

@section('content')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_category">
        Nouvelle catégorie
    </button>

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
        <tr>
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
            <td></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="m_new_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="m_new_category" enctype="multipart/form-data">
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
                            <textarea class="form-control" name="category_description" id="category_description" rows="3" placeholder="Description..."></textarea>
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


@endsection