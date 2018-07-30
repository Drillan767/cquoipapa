@extends('layouts.admin')

@section('title', 'Objets')

@section('content')
    <div class="col-md-12">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_item">
            Nouvel objet
        </button>

        <div class="items">
            @if($items)
                @foreach($items as $item)
                    <div class="item" id="{{ $item->id }}">
                        <h3 data-id="{{ $item->id }}">{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>

                        <div class="align-images row">
                            @foreach($item->image as $image)
                                <div class="col-sm-1">
                                    <a data-fancybox="gallery" href="{{ $image->path }}">
                                        <img src="{{ $image->path }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
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
                            <input type="text" class="form-control" id="item_title" placeholder="Titre" name="item_title" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="item_illustration">Illustration</label>
                            <input type="file" class="form-control-file" id="item_illustration" name="item_illustration" required>
                        </div>
                        <div class="form-group">
                            <label for="item_description">Description</label>
                            <textarea class="form-control" name="item_description" id="item_description" rows="3" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="item_illustration">Images</label>
                            <input type="file" class="form-control-file" name="item_images[]" id="item_illustration" multiple="multiple" required>
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

    <div class="modal fade" id="m_edit_item" tabindex="-1" role="dialog" aria-labelledby="m_edit_item" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit_item" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvel objet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="item_title">Titre</label>
                            <input type="text" class="form-control" id="item_title" placeholder="Titre" name="item_title" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="item_illustration">Illustration</label>
                            <input type="file" class="form-control-file" id="item_illustration" name="item_illustration">
                        </div>
                        <div class="form-group">
                            <label for="item_description">Description</label>
                            <textarea class="form-control" name="item_description" required id="item_description" rows="3" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="item_illustration">Images</label>
                            <input type="file" class="form-control-file" name="item_images[]" id="item_illustration" multiple="multiple">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="m_delete_item" tabindex="-1" role="dialog" aria-labelledby="m_delete_item" aria-hidden="true">
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