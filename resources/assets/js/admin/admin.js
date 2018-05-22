import 'bootstrap/dist/js/bootstrap.bundle.min';

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
        }
    });

});