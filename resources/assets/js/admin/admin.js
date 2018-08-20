import 'bootstrap/dist/js/bootstrap.bundle.min';
import '@fancyapps/fancybox/dist/jquery.fancybox.min';
import 'select2/dist/js/select2.full.min';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.new-category-select').select2({ width: '100%' });
});

$("#new_category").submit(function (e) {
    let formData = new FormData(this);

    $.each($('#category_illustration').files, function (i, file) {
        formData.append('category_illustration', file);
    });
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/categories',
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (data) {

            $('#m_new_category').modal('hide');
            $("#new_category")[0].reset();
            $('table.table tbody').append(
                '<tr id="' + data.id + '">' +
                '<td><a href="/admin/category/' + data.id + '">' + data.title + '</a></td>' +
                '<td>' + data.description + '</td>' +
                '<td><img src="' + data.illustration + '" class="thumbnail" alt="' + data.illustration.split(/[\\/]/).pop() + '"/></td>' +
                '<td><span></span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>' +
                '<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#m_delete_category">' +
                '<i class="fas fa-trash"></i>' +
                '</button>' +
                '</td>' +
                '</tr>'
            );

            if (data.enabled === 1) {
                $('tr#' + data.id + ' td span').addClass('enabled').append('Actif');
            } else {
                $('td span').addClass('disabled').append('Inactif');
            }
        }
    });
});

$("#new_item").submit(function (e) {
    let formData = new FormData(this);
    $.each($('#item_illustration').files, function (i, file) {
        formData.append('category_illustration[]', file);
    });
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.href + '/item',
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (data) {
            $('#m_new_item').modal('hide');
            $('#new_item')[0].reset();
            $('.items').append(
                '<div class="item" id="'+ data.id +'">' +
                '<h3 data-id="' + data.id + '">' + data.title + '</h3>' +
                '<p>' + data.description + '</p>' +
                '<div class="align-images row"></div>' +
                '</div>'
            );

            $.each(data.image, function (index, image) {
                $('#' + data.id + ' .align-images').append(
                    '<div class="col-sm-1">' +
                    '<a data-fancybox="gallery" href="' + image.path + '">' +
                    '<img src="' + image.path + '">' +
                    '</a>' +
                    '</div>'
                );
            })
        }
    });
});

$('.btn-outline-warning').on('click', function (e) {
    e.preventDefault();
    let id = $(this).closest('tr').prop('id');
    $.get(window.location.origin + '/api/v1/category/' + id, function (data) {
        $('#m_edit_category h5.modal-title').empty().append('Éditer "' + data.title + '"');
        $('#m_edit_category input[name="category_id"]').val(data.id);
        $('#m_edit_category input[name="category_title"]').val(data.title);
        $('#m_edit_category textarea[name="category_description"]').val(data.description);
        $('#m_edit_category').modal();
    });
});

$("#edit_category").submit(function (e) {
    let formData = new FormData(this);
    let id = $('#m_edit_category input[name="category_id"]').val();
    $.each($('input[name="category_illustration"]').files, function (i, file) {
        formData.append('category_illustration', file);
    });
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/category/' + id,
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let status = '';
            let statusclass = '';
            if (data.enabled) {
                status = 'Actif';
                statusclass = 'enabled';
            } else {
                status = 'Inactif';
                statusclass = 'disabled';
            }
            $('#m_edit_category').modal('hide');
            $('#' + id).empty().append(
                '<td>' +
                '<a href="/admin/category/' + id + '">' + data.title + '</a>' +
                '</td>' +
                '<td>' + data.description + '</td>' +
                '<td><img src="' + data.illustration + '" class="thumbnail" alt="' + data.illustration.split(/[\\/]/).pop() + '"></td>' +
                '<td class="' + statusclass + '">' + status + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>' +
                '<button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>' +
                '</td>'
            )
        }
    });
});

$('.btn-outline-danger').on('click', function (e) {
    e.preventDefault();
    let id = $(this).closest('tr').prop('id');
    $.get(window.location.origin + '/api/v1/category/' + id, function (data) {
        $('#m_delete_category h5.modal-title').empty().append('Supprimer "' + data.title + '" ?');
        $('#m_delete_category').attr('data-id', id).modal('toggle');
    });
});

$('#m_delete_category .btn-danger').on('click', function () {
    let $id = $('#m_delete_category').attr('data-id');
    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/category/' + $id + '/delete',
        data: {"id": $id},
        success: function (data) {
            if (data === 'done') {
                $('#m_delete_category').modal('hide');
                $(`tr#${$id}`).remove();
            }
        },
        dataType: "json"
    });
});

$('.item h3').on('click', function () {
    let $id = $(this).attr('data-id');
    $.ajax({
        type: "POST",
        url: window.location.origin + '/api/v1/items',
        data: {"id": $id},
        success: function (data) {
            $('#edit_item').attr('data-id', data.id);
            $('#m_edit_item h5.modal-title').empty().append('Éditer "' + data.title + '"');
            $('#m_edit_item input[name="item_title"]').val(data.title);

            if($('#m_edit_item a[data-fancybox="gallery"]').length === 0) {
                $('<a data-fancybox="gallery" href="' + data.illustration + '">Illustration</a>').insertAfter('#m_edit_item input[name="item_illustration"]');
            }
            $('#m_edit_item textarea[name="item_description"]').val(data.description);
            $('#m_edit_item').modal();
        },
        dataType: "json"
    });

});

$("#edit_item").submit(function (e) {
    let formData = new FormData(this);
    let id = $('#edit_item').attr('data-id');
    $.each($('input[name="item_images"]').files, function (i, file) {
        formData.append('item_images', file);
    });
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/item/' + id,
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            $('#m_edit_item').modal('hide');
            $('#edit_item')[0].reset();
            $('.item#' + id).empty().append(
                '<h3 data-id="' + data.id + '">' + data.title + '</h3>' +
                '<p>' + data.description + '</p>' +
                '<div class="align-images row"></div>'
            );

            $.each(data.image, function (index, image) {
                $('.align-images').append(
                    '<div class="col-sm-1">' +
                    '<a data-fancybox="gallery" href="' + image.path + '">' +
                    '<img src="' + image.path + '">' +
                    '</a>' +
                    '</div>'
                );
            })
        }
    });
});

$('#m_edit_item .btn-danger').on('click', function() {
    $('#m_edit_item').modal('hide');
    let $id = $('#m_edit_item #edit_item').attr('data-id');
    $.ajax({
        type: "POST",
        url: window.location.origin + '/api/v1/items',
        data: {"id": $id},
        success: function (data) {
            $('#m_delete_item h5.modal-title').empty().append('Supprimer "' + data.title + '" ?');
            $('#m_delete_item .modal-body').empty().append('<p>La suppression de cet objet entrainera la suppression de toutes ' +
                'les images qui lui sont liées.</p>')
                .append('<p>Continuer ?</p>');
            $('#m_delete_item').attr('data-id', data.id).modal();
        },
        dataType: "json"
    });
    $('#m_delete_item').modal();
});

$('#m_delete_item .btn-danger').on('click', function () {
    let $id = $('#m_delete_item').attr('data-id');
    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/item/delete',
        data: {"id": $id},
        success: function (data) {
            if (data === 'done') {
                $('#m_delete_item').modal('hide');
                $(`div.item#${$id}`).remove();
            }
        },
        dataType: "json"
    });
});

$("#new_user").submit(function (e) {
    let formData = new FormData(this);
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.href,
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (data) {
            $('#m_new_user').modal('hide');
            $('#new_user')[0].reset();
            $('table.users').append(
                '<tr id="'+ data.id +'">' +
                '<td>'+ `${data.first_name} ${data.last_name}` +'</td>' +
                '<td>'+ data.email +'</td>' +
                '<td>'+ data.phone +'</td>' +
                '<td>'+ data.nb_api_call +'</td>' +
                '<td><button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>' +
                '<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#m_delete_category">' +
                '<i class="fas fa-trash"></i>' +
                '</button></td>' +
                '</tr>'
            );
        }
    });
});

$('table.users .btn-outline-warning').on('click', function () {
    let $id = $(this).closest('tr').prop('id');
    $.post(window.location.origin + '/api/v1/client', {id: $id})
        .done(function(data) {

            let category_id = [];
            data.categories.map(function(category) {
               category_id.push(category.id);
            });

            $('#m_edit_user h5.modal-title').empty().append(`Modifier ${data.first_name} ${data.last_name}`);
            $('#m_edit_user input[name="user_first_name"]').val(data.first_name);
            $('#m_edit_user input[name="user_last_name"]').val(data.last_name);
            $('#m_edit_user input[name="user_email"]').val(data.email);
            $('#m_edit_user input[name="user_phone"]').val(data.phone);

            $('.edit-category-select')
                .select2({ width: '100%' })
                .val(category_id)
                .trigger('change');

            $('#m_edit_user').attr('data-id', data.id).modal();

    });
});

$("#edit_user").submit(function (e) {
    let formData = new FormData(this);
    let id = $('#m_edit_user').attr('data-id');
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/client/' + id,
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            $('#m_edit_user').modal('hide');
            $('#edit_user')[0].reset();
            $('tr#' + id).empty().append(
                '<td>'+ `${data.first_name} ${data.last_name}` +'</td>' +
                '<td>'+ data.email +'</td>' +
                '<td>'+ data.phone +'</td>' +
                '<td>'+ data.nb_api_call +'</td>' +
                '<td><button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>' +
                '<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#m_delete_category">' +
                '<i class="fas fa-trash"></i>' +
                '</button></td>' +
                '</tr>'
            );
        }
    });
});

$('table.users .btn-outline-danger').on('click', function() {
    let $id = $(this).closest('tr').prop('id');
    $.post(window.location.origin + '/api/v1/client', {id: $id})
        .done(function(data) {
            $('#m_delete_user h5.modal-title').empty().append(`Supprimer ${data.first_name} ${data.last_name} ?`);
            $('#m_delete_user .modal-body').empty().append('<p>Les catégories liées ne seront pas supprimées.</p>')
                .append('<p>Continuer ?</p>');
            $('#m_delete_user').attr('data-id', data.id).modal();

    });
    $('#m_delete_user').modal();
});

$('#m_delete_user .btn-danger').on('click', function () {
    let $id = $('#m_delete_user').attr('data-id');
    $.post(window.location.origin + '/admin/client/' + $id + '/delete')
        .done(function(data) {
            if (data === 'done') {
                $('#m_delete_user').modal('hide');
                $(`table.users tr#${$id}`).remove();
            }
        });
});

$('table.users .btn-outline-primary').on('click', function() {
    let $id = $(this).closest('tr').prop('id');
    $.post(window.location.origin + '/admin/client/'+ $id +'/export')
        .done(function(data) {
            if(data === 'done') {
                $('#exported').modal('show');
            }
        })
});