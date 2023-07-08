<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AttendenceLog;

class ReportController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Attendance Report';
        $commons['content_title'] = 'Attendance Report';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'attendance_report';

        $emp = User::where('status',1)->with(['createdBy','updatedBy'])->get();

        $employees = AttendenceLog::where('status',1)
        ->with(['getName'])
        ->orderBy('employee_id','asc')
        ->paginate(20);

        //dd($employees);

        return view('backend.pages.dailyAttendence.show',compact('commons','emp','employees'));
    }

    public function store(Request $request)
    {
        $commons['page_title'] = 'Attendance Report';
        $commons['content_title'] = 'Attendance Report';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'attendance_report';

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'name_english' => 'required',
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $name = $request->name_english;

        $reportData[] = '';
    }
}