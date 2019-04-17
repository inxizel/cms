@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('lienquan.index') }}">{{ $display_name }}</a>
    <a class="breadcrumb-item active" href="{{ route('lienquan.create') }}">@lang('global.add')</a>
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
            @lang('global.add') {{ $display_name }}
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <form action="{{ route('lienquan.store') }}" method="post" enctype="multipart/form-data" id="frm_create_lienquan">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Chọn Rank</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                Rank
                            </div>
                            <select class="form-control" name="rank">
                            @foreach($ranks as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                            
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Season</label>
                        <input class="form-control" placeholder="Rank mùa mấy" id="season" name="season" type="text" value="8"/>
                    </div>
                </div>
                
                
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control" placeholder="Tải khoản" id="taikhoan" name="taikhoan" type="text" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" placeholder="Mật khẩu" id="matkhau" name="matkhau" type="text" value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Số Tướng</label>
                        <input class="form-control" placeholder="Số Tướng" id="count_champs" name="count_champs" type="text" value=""/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Số Skin</label>
                        <input class="form-control" placeholder="Số skin liên quân" id="count_skins" name="count_skins" type="text" value=""/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số bảng ngọc</label>
                                <input class="form-control" placeholder="Số bảng ngọc" id="count_bangngoc" name="count_bangngoc" type="text" value="2"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Điểm ngọc</label>
                                <input class="form-control" placeholder="Điểm ngọc" id="diemngoc" name="diemngoc" type="text" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control" placeholder="Giá?" name="gia" type="number" autofocus="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giảm giá</label>
                                <input class="form-control" placeholder="Giảm giá?" name="giamgia" type="number" autofocus="" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Số Vàng</label>
                        <input class="form-control" placeholder="Số vàng còn lại" id="ip" name="ip" type="text" value=""/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input class="form-control" placeholder="Thumbnail?" id="thumb" name="thumb" type="text" value="1"/>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Số hình ảnh</label>
                        <input class="form-control" placeholder="Số hình ảnh" id="count_img" name="count_img" type="text" value="1"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 dropdown" data-filter="tim-theo-tuong">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Nhập tên tướng
                    </button>
                    <ul class="dropdown-menu filter-clothes">
                        <li class="txt-filter">
                            <input style="margin-left: 5px; color: #121212; border:none; padding: 5px; background-color: #fff;" type="text" id="champFilter" placeholder="Nhập tên tướng..." data-provide="typeahead" autocomplete="off">
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 dropdown" data-filter="trang-phuc">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Nhập tên trang phục
                    </button>
                    <ul class="dropdown-menu filter-clothes">
                        <li class="txt-filter">
                            <input style="margin-left: 5px; color: #121212; border:none; padding: 5px; background-color: #fff;" type="text" id="skinFilter" placeholder="Nhập tên trang phục..." data-provide="typeahead" autocomplete="off">
                        </li>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <textarea class="form-control" rows="2" id="champs" name="champs" placeholder="Auto Complete Champs"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <textarea class="form-control" rows="2" id="skins" name="skins" placeholder="Auto Complete Skins"></textarea>
                    </div>
                </div>
            </div>       
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group remove-margin-b">
                        <label class="css-input switch switch-sm switch-primary">
                            <input type="checkbox" id="kichhoat" name="kichhoat" @if($kichhoat == 'yes') checked="true" @endif />
                            <span></span> Kích hoạt?
                            
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group remove-margin-b">
                        <label class="css-input switch switch-sm switch-primary">
                            <input type="checkbox" id="trangthai" name="trangthai" @if($trangthai == 'on') checked="true" @endif />
                            <span></span> Trạng Thái
                            
                        </label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group remove-margin-b">
                        <label class="css-input switch switch-sm switch-primary">
                            <input type="checkbox" id="thongtin" name="thongtin" @if($thongtin == '1') checked="true" @endif />
                            <span></span> Thông Tin
                            
                        </label>
                    </div>
                </div>
                
            </div>
   

            <div class="col-sm-1 col-md-1 pd-0">
                <button type="submit" class="btn btn-info btn-block mg-b-20" id="btn-create"><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;@lang('global.save')</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $('#frm_create_lienquan').on('submit', function (event) {
            event.preventDefault();

            var form = $('#frm_create_lienquan');

            $('span[class=error]').remove();

            if (!form.valid()) {
                return false;
            }

            createLienquan(form.serialize());
        });

        $('#frm_create_lienquan').validate({
            errorElement: "span",
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: Lang.get('user.please_enter_name')
                },
                content: {
                    required: Lang.get('global.please_enter_content')
                }
            },
        });

        function createLienquan(data) {
            $.ajax({
                url: app_url + 'admin/lienquan',
                type: 'POST', // GET, POST, PUT, PATCH, DELETE,
                data: {
                    data: data
                },
                success: function (res)
                {
                    if (!res.err) {
                        toastr.success(res.msg);

                        setTimeout(function () {
                            window.location.href = app_url + 'admin/lienquan';
                        }, 2000);

                        $('#btn-create').attr("disabled", "disabled");
                    } else {
                        toastr.error(res.msg);
                    }
                }
            });
        }
    </script>
@endsection
