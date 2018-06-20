import 'bootstrap/dist/js/bootstrap.bundle.min';
import '@fancyapps/fancybox/dist/jquery.fancybox.min';
import 'jquery-ui/ui/core';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#new_category").submit(function(e) {
    let formData = new FormData(this);

    $.each($('#category_illustration').files, function(i, file) {
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
        success: function(data){
            console.log(data);
            $('#m_new_category').modal('hide');
            $('table.table tbody').append(
                '<tr id="' + data.id +'">' +
                '<td><a href="/admin/category/'+ data.id +'">'+ data.title +'</a></td>' +
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

            if(data.enabled === 1) {
                $('tr#'+ data.id +' td span').addClass('enabled').append('Actif');
            } else {
                $('td span').addClass('disabled').append('Inactif');
            }
        }
    });
});

$("#new_item").submit(function(e) {
    let formData = new FormData(this);
    $.each($('#item_illustration').files, function(i, file) {
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
        success: function(data){
            console.log(data);
            $('#m_new_item').modal('hide');
            $('.items').append(
                '<div class="item">' +
                    '<h3>' + data.title + '</h3>' +
                    '<p>'+ data.description +'</p>' +
                    '<div class="align-images row"></div>' +
                '</div>'
            );

            $.each(data.image, function() {
                $('.align-images').append(
                    '<div class="col-sm-1">' +
                        '<a data-fancybox="gallery" href="' + this.path + '">' +
                            '<img src="' + this.path + '">' +
                        '</a>' +
                    '</div>'
                );
            })
        }
    });
});

$('.btn-outline-warning').on('click', function(e){
    e.preventDefault();
    let id = $(this).closest('tr').prop('id');
    $.get(window.location.origin + '/api/v1/category/' + id, function(data) {
        $('#m_edit_category h5.modal-title').empty().append('Éditer "' + data.title + '"');
        $('#m_edit_category input[name="category_id"]').val(data.id);
        $('#m_edit_category input[name="category_title"]').val(data.title);
        $('#m_edit_category textarea[name="category_description"]').val(data.description);
        $('#m_edit_category').modal();
    });
});

$("#edit_category").submit(function(e) {
    let formData = new FormData(this);
    let id = $('#m_edit_category input[name="category_id"]').val();
    $.each($('input[name="category_illustration"]').files, function(i, file) {
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
        success: function(data){
            let status = '';
            let statusclass = '';
            if(data.actif) {
                status = 'Actif';
                statusclass = 'enabled';
            } else {
                status = 'Inactif';
                statusclass = 'disabled';
            }
            $('#m_edit_category').modal('hide');
            $('#' + id).empty().append(
                '<td>' +
                    '<a href="/admin/category/'+ id +'">' + data.title + '</a>' +
                '</td>' +
                '<td>' + data.description + '</td>' +
                '<td><img src="' + data.illustration + '" class="thumbnail" alt="' + data.illustration.split(/[\\/]/).pop() +'"></td>' +
                '<td class="'+ statusclass +'">'+ status +'</td>' +
                '<td>' +
                    '<button type="button" class="btn btn-outline-warning"><i class="far fa-edit"></i></button>' +
                    '<button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>' +
                '</td>'
            )
        }
    });
});

$('.btn-outline-danger').on('click', function(e){
    e.preventDefault();
    let id = $(this).closest('tr').prop('id');
    $.get(window.location.origin + '/api/v1/category/' + id, function(data) {
        $('#m_delete_category h5.modal-title').empty().append('Supprimer "' + data.title + '" ?');
        $('#m_delete_category').attr('data-id', id).modal('toggle');
    });
});

$('#m_delete_category .btn-danger').on('click', function() {
    let $id = $('#m_delete_category').attr('data-id');
    $.ajax({
        type: "POST",
        url: window.location.origin + '/admin/category/' + $id + '/delete',
        data: {"id": $id},
        success: function(data) {
            if(data === 'done') {
                $('#m_delete_category').modal('hide');
                $(`tr#${$id}`).remove();
            }
        },
        dataType: "json"
    });
});