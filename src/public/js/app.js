$(function() {
    var records_table = $('#records_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/vip/index',
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "action"},
        ]
    });
})