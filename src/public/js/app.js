$(function() {

    var $container = $('.viewModal');

    var records_table = $('#records_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/records/index',
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "action"},
        ]
    });

    $(document).on('click', '.edit_record', function () {
        var id = $(this).data('id');
        $.ajax({
            method: 'get',
            url: '/record/edit/'+id,
            dataType: 'html',
            success: function (html) {
                $container.html(html).modal('show');
            }
        })
    });

    $(document).on('submit', 'form#record_edit_form', function (e) {
        e.preventDefault();
        var method = $(this).attr('method');
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            method: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function (result) {
                if(result.success === true) {
                    $container.modal('hide');
                    records_table.ajax.reload();
                } else {
                    alert(result.msg);
                }
            }
        })
    });

    $(document).on('click', '.delete_record', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        if(confirm('Are you sure?')) {
            $.ajax({
                method: 'delete',
                url: '/record/delete/'+id,
                dataType: 'json',
                success: function (result) {
                    if(result.success === true) {
                        alert(result.msg);
                        records_table.ajax.reload();
                    } else {
                        alert(result.msg);
                    }
                }
            })
        }
    })
});