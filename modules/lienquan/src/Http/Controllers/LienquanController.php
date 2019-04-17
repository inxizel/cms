<?php

namespace Zent\Lienquan\Http\Controllers;

use Zent\Lienquan\Models\Lienquan;
use Zent\Lienquanrank\Models\Lienquanrank;

use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class LienquanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('lienquan');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lienquan::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $thongtin = $request->cookie('thongtin');
        $trangthai = $request->cookie('trangthai');
        $kichhoat = $request->cookie('kichhoat');
        $ranks = Lienquanrank::get();

        return view('lienquan::backend.create',['ranks'=>$ranks,'thongtin'=>$thongtin, 'trangthai'=>$trangthai,'kichhoat'=>$kichhoat ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = array();

            parse_str($request->data, $data);

            $lienquan['rank'] = $data['rank'];
            $lienquan['season'] = $data['season'];
            $lienquan['taikhoan'] = $data['taikhoan'];
            $lienquan['matkhau'] = $data['matkhau'];
            $lienquan['count_champs'] = $data['count_champs'];
            $lienquan['count_skins'] = $data['count_skins'];
            $lienquan['count_bangngoc'] = $data['count_bangngoc'];
            $lienquan['diemngoc'] = $data['diemngoc'];
            $lienquan['gia'] = $data['gia'];
            $lienquan['giamgia'] = $data['giamgia'];
            $lienquan['ip'] = $data['ip'];
            $lienquan['champs'] = $data['champs'];
            $lienquan['skins'] = $data['skins'];

            $lienquan['thongtin'] = $data['thongtin'];
            if($lienquan['thongtin'] == 'on') $lienquan['thongtin'] = 1; else $lienquan['thongtin'] = 0;
            $lienquan['trangthai'] = $data['trangthai'];
            if($lienquan['trangthai'] == 'on') $lienquan['trangthai'] = 'on'; else $lienquan['trangthai'] = 'off';
            $lienquan['kichhoat'] = $data['kichhoat'];
            if($lienquan['kichhoat'] == 'on') $lienquan['kichhoat'] = 'yes'; else $lienquan['kichhoat'] = 'no';

            $lienquan['user_id'] = Auth::user()->id;


            // Cookie 
            $thongtin = $lienquan['thongtin'];
            $trangthai = $lienquan['trangthai'];
            $kichhoat = $lienquan['kichhoat'];


            $save = Lienquan::create([
            'loainick' => 'LienQuan',
            'rank_id' => $lienquan['rank'],
            'season' => $lienquan['season'],
            'taikhoan' => $lienquan['taikhoan'],
            'matkhau' => $lienquan['matkhau'],
            'count_champs' => $lienquan['count_champs'],
            'count_skins' => $lienquan['count_skins'],
            'count_bangngoc' => $lienquan['count_bangngoc'],
            'diemngoc' => $lienquan['diemngoc'],
            'gia' => $lienquan['gia'],
            'giamgia' => $lienquan['giamgia'],
            'ip' => $lienquan['ip'],
            'champs' => $lienquan['champs'],
            'skins' => $lienquan['skins'],

            'thongtin' => $lienquan['thongtin'],
            'trangthai' => $lienquan['trangthai'],
            'kichhoat' => $lienquan['kichhoat'],
            'user_id' => $lienquan['user_id']

        ]);

            DB::commit();
            return response()
            ->json(['err' => false, 'msg' => trans('global.create_success')])
            ->withCookie(cookie()->forever('thongtin', $thongtin))
            ->withCookie(cookie()->forever('trangthai', $trangthai))
            ->withCookie(cookie()->forever('kichhoat', $kichhoat));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lienquan = Lienquan::find($id);

        return view('lienquan::backend.edit', compact('lienquan', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = array();
            parse_str($request->data, $data);
            Lienquan::find($data['lienquan_id'])->update($data);

            DB::commit();
            return response()->json(['err' => false, 'msg' => trans('global.update_success')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {
            Lienquan::find($request->id)->delete();

            DB::commit();
            return response()->json([ 'err' => false, 'msg' =>  trans('global.delete_success')]);

        } catch (\Exception $e) {
            return response()->json(['err'  =>  true, 'msg' =>  $e->getMessage()]);
        }
    }

    /**
     * Return view front end.
     *
     */
    public function home()
    {
        return view('lienquan::frontend.index');
    }

    /**
     * DataTables get list lienquan
     */
    public static function getListLienquan()
    {
        $lienquans = Lienquan::orderBy('id', 'desc')->get();

        return DataTables::of($lienquans)
            ->addIndexColumn()
            ->addColumn('action', function ($lienquan) {
                $txt = "";

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $lienquan->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="' . trans('global.edit') . '"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
    //                }

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $lienquan->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title="' . trans('global.delete') . '"/><i class="fa fa-trash" aria-hidden="true"></i></button>';
    //                }

                return $txt;
            })
            ->editColumn('created_at', function ($lienquan) {
                return date('H:i | d-m-Y', strtotime($lienquan->created_at));
            })
            ->editColumn('content', function ($lienquan) {
                return !is_null($lienquan->content) ? $lienquan->content : trans('global.not_updated');
            })
            ->editColumn('status', function ($lienquan) {
                return ($lienquan->status == 1) ? trans('global.show') : trans('global.hide');
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
