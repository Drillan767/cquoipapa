@extends('layouts.admin')

@section('content')

    <h3>{{ $category->title }}</h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_item">
        Nouvel objet
    </button>

    {{ dd($items) }}

    <div class="align-images">
        @if($items)

        @endif
    </div>

    <div class="modal fade" id="m_new_item" tabindex="-1" role="dialog" aria-labelledby="m_new_item" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="new_item" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvel objet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="item_title">Titre</label>
                            <input type="text" class="form-control" id="item_title" placeholder="Titre" name="item_title">
                        </div>
                        <div class="form-group">
                            <label for="item_description">Description</label>
                            <textarea class="form-control" name="item_description" id="item_description" rows="3" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="item_illustration">Illustration</label>
                            <input type="file" class="form-control-file" name="item_illustration[]" id="item_illustration" multiple="multiple">
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