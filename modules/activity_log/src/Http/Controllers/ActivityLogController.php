<?php

namespace Zent\ActivityLog\Http\Controllers;

use Zent\ActivityLog\Models\ActivityLog;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use View;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

        $display_name = Module::getDisplayName('activity_log');
        View::share('display_name', $display_name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activityLog::backend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activityLog::backend.create');
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
            ActivityLog::create($data);

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
        $activityLog = ActivityLog::find($id);

        return view('activityLog::backend.edit', compact('activityLog', 'id'));
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
            ActivityLog::find($data['activity_log_id'])->update($data);

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
            ActivityLog::find($request->id)->delete();

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
        return view('activityLog::frontend.index');
    }

    /**
     * DataTables get list activityLog
     */
    public static function getListActivityLog()
    {
        $activities = ActivityLog::orderBy('id', 'desc')->get();

        return Datatables::of($activities)
            ->addIndexColumn()
            ->editcolumn('created_at', function($activity){
                $date = date('H:i | d-m-Y', strtotime($activity->created_at));

                return $date;
            })
            ->editColumn('causer_id', function($activity){
                if($activity->causer_id){
                    return "<span class='user-name'>".$activity->user->name."</span>";
                }else{
                    return "<span class='user-name'>(chưa có)</span>";
                }
            })
            ->editColumn('userAgent', function($activity){
                $userAgentDetails = self::details($activity->userAgent);

                $data = self::getUserAgent($userAgentDetails);

                return "<i class='fa ".$data['platformIcon']."'><span>".$userAgentDetails['platform']."</span></i><i class='fa ".$data['browserIcon']."'><span>".$userAgentDetails['browser']."</span></i><sup>".$userAgentDetails['version']."</sup>";
            })
            ->editColumn('description', function($activity){
                if(strlen($activity->description)>70){
                    $link =  substr($activity->description, 0, 70).'...';
                }else{
                    $link = $activity->description;
                }

                return $link;
            })
            ->editColumn('methodType', function($activity){
                if(strtoupper($activity->methodType)=='GET'){
                    $string = "<span class='dt-method' style='background-color: #659be0;'>".$activity->methodType."</span>";
                }elseif (strtoupper($activity->methodType)=='POST') {
                    $string = "<span class='dt-method' style='background-color: orange;'>".$activity->methodType."</span>";
                }elseif (strtoupper($activity->methodType)=='DELETE') {
                    $string = "<span class='dt-method' style='background-color: red;'>".$activity->methodType."</span>";
                }elseif (strtoupper($activity->methodType)=='PUT') {
                    $string = "<span class='dt-method' style='background-color: blue;'>".$activity->methodType."</span>";
                }elseif (strtoupper($activity->methodType)=='PATH') {
                    $string = "<span class='dt-method' style='background-color: green;'>".$activity->methodType."</span>";
                }

                return $string;
            })
            ->addColumn('action', function($activity){
                return '<a type="button" href="'.route('list-activity-users', ['user_id'=>$activity->causer_id, 'activity_id'=>$activity->id]).'" class="btn btn-xs blue" data-tooltip="tooltip" title="Xem chi tiết">
                            <i class="fa  fa-eye"></i>  
                          </a>';
            })
            ->rawColumns(['causer_id', 'userAgent', 'description', 'methodType', 'action'])
            ->toJson();
    }
}
