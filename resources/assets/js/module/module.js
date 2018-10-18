$(document).ready(function () {

    $('#modules_table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: app_url + 'admin/module/get-list',
            type: 'post'
        },
        searching: true,
        columns: [
            { data: 'DT_Row_Index', className: 'tx-center'},
            { data: 'display_name'},
            { data: 'module_category_name'},
            { data: 'status', className: 'tx-center'},
            { data: 'action', className: 'tx-center'},
        ],
    });
});
//
// <script>
// $('#module_table').on('click', '.btn-danger', function (event) {
//     event.preventDefault();
//
//     swal({
//         title: Lang.get('global.are_you_sure_to_delete'),
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#00b297',
//         cancelButtonColor: '#d33',
//         confirmButtonText: Lang.get('global.confirm'),
//         cancelButtonText: Lang.get('global.cancle')
//     }).then((result) => {
//         if (result.value) {
//
//             $.ajax({
//                 url: $(this).data('action'),
//                 type: 'DELETE',
//                 dataType: "JSON",
//                 data: {
//                     id: $(this).data('id')
//                 },
//                 success: function (res)
//                 {
//                     if (!res.err) {
//                         setTimeout( function () {
//                             window.location.reload();
//                         }, 0);
//                     }
//                 }
//             });
//         }
//     });
// });
//
// $('#module_table').DataTable();
// </script>
