<?php

namespace Zent\User\Http\Controllers;

use function foo\func;
use Zent\User\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        foreach ( $users as $user) {
            $user->status = $user->status == 1 ? trans('global.active') : trans('global.deactive');
        }

        return view('user::backend.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            parse_str($request->data, $data);
            $data['password'] = bcrypt('123456');
            User::create($data);

            return response()->json([ 'err' => false, 'msg' =>  trans('global.create_success')]);
        } catch (\Exception $e) {
            return response()->json([ 'err' => true, 'msg' => $e->getMessage()]);
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
        $user = User::find($id);

        return view('user::backend.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());

        Session::flash('update_success', trans('global.update_success'));

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        Session::flash('delete_success', trans('global.delete_success'));

        return response()->json([ 'err' => false ]);
    }

    /**
     * Return view front end.
     *
     */
    public function home()
    {
        return view('user::frontend.index');
    }

    public static function getListUser(Request $request)
    {
        $users = User::orderBy('id', 'desc');

        return DataTables::of($users)
            ->addIndexColumn()
            ->editColumn('gender', function($module) {
                switch ($module->gender)
                {
                    case 1:
                        return trans('global.male_icon');
                    case 0:
                        return trans('global.female_icon');
                    default:
                        return "???";
                }
            })
            ->editColumn('type', function($module) {
                switch ($module->type)
                {
                    case 1:
                        return '<span style="font-weight: bold">'.trans('global.admin').'</span>';
                    case 0:
                        return trans('global.user');
                    default:
                        return "";
                }
            })
            ->addColumn('action', function($module) {
                $bt = "";

                return '';
            })
            ->editColumn('status', function ($module) {
                switch ($module->status)
                {
                    case 1:
                        return trans('global.active_icon');
                    case 0:
                        return trans("global.deactive_icon");
                    default:
                        return "???";
                }
            })
            ->rawColumns(['name','gender', 'type', 'status'])
            ->toJson();
    }
}
