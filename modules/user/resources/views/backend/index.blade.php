@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item active" href="{{ route('user.index') }}">{{ $display_name }}</a>
    {{-- use lang in file global --}}
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;
            @lang('global.list') {{ $display_name }}
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <div class="col-sm-1 col-md-1 pd-0 mg-b-20">
            <button class="btn btn-info btn-block" onclick="window.location='{{ route('user.create') }}'">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                @lang('global.add')
            </button>
        </div>

        <div class="rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="user_table">
                <thead>
                    <tr>
                        <th class="wd-5p">@lang('global.order')</th>
                        <th class="wd-25p">@lang('global.name')</th>
                        <th class="wd-10p">@lang('global.birthday')</th>
                        <th class="wd-10p">@lang('global.gender')</th>
                        <th class="wd-10p">@lang('global.type')</th>
                        <th class="wd-10p">@lang('global.status')</th>
                        <th class="wd-30p">@lang('global.action')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('build/js/user/user.js') }}"></script>
    <script>
        $('#user_table').on('click', '.btn-danger', function (event) {
            event.preventDefault();

            swal({
                title: Lang.get('global.are_you_sure_to_delete'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00b297',
                cancelButtonColor: '#d33',
                confirmButtonText: Lang.get('global.confirm'),
                cancelButtonText: Lang.get('global.cancle')
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: $(this).data('action'),
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            id: $(this).data('id')
                        },
                        success: function (res)
                        {
                            if (!res.err) {
                                setTimeout( function () {
                                    window.location.reload();
                                }, 0);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
