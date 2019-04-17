<?php

namespace Zent\Lienquanrank\Http\Controllers;

use Zent\Lienquanrank\Models\Lienquanrank;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class LienquanrankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('lienquanrank');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lienquanrank::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lienquanrank::backend.create');
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
            Lienquanrank::create($data);

            DB::commit();
            return response()->json(['err' => false, 'msg' => trans('global.create_success')]);
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
        $lienquanrank = Lienquanrank::find($id);

        return view('lienquanrank::backend.edit', compact('lienquanrank', 'id'));
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
            Lienquanrank::find($data['lienquanrank_id'])->update($data);

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
            Lienquanrank::find($request->id)->delete();

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
        return view('lienquanrank::frontend.index');
    }

    /**
     * DataTables get list lienquanrank
     */
    public static function getListLienquanrank()
    {
        $lienquanranks = Lienquanrank::orderBy('id', 'desc')->get();

        return DataTables::of($lienquanranks)
            ->addIndexColumn()
            ->addColumn('action', function ($lienquanrank) {
                $txt = "";

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $lienquanrank->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="' . trans('global.edit') . '"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
    //                }

    //                if ( Entrust::can(['// here']))
    //                {
                $txt .= '<button data-id="' . $lienquanrank->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title="' . trans('global.delete') . '"/><i class="fa fa-trash" aria-hidden="true"></i></button>';
    //                }

                return $txt;
            })
            ->editColumn('created_at', function ($lienquanrank) {
                return date('H:i | d-m-Y', strtotime($lienquanrank->created_at));
            })
            ->editColumn('content', function ($lienquanrank) {
                return !is_null($lienquanrank->content) ? $lienquanrank->content : trans('global.not_updated');
            })
            ->editColumn('status', function ($lienquanrank) {
                return ($lienquanrank->status == 1) ? trans('global.show') : trans('global.hide');
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
