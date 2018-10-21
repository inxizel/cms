<?php

namespace Zent\User\Http\Controllers;

use Zent\User\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Module;
use View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('user');
        View::share('display_name', $display_name);
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

            if ($this->checkUniqueEmail($data['email']))
            {
                return response()->json([ 'err' => true, 'msg' => trans('global.email_exists'), 'type' => 'email']);
            }

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
            ->editColumn('gender', function($user) {
                switch ($user->gender)
                {
                    case 1:
                        return trans('global.male_icon');
                    case 0:
                        return trans('global.female_icon');
                    default:
                        return "???";
                }
            })
            ->editColumn('type', function($user) {
                switch ($user->type)
                {
                    case 1:
                        return '<span style="font-weight: bold">'.trans('global.admin').'</span>';
                    case 0:
                        return trans('global.user');
                    default:
                        return "";
                }
            })
            ->addColumn('action', function($user) {
                $txt = "";

                $txt .= '<button data-id="'.$user->id.'" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20" data-tooltip="tooltip" data-placement="left" title="'.trans('global.edit').'"/><i class="fa fa-pencil" aria-hidden="true"></i></button>';

                $txt .= '<button data-id="'.$user->id.'" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20" data-tooltip="tooltip" data-placement="right" title="'.trans('global.delete').'"/><i class="fa fa-trash" aria-hidden="true"></i></button>';

                return $txt;
            })
            ->editColumn('status', function ($user) {
                switch ($user->status)
                {
                    case 1:
                        return trans('global.active_icon');
                    case 0:
                        return trans("global.deactive_icon");
                    default:
                        return "???";
                }
            })
            ->rawColumns(['name','gender', 'type', 'status', 'action'])
            ->toJson();
    }

    public static function checkUniqueEmail($email)
    {
        $flag = User::where('email', $email)->count();

        return $flag > 0 ? true : false;
    }
}
