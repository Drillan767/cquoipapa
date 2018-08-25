@extends('layouts.admin')

@section('title', $category->title)

@section('content')

    <div class="col-md-12">
        <h1>{{ $category->title }}</h1>
        <h2>{{ $category->description }}</h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_new_item">
            Nouvel objet
        </button>

        <div class="items">
            @if($items)
                @foreach($items as $item)
                    <div class="item" id="{{ $item->id }}">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 data-id="{{ $item->id }}">{{ $item->title }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                            <div class="col-md-3">
                                <a data-fancybox="gallery" href="{{ $item->illustration }}">
                                    <img src="{{ $item->illustration }}" class="illustration">
                                </a>
                            </div>
                        </div>


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
                        <div class="form-group">
                            <label for="user_categories">Catégorie rattachée</label>
                            <select class="new-item-select" id="item_categories" name="item_categories[]" multiple="multiple">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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
                        <div class="form-group">
                            <label for="item_categories">Catégorie rattachée</label>
                            <select class="edit-item-select" id="item_categories" name="item_categories[]" multiple="multiple">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script type="application/javascript">
        $('.new-item-select')
            .select2({ width: '100%' })
            .val(<?= $category->id ?>)
            .trigger("change");
    </script>
@endsection