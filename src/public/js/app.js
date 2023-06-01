$(function() {
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
})