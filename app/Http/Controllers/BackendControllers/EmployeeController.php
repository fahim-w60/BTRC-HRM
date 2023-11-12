<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\AddressInfo;
use App\Models\ChildInfo;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EducationalHistory;
use App\Models\EmergencyInfo;
use App\Models\Employee;
use App\Models\OfficeInfo;
use App\Models\TrainingHistory;
use App\Models\User;
use DB;

use function App\Helpers\_imageUpload;

class EmployeeController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'employee_id'               => 'required',
            'name_english'               => 'required',
            'email'                     => 'required',
            // 'user_type'                 => 'required',
            'employee_id'               => 'required',
            'name_english'              => 'required',
            'date_of_birth'             => 'required',
            'gender'                    => 'required',
            'marital_status'            => 'required',

            'institute_name'            => 'required',
            'degree_name'               => 'required',
            'result'                    => 'required',

            'training_name'             => 'required',
            'training_start_date'       => 'required',

            'present_address_english'   => 'required',
            'nid'                       => 'numeric|required',
            'mobile'                    => 'required',

            'department_id'             => 'required',
            'designation_id'            => 'required',
            'date_of_join'              => 'required',
            'salary'                    => 'numeric|required',
        ]);



        $user = User::create([
            'employee_id'               => $request->employee_id,
            'name_english'              => $request->name_english,
            'email'                     => $request->email,
            'password'                  => 'password',

            'user_type'                 => 'employee',
            'belongs_to'                => 2,
            'role_id'                   => 3,
            'accesses'                  => $request->accesses,
            'permissions'               => 'create, read, update',

            'name_bangla'               => $request->name_bangla,
            'father_name_english'       => $request->father_name_english,
            'father_name_bangla'        => $request->father_name_bangla,
            'mother_name_english'       => $request->mother_name_english,
            'mother_name_bangla'        => $request->mother_name_bangla,
            'date_of_birth'             => $request->date_of_birth,
            'gender'                    => $request->gender,
            'marital_status'            => $request->marital_status,
            'blood_group'               => $request->blood_group,
            'nid'                       => $request->nid,
            'mobile'                    => $request->mobile,
            'present_address_english'   => $request->present_address_english,
            'present_address_bangla'    => $request->present_address_bangla,
            'permanent_address_bangla'  => $request->permanent_address_bangla,
            'department_id'             => $request->department_id,
            'designation_id'            => $request->designation_id,
            'date_of_join'              => $request->date_of_join,
            'commission_date'           => $request->commission_date,
            'promotion_date'            => $request->promotion_date,
            'telephone_office'          => $request->telephone_office,
            'telephone_home'            => $request->telephone_home,
            'pbx'                       => $request->pbx,
            'salary'                    => $request->salary,
            'emergency_contact'         => $request->emergency_contact,
            'emergency_relation'        => $request->emergency_relation,
            'employee_sign'             => _imageUpload($request->employee_sign, 'employee-sign'),
            'employee_photo'            => _imageUpload($request->employee_sign, 'employee-photo')
        ]);


        // dd($request->child_name[0]);
        // dd($request->childDateOfBirth[0]);

        foreach($request->child_name as $key=>$item){
            ChildInfo::create([
                'user_id'           => '2',
                'child_name'        => $request->child_name[$key],
                'childDateOfBirth'  => $request->childDateOfBirth[$key],
                'institute_name'    => $request->cInstitute_name[$key]
            ]);
        }

        foreach ($request->degree_name as $edu => $value) {
            EducationalHistory::create([
                'user_id'           => 2,
                'institute_name'    => $request->institute_name[$edu],
                'degree_name'       => $request->degree_name[$edu],
                'result'            => $request->result[$edu],
                'passing_year'      => $request->passing_year[$edu]
            ]);
        }

        foreach ($request->training_name as $tran => $value) {
            TrainingHistory::create([
                'user_id'               => 2,
                'training_name'         => $request->training_name[$tran],
                'training_description'  => $request->training_description[$tran],
                'training_start_date'   => $request->training_start_date[$tran],
                'training_end_date'     => $request->training_end_date[$tran]
            ]);
        }

        return redirect()
        ->route('employee.create')
        ->with('success', 'Employee created successfully!');
    }

    public function create()
    {
        $commons['page_title'] = 'Add Employee';
        $commons['content_title'] = 'Create a New Employee';
        $commons['main_menu'] = 'employee';
        $commons['current_menu'] = 'employee';

        $departments = Department::where('status',1)->get();
        $designations = Designation::where('status',1)->get();

        return view('backend.pages.employee.create',compact('commons','departments','designations'));
    }

    public function index()
    {
        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $designations = Department::where('status',1)->get();
        $departments = Designation::where('status',1)->get();

        $employee = '';

        // $data = User::join('designations', 'designations.id', '=', 'users.designation_id')
        // ->join('departments', 'departments.id', '=', 'users.department_id')
        // ->where('users.designation_id', 1)
        // ->select('users.*','departments.name')

        // ->get();
        // dd($data);

        return view('backend.pages.employee.index',compact('commons','designations','departments','employee'));
    }


    public function allEmployeeList(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);



        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $employee = User::join('designations', 'designations.id', '=', 'users.designation_id')
                ->join('departments', 'departments.id', '=', 'users.department_id')
                ->where('users.designation_id', $request->designation)
                ->select('users.*','departments.name')
                ->with('createdBy','updatedBy')
                ->paginate(3);

        $designations = Designation::where('status',1)->get();
        return view('backend.pages.employee.index',compact('commons','designations','employee'));
    }

    public function show($id)
    {
        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $employee = User::findOrFail($id);
        $departments = Department::where('status',1)->get();
        $designations = Designation::where('status',1)->get();

        return view('backend.pages.employee.view', compact('commons','designations','departments','employee'));
    }

    public function edit($id)
    {
        //
        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $employee = User::findOrFail($id);
        $departments = Department::where('status',1)->get();
        $designations = Designation::where('status',1)->get();

        return view('backend.pages.employee.edit', compact('commons','designations','departments','employee'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'employee_id'               => 'required',
            'name_english'               => 'required',
            'email'                     => 'required',
            // 'user_type'                 => 'required',
            'employee_id'               => 'required',
            'name_english'              => 'required',
            'date_of_birth'             => 'required',
            'gender'                    => 'required',
            'marital_status'            => 'required',

            'institute_name'            => 'required',
            'degree_name'               => 'required',
            'result'                    => 'required',

            'training_name'             => 'required',
            'training_start_date'       => 'required',

            'present_address_english'   => 'required',
            'nid'                       => 'numeric|required',
            'mobile'                    => 'required',

            'department_id'             => 'required',
            'designation_id'            => 'required',
            'date_of_join'              => 'required',
            'salary'                    => 'numeric|required',
        ]);



        $user = User::find($request->id)->update([
            'employee_id'               => $request->employee_id,
            'name_english'              => $request->name_english,
            'email'                     => $request->email,
            'password'                  => 'password',

            'user_type'                 => 'employee',
            'belongs_to'                => 2,
            'role_id'                   => 3,
            'accesses'                  => $request->accesses,
            'permissions'               => 'find($id)->update, read, update',

            'name_bangla'               => $request->name_bangla,
            'father_name_english'       => $request->father_name_english,
            'father_name_bangla'        => $request->father_name_bangla,
            'mother_name_english'       => $request->mother_name_english,
            'mother_name_bangla'        => $request->mother_name_bangla,
            'date_of_birth'             => $request->date_of_birth,
            'gender'                    => $request->gender,
            'marital_status'            => $request->marital_status,
            'blood_group'               => $request->blood_group,
            'nid'                       => $request->nid,
            'mobile'                    => $request->mobile,
            'present_address_english'   => $request->present_address_english,
            'present_address_bangla'    => $request->present_address_bangla,
            'permanent_address_bangla'  => $request->permanent_address_bangla,
            'department_id'             => $request->department_id,
            'designation_id'            => $request->designation_id,
            'date_of_join'              => $request->date_of_join,
            'commission_date'           => $request->commission_date,
            'promotion_date'            => $request->promotion_date,
            'telephone_office'          => $request->telephone_office,
            'telephone_home'            => $request->telephone_home,
            'pbx'                       => $request->pbx,
            'salary'                    => $request->salary,
            'emergency_contact'         => $request->emergency_contact,
            'emergency_relation'        => $request->emergency_relation,
            'employee_sign'             => _imageUpload($request->employee_sign, 'employee-sign'),
            'employee_photo'            => _imageUpload($request->employee_sign, 'employee-photo')
        ]);


        // dd($request->child_name[0]);
        // dd($request->childDateOfBirth[0]);


        foreach($request->child_name as $key=>$item){
            $childInfo =ChildInfo::find($request->id);
            if(isset($childInfo)){
                $childInfo =ChildInfo::find($request->id)->update([
                    'user_id'           => $user->id,
                    'child_name'        => $request->child_name[$key],
                    'childDateOfBirth'  => $request->childDateOfBirth[$key],
                    'institute_name'    => $request->cInstitute_name[$key]
                ]);
            }else{
                $childInfo =ChildInfo::create([
                    'user_id'           => $user->id,
                    'child_name'        => $request->child_name[$key],
                    'childDateOfBirth'  => $request->childDateOfBirth[$key],
                    'institute_name'    => $request->cInstitute_name[$key]
                ]);
            }
        }

        foreach ($request->degree_name as $edu => $value) {
            EducationalHistory::find($request->id)->update([
                'user_id'           => $user->id,
                'institute_name'    => $request->institute_name[$edu],
                'degree_name'       => $request->degree_name[$edu],
                'result'            => $request->result[$edu],
                'passing_year'      => $request->passing_year[$edu]
            ]);
        }

        foreach ($request->training_name as $tran => $value) {
            TrainingHistory::find($request->id)->update([
                'user_id'               => $user->id,
                'training_name'         => $request->training_name[$tran],
                'training_description'  => $request->training_description[$tran],
                'training_start_date'   => $request->training_start_date[$tran],
                'training_end_date'     => $request->training_end_date[$tran]
            ]);
        }

        return redirect()
        ->back()
        ->with('success', 'Employee update successfully!');

    }
}