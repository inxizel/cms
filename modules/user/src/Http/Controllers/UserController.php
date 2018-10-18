<?php

namespace Zent\User\Http\Controllers;

use Zent\User\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        User::create($request->all());

        Session::flash('create_success', trans('global.create_success'));

        return redirect()->route('user.index');
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
}
