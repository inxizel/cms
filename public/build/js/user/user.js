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
/******/ 	return __webpack_require__(__webpack_require__.s = 52);
/******/ })
/************************************************************************/
/******/ ({

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(53);


/***/ }),

/***/ 53:
/***/ (function(module, exports) {

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
        columns: [{ data: 'DT_Row_Index', className: 'tx-center' }, { data: 'name' }, { data: 'birthday', className: 'tx-center' }, { data: 'gender', className: 'tx-center' }, { data: 'type', className: 'tx-center' }, { data: 'status', className: 'tx-center' }, { data: 'action', className: 'tx-center' }]
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
            }
        }
    });

    jQuery('#birthday').datetimepicker({
        datepicker: true,
        timepicker: false,
        format: 'd/m/Y'
    });

    function createUser(data) {
        $.ajax({
            url: app_url + 'admin/user',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: {
                data: data
            },
            success: function success(res) {
                if (!res.err) {
                    toastr.success(res.msg);

                    setTimeout(function () {
                        window.location.href = app_url + 'admin/user';
                    }, 2000);

                    $('#btn-create').attr("disabled", "disabled");
                } else {
                    if (res.type == 'email') {
                        $('#email').parent().append('<span id="email-error" class="error">' + res.msg + '</span>');
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

/***/ })

/******/ });