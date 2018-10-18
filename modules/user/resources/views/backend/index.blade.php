@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item active" href="{{ route('user.index') }}">User</a>
    {{-- use lang in file global --}}
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="menu-item-icon icon ion-ios-pricetag-outline tx-20 mg-r-5"></i>
            List user
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <div class="col-sm-2 col-md-2 pd-0">
            <button class="btn btn-info btn-block mg-b-20" onclick="window.location='{{ route('user.create') }}'">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                @lang('global.add')
            </button>
        </div>

        <div class="bd rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="user_table">
                <thead>
                <tr>
                    <th class="wd-5p">@lang('global.order')</th>
                    <th class="wd-25p">@lang('global.name')</th>
                    <th class="wd-30p">@lang('global.content')</th>
                    <th class="wd-25p">@lang('global.status')</th>
                    <th class="wd-15p">@lang('global.action')</th>
                </tr>
                </thead>
                <tbody>
                @if( isset($users) && sizeof($users) > 0) @foreach($users as $key => $user)
                    <tr>
                        <td align="center">{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->content }}</td>
                        <td>{{ $user->status }}</td>
                        <td align="center">
                            <button class="btn btn-warning wd-30 h-30" onclick="window.location='{{ route('user.edit', $user->id) }}'" data-toggle="tooltip" data-placement="top" title="@lang('global.edit')"><i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger wd-30 h-30" data-toggle="tooltip" data-placement="top" title="@lang('global.delete')" data-action="{{ route('user.destroy', $user->id) }}" data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach @else
                    <tr>
                        <td colspan="5" align="center">@lang('global.not_records') </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
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
