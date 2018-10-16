<?php

namespace Zent\{Core}\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Zent\{Core}\Models\{Core};
use Illuminate\Http\Request;

class {Core}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${core}s = {Core}::orderBy('id', 'desc')->get();

        return view('{core}::backend.index', compact('{core}s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('{core}::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {Core}::create($request->all());

        Session::flash('create_success', trans('global.create_success'));

        return redirect()->route('{core}.index');
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
        ${core} = {Core}::find($id);

        return view('{core}::backend.edit', compact('{core}', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {Core}::find($id)->update($request->all());

        Session::flash('update_success', trans('global.update_success'));

        return redirect()->route('{core}.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {Core}::find($request->id)->delete();

        Session::flash('delete_success', trans('global.delete_success'));

        return response()->json([ 'err' => false ]);
    }

    /**
     * Return view front end.
     *
     */
    public function home()
    {
        return view('{core}::frontend.index');
    }
}
