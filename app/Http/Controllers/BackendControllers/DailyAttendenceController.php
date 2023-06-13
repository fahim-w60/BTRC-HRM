<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AttendenceLog;
use Auth;
use Carbon\Carbon;


class DailyAttendenceController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Daily Attendence';
        $commons['content_title'] = 'Daily Attendence';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'dailyAttendence';

        return view('backend.pages.DailyAttendence.index',compact('commons'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'attendance_date' => 'required',
            'inTime' => 'required',
            'outTime' => 'required',
        ]);

        $employees = Employee::where('status',1)->latest()->get()->pluck('id');

        //dd(sizeof($employees));

        for($i=0;$i<sizeof($employees);$i++)
        {
            $data = new AttendenceLog();
            $data->employee_id = $employees[$i];
            $data->attendance_date = $request->attendance_date;
            $data->inTime = $request->inTime;
            $data->outTime = $request->outTime;
            $data->created_by = Auth::user()->id;
            $data->created_at = Carbon::now();
            $data->save();
        }

        return redirect()->route('dailyAttendance.index')->with('success','Daily Attendence Get Successfully');

    }
}