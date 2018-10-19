@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('user.index') }}">User</a>
    <a class="breadcrumb-item active" href="{{ route('module.create') }}">@lang('global.add')</a>
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="menu-item-icon icon ion-ios-pricetag-outline tx-20 mg-r-5"></i>
            @lang('global.add')
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" id="frm_create_user">
            @csrf
            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.name')</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="@lang('user.please_enter_name')" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.birthday')</label>
                <input type="text" name="birthday" id="birthday" class="form-control" placeholder="@lang('user.please_enter_birthday')" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.email')</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="@lang('user.please_enter_email')" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.mobile')</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="@lang('user.please_enter_mobile')" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.gender')</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="1">@lang('user.male')</option>
                    <option value="0">@lang('user.female')</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.type')</label>
                <select class="form-control" name="type" id="type">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('user.status')</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">@lang('global.show')</option>
                    <option value="0">@lang('global.hide')</option>
                </select>
            </div>

            <hr class="mg-t-50">

            <div class="col-sm-2 col-md-2 pd-0">
                <button type="submit" class="btn btn-teal btn-block mg-b-20" id="btn-create">@lang('global.save')</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('build/js/user/user.js') }}"></script>
@endsection
