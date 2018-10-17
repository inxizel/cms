@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('{core}.index') }}">{Core}</a>
    <a class="breadcrumb-item active" href="{{ route('{core}.create') }}">@lang('global.edit')</a>
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="menu-item-icon icon ion-ios-pricetag-outline tx-20 mg-r-5"></i>
            @lang('global.edit')
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <form action="{{ route('{core}.update', ${core}->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <label for="" class="tx-bold">@lang('global.name')</label>
                <input value="{{ ${core}->name }}" type="text" name="name" id="name" class="form-control" placeholder="@lang('global.please_enter_content')" required="">
            </div>

            <div class="col-sm-2 col-md-2 pd-0">
                <button type="submit" class="btn btn-teal btn-block mg-b-20">@lang('global.save')</button>
            </div>
        </form>
    </div>
@endsection

@section('script')

@endsection
