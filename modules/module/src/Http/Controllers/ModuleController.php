<?php

namespace Zent\Module\Http\Controllers;

use function foo\func;
use Illuminate\Support\Facades\Session;
use App\Models\Module;
use Illuminate\Http\Request;
use DataTables;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::select('modules.*', 'module_categories.name as module_category_name')
                    ->join('module_categories', 'modules.module_category_id', '=', 'module_categories.id')
                    ->orderBy('modules.id', 'desc')->get();

        foreach ($modules as $key => $module) {
            $module->status = ($module->status) == 1 ? trans('global.active') : trans('global.deactive');
        }

        return view('module::backend.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'  =>  $request->display_name,
            'display_name'  =>  $request->display_name
        ];

        Module::create($data);

        Session::flash('create_success', trans('global.create_success'));

        return redirect()->route('module.index');
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
        $module = Module::find($id);

        return view('module::backend.edit', compact('module', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Module::find($id)->update($request->all());

        Session::flash('update_success', trans('global.update_success'));

        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Module::find($request->id)->delete();

        Session::flash('delete_success', trans('global.delete_success'));

        return response()->json([ 'err' => false ]);
    }
    /**
     * Comment here.
     *
     * @return here
     * @author ThanhTung
     */
    public function home()
    {
        return view('module::frontend.index');
    }
    
    /**
     * 
     */
    public static function getList(Request $request)
    {
        $modules = Module::select('modules.*', 'module_categories.name as module_category_name')
                    ->join('module_categories', 'modules.module_category_id', '=', 'module_categories.id')
                    ->orderBy('modules.id', 'desc');

        return DataTables::of($modules)
                ->addIndexColumn()
                ->addColumn('action', function($module) {
                    $txt = "";


                    return '';
                })
                ->editColumn('status', function ($module) {
                    return $module->status == 1 ? trans('global.active') : trans('global.deactive');
                })
                ->toJson();
    }
}
