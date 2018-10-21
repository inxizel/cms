$(document).ready(function () {

    $('#user_table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: app_url + 'admin/user/get-list-user',
            type: 'post'
        },
        searching: true,
        columns: [
            { data: 'DT_Row_Index', className: 'tx-center'},
            { data: 'name'},
            { data: 'birthday', className: 'tx-center'},
            { data: 'gender', className: 'tx-center'},
            { data: 'type', className: 'tx-center'},
            { data: 'status', className: 'tx-center'},
            { data: 'action', className: 'tx-center'},
        ],
    });
    
    $('#frm_create_user').on('submit', function (event) {
        event.preventDefault();

        var form = $('#frm_create_user');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }

        createUser(form.serialize());
    });

    $('#frm_create_user').validate({
        errorElement: "span",
        rules: {
            name: {
                required: true
            },
            birthday: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            }
        },
        messages: {
            name: {
                required: Lang.get('user.please_enter_name')
            },
            birthday: {
                required: Lang.get('user.please_enter_birthday')
            },
            email: {
                required: Lang.get('user.please_enter_email'),
                email: Lang.get('user.email_not_invalid')
            },
            mobile: {
                required: Lang.get('user.please_enter_mobile')
            },
        },
    });

    jQuery('#birthday').datetimepicker({
        datepicker:true,
        timepicker:false,
        format:'d/m/Y'
    });
    
    function createUser(data) {
        $.ajax({
            url: app_url + 'admin/user',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: {
                data: data
            },
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    setTimeout(function () {
                        window.location.href = app_url + 'admin/user';
                    }, 2000);

                    $('#btn-create').attr("disabled", "disabled");
                } else {
                    if (res.type == 'email')
                    {
                        $('#email').parent().append('<span id="email-error" class="error">'+res.msg+'</span>');
                    } else {
                        toastr.error(res.msg);
                    }
                }
            }
        });
    }

    $('#user_table').on('click', '.btn-warning', function () {
        window.location.href = app_url + 'admin/user/' + $(this).data('id') + '/edit';
    });
});
