<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use DB;

class EmployeeController extends Controller
{
    public function create()
    {
        $commons['page_title'] = 'Add Employee';
        $commons['content_title'] = 'Create a New Employee';
        $commons['main_menu'] = 'employee';
        $commons['current_menu'] = 'employee';

        return view('backend.pages.employee.create',compact('commons'));
    }

    public function index()
    {
        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $designations = Designation::all();
        $departments = Department::all();
        return view('backend.pages.employee.index',compact('commons','designations','departments'));
    }


    public function employee_list(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);



        $data = Employee::join('designations', 'designations.id', '=', 'employees.designation_id')
                ->join('departments', 'departments.id', '=', 'employees.department_id')
                ->where('employees.designation_id', $request->designation)
                ->select('employees.*','departments.name')
                ->with(['getUser','createdBy', 'updatedBy'])
                ->get();


        return response()->json($data);
    }
}