/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 56);
/******/ })
/************************************************************************/
/******/ ({

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(57);


/***/ }),

/***/ 57:
/***/ (function(module, exports) {

$(document).ready(function () {

    $('#role_table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: app_url + 'admin/role/get-list-role',
            type: 'post'
        },
        searching: true,
        columns: [{ data: 'DT_RowIndex', className: 'tx-center', searchable: false }, { data: 'display_name' }, { data: 'description' }, { data: 'created_at', className: 'tx-center' }, { data: 'action', className: 'tx-center' }]
    });

    $('#role_table').on('click', '.btn-edit', function () {
        window.location.href = app_url + 'admin/role/' + $(this).data('id') + '/edit';
    });

    $('#role_table').on('click', '.btn-permission', function () {
        window.location.href = app_url + 'admin/role/permission/' + $(this).data('id');
    });

    $('#role_table').on('click', '.btn-delete', function (event) {
        var _this = this;

        event.preventDefault();

        swal({
            title: Lang.get('global.are_you_sure_to_delete'),
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00b297',
            cancelButtonColor: '#d33',
            confirmButtonText: Lang.get('global.confirm'),
            cancelButtonText: Lang.get('global.cancle')
        }).then(function (result) {
            if (result.value) {

                $.ajax({
                    url: app_url + 'admin/role/' + $(_this).data('id'),
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        id: $(_this).data('id')
                    },
                    success: function success(res) {
                        // console.log(res);
                        if (!res.err) {
                            toastr.success(res.msg);

                            $('#role_table').DataTable().ajax.reload();
                        }
                    }
                });
            }
        });
    });

    $('#permission_role_table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: app_url + 'admin/role/get-list-permission',
            type: 'post',
            data: {
                id: $('#role_id').val()
            }
        },
        searching: true,
        columns: [{ data: 'DT_RowIndex', className: 'tx-center', searchable: false }, { data: 'name' }, { data: 'display_name' }, { data: 'created_at', className: 'tx-center' }, { data: 'action', className: 'tx-center' }]
    });

    $('#permission_role_table').on('click', '.btn-permission-role', function () {
        var permission_id = $(this).data('id');
        var role_id = $('#role_id').val();
        var value = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            url: app_url + 'admin/role/update-permission-role',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            dataType: "JSON",
            data: {
                role_id: role_id,
                permission_id: permission_id,
                value: value
            },
            success: function success(res) {
                if (!res.err) {
                    toastr.success(res.msg);
                } else {
                    toastr.err(res.msg);
                }
            }
        });
    });
});

/***/ })

/******/ });