@extends('backend')

@section('page_level_css_plugins')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('page_level_css_files')
    {{-- <link rel="stylesheet" href="{{  asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}"> --}}

    {{--
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<!-- Tempusdominus Bootstrap 4 -->

<!-- Select2 -->

<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<!-- BS Stepper -->

<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/dropzone/min/dropzone.min.css') }}"> --}}
@endsection

@section('content')
    <section class="content">
        {{ $errors }}
        <form action="{{ route('employee.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white text-center">STEP 1/7 - Personal Info</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" name="id" value="{{ $employee->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Id(Unique)</label>
                                <input type="number"
                                    class="form-control @if ($errors->has('employee_id')) is-invalid @endif"
                                    name="employee_id" value="{{ $employee->employee_id }}"
                                    placeholder="Enter Employee Unique Id">
                                @if ($errors->has('employee_id'))
                                    <span class="error invalid-feedback">{!! $errors->first('employee_id') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Name(English)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('name_english')) is-invalid @endif"
                                    name="name_english" value="{{ $employee->name_english }}"
                                    placeholder="Enter Employee Name(English)">
                                @if ($errors->has('name_english'))
                                    <span class="error invalid-feedback">{!! $errors->first('name_english') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Name(Bangla)</label>
                                <input type="text"
                                    class="bangla-input form-control @if ($errors->has('name_bangla')) is-invalid @endif"
                                    name="name_bangla" value="{{ $employee->name_bangla }}"
                                    placeholder="Enter Employee Name(Bangla)">
                                @if ($errors->has('name_bangla'))
                                    <span class="error invalid-feedback">{!! $errors->first('name_bangla') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Father Name(English)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('father_name_english')) is-invalid @endif"
                                    name="father_name_english" value="{{ $employee->father_name_english }}"
                                    placeholder="Enter Employee Father Name(English)">
                                @if ($errors->has('father_name_english'))
                                    <span class="error invalid-feedback">{!! $errors->first('father_name_english') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Father Name(Bangla)</label>
                                <input type="text" id=""
                                    class="bangla-input form-control @if ($errors->has('father_name_bangla')) is-invalid @endif"
                                    name="father_name_bangla" value="{{ $employee->father_name_bangla }}"
                                    placeholder="Enter Employee Father Name(Bangla)">
                                @if ($errors->has('father_name_bangla'))
                                    <span class="error invalid-feedback">{!! $errors->first('father_name_bangla') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Mother Name(English)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('mother_name_english')) is-invalid @endif"
                                    name="mother_name_english" value="{{ $employee->mother_name_english }}"
                                    placeholder="Enter Employee Mother Name(English)">
                                @if ($errors->has('mother_name_english'))
                                    <span class="error invalid-feedback">{!! $errors->first('mother_name_english') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Mother Name(Bangla)</label>
                                <input type="text" id="bangla-input"
                                    class="bangla-input form-control @if ($errors->has('mother_name_bangla')) is-invalid @endif"
                                    name="mother_name_bangla" value="{{ $employee->mother_name_bangla }}"
                                    placeholder="Enter Employee Mother Name(Bangla)">
                                @if ($errors->has('mother_name_bangla'))
                                    <span class="error invalid-feedback">{!! $errors->first('mother_name_bangla') !!}</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Spouse Name</label>
                                            <input type="text" class="form-control @if ($errors->has('spouse_name1')) is-invalid @endif" placeholder="Enter Employee Spouse Name" wire:model="spouse_name1">
                                            @if ($errors->has('spouse_name1'))
                                                <span class="error invalid-feedback">{!! $errors->first('spouse_name1') !!}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Spouse Name</label>
                                            <input type="text"  class="form-control @if ($errors->has('spouse_name2')) is-invalid @endif" placeholder="Enter Employee Spouse Name" wire:model="spouse_name2">
                                            @if ($errors->has('spouse_name2'))
                                                <span class="error invalid-feedback">{!! $errors->first('spouse_name2') !!}</span>
                                            @endif
                                        </div>
                                    </div> --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Date Of Birth</label>
                                {{-- <input type="date" class="form-control @if ($errors->has('date_of_birth')) is-invalid @endif" placeholder="Date Of Birth" wire:model="date_of_birth"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="date_of_birth"
                                        value="{{ $employee->date_of_birth }}" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                                @if ($errors->has('date_of_birth'))
                                    <span class="error invalid-feedback">{!! $errors->first('date_of_birth') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blood Group</label>
                                <select
                                    class="form-control select2 @if ($errors->has('marital_status')) is-invalid @endif"
                                    name="blood_group">
                                    <option {{ old('blood_group') ?? 'selected' }}>Select Blood Group</option>
                                    <option value="A+" {{ $employee->blood_group == 'A+' ? 'selected' : '' }}>A
                                        positive
                                        (A+)</option>
                                    <option value="A-" {{ $employee->blood_group == 'A-' ? 'selected' : '' }}>A
                                        negative
                                        (A-)</option>
                                    <option value="B+" {{ $employee->blood_group == 'B+' ? 'selected' : '' }}>B
                                        positive
                                        (B+)</option>
                                    <option value="B-" {{ $employee->blood_group == 'B-' ? 'selected' : '' }}>B
                                        negative
                                        (B-)</option>
                                    <option value="AB+" {{ $employee->blood_group == 'AB+' ? 'selected' : '' }}>AB
                                        positive (AB+)</option>
                                    <option value="AB-" {{ $employee->blood_group == 'AB-' ? 'selected' : '' }}>AB
                                        negative (AB-)</option>
                                    <option value="O+" {{ $employee->blood_group == 'O+' ? 'selected' : '' }}>O
                                        positive
                                        (O+)</option>
                                    <option value="O-" {{ $employee->blood_group == 'O-' ? 'selected' : '' }}>O
                                        negative
                                        (O-)</option>
                                </select>
                                @if ($errors->has('blood_group'))
                                    <span class="error invalid-feedback">{!! $errors->first('blood_group') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gender</label><br>
                                <select  name="gender"
                                    class="form-control select2 @if ($errors->has('gender')) is-invalid @endif"
                                    style="width: 100%;">
                                    <option {{ old('gender') ?? 'selected' }}>Select Gender</option>
                                    <option value="1" {{ $employee->gender == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ $employee->gender == 2 ? 'selected' : '' }}>Female</option>
                                    <option value="3" {{ $employee->gender == 3 ? 'selected' : '' }}>Others</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="error invalid-feedback">{!! $errors->first('gender') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marital Status</label><br>
                                <select  name="marital_status" id="maritalStatus"
                                    class="form-control select2 @if ($errors->has('marital_status')) is-invalid @endif">
                                    <option {{ old('marital_status') ?? 'selected' }}>Select Status</option>
                                    <option value="1" {{ $employee->marital_status == 1 ? 'selected' : '' }}>Married
                                    </option>
                                    <option value="2" {{ $employee->marital_status == 2 ? 'selected' : '' }}>
                                        Unmarried
                                    </option>
                                </select>
                                @if ($errors->has('marital_status'))
                                    <span class="error invalid-feedback">{!! $errors->first('marital_status') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="exampleInputEmail1">Employee Signature</label>
                                            <input type="file" class="form-control mb-1" id="formFile2" onChange="mainThamUrl2(this)" wire:model="employee_sign"> --}}
                                <label for="exampleInputFile">Police Verification (If Has)</label>
                                <div class="custom-file mb-2">
                                    <input type="file" id="photoPathInput" name="employee_sign"
                                        class="custom-file-input" id="formFile" onChange="mainThamUrl2(this)">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <img src="" id="mainThmb2" />
                            </div>
                        </div>


                    </div>
                </div>
            </div>



            <div id="childInfoSection">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">STEP 2/7 - Child Info(If has)</div>
                    <div class="d-flex justify-content-end mt-3" style="margin-right: 19px;">
                        <button type="button" class="btn btn-outline-secondary" id="child_info">
                            <span class="visually-hidden">Add More</span>
                        </button>
                    </div>

                    <div class="card-body" id="child-info-container">
                        <div class="row">

                            @empty($employee->getChildInfo[0])
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Child Name(English)</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('child_name')) is-invalid @endif"
                                        placeholder="Enter Child Name(English)" name="child_name[]"
                                        value="{{ old('child_name[0]') }}">
                                    @if ($errors->has('child_name'))
                                        <span class="error invalid-feedback">{!! $errors->first('child_name') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Birth Date Of Child</label>
                                    {{-- <input type="date" class="form-control @if ($errors->has('childDateOfBirth')) is-invalid @endif" placeholder="Enter Birth Date Of Child" name="childDateOfBirth[]"> --}}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime"
                                        name="childDateOfBirth[]" value="{{ old('childDateOfBirth[0]') }}"
                                            data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                    </div>
                                    @if ($errors->has('childDateOfBirth'))
                                        <span class="error invalid-feedback">{!! $errors->first('childDateOfBirth') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3" style="margin-top: 2rem!important;">
                                <div class="form-group form-check" style="margin-left: 51px !important">
                                    <input type="checkbox" id="checkboxSuccess1">
                                    {{-- <input type="checkbox" name="educational_status[]" class="form-check-input" id="exampleCheck1"> --}}
                                    <label for="exampleInputEmail1">Educational Status</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Institution Name(English)</label>
                                    <input type="text" class="form-control" placeholder="Institution Name(If has)"
                                        name="cInstitute_name[]" value="{{ old('cInstitute_name[0]') }}">
                                </div>
                            </div>
                            @endempty


                            @foreach ($employee->getChildInfo as $child)
                            <input type="hidden" name="child_id[]" value="{{ $child->id }}">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Child Name(English)</label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('child_name')) is-invalid @endif"
                                            placeholder="Enter Child Name(English)" name="child_name[]"
                                            value="{{ $child->child_name }}">
                                        @if ($errors->has('child_name'))
                                            <span class="error invalid-feedback">{!! $errors->first('child_name') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Birth Date Of Child</label>
                                        {{-- <input type="date" class="form-control @if ($errors->has('childDateOfBirth')) is-invalid @endif" placeholder="Enter Birth Date Of Child" name="childDateOfBirth[]"> --}}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                data-inputmask-alias="datetime" name="childDateOfBirth[]"
                                                value="{{ $child->childDateOfBirth }}"
                                                data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                        </div>
                                        @if ($errors->has('childDateOfBirth'))
                                            <span class="error invalid-feedback">{!! $errors->first('childDateOfBirth') !!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-top: 2rem!important;">
                                    <div class="form-group form-check" style="margin-left: 51px !important">
                                        <input type="checkbox" id="checkboxSuccess1"
                                            {{ $child->educational_status ? 'checked' : '' }}>
                                        {{-- <input type="checkbox" name="educational_status[]" class="form-check-input" id="exampleCheck1"> --}}
                                        <label for="exampleInputEmail1">Educational Status</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Institution Name(English)</label>
                                        <input type="text" class="form-control"
                                            placeholder="Institution Name(If has)" name="cInstitute_name[]"
                                            value="{{ $child->institute_name }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header bg-primary text-white text-center">STEP 3/7 - Educational History</div>
                <div class="d-flex justify-content-end mt-3" style="margin-right: 19px;">
                    <button type="button" class="btn btn-outline-secondary" id="education_info">
                        <span class="visually-hidden">Add More</span>
                    </button>
                </div>
                <div class="card-body" id="education-info-container">
                    <div class="row">
                        @empty($employee->getEducationalHistory[0])
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="institute_name">Institute Name(English)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('institute_name[0]')) is-invalid @endif"
                                    placeholder="Institute Name(English)" name="institute_name[]" value="">
                                @if ($errors->has('institute_name'))
                                    <span class="error invalid-feedback">{!! $errors->first('institute_name') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="degree">Degree Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('degree_name[0]')) is-invalid @endif"
                                    placeholder="Degree" name="degree_name[]" value="">
                                @if ($errors->has('degree_name'))
                                    <span class="error invalid-feedback">{!! $errors->first('degree_name') !!}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="result">Result</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('result[0]')) is-invalid @endif"
                                    placeholder="Result" name="result[]">
                                @if ($errors->has('result'))
                                    <span class="error invalid-feedback">{!! $errors->first('result') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="passing_year">Passing Year</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('passing_year[0]')) is-invalid @endif"
                                    placeholder="Passing Year" name="passing_year[]">
                                @if ($errors->has('passing_year'))
                                    <span class="error invalid-feedback">{!! $errors->first('passing_year') !!}</span>
                                @endif
                            </div>
                        </div>

                        @endempty

                        @foreach ($employee->getEducationalHistory as $edu)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="institute_name">Institute Name(English)</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('institute_name')) is-invalid @endif"
                                        placeholder="Institute Name(English)" name="institute_name[]"
                                        value="{{ $edu->institute_name }}">
                                    @if ($errors->has('institute_name'))
                                        <span class="error invalid-feedback">{!! $errors->first('institute_name') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree">Degree Name</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('degree_name')) is-invalid @endif"
                                        placeholder="Degree" name="degree_name[]" value="{{ $edu->degree_name }}">
                                    @if ($errors->has('degree_name'))
                                        <span class="error invalid-feedback">{!! $errors->first('degree_name') !!}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="result">Result</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('result')) is-invalid @endif"
                                        value="{{ $edu->result }}" placeholder="Result" name="result[]">
                                    @if ($errors->has('result'))
                                        <span class="error invalid-feedback">{!! $errors->first('result') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="passing_year">Passing Year</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('passing_year')) is-invalid @endif"
                                        placeholder="Passing Year" name="passing_year[]"
                                        value="{{ $edu->passing_year }}">
                                    @if ($errors->has('passing_year'))
                                        <span class="error invalid-feedback">{!! $errors->first('passing_year') !!}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header bg-primary text-white text-center">STEP 4/7 - Training History</div>
                <div class="d-flex justify-content-end mt-3" style="margin-right: 19px;">
                    <button type="button" class="btn btn-outline-secondary" id="training_info">
                        <span class="visually-hidden">Add More</span>
                    </button>
                </div>
                <div class="card-body" id="trainig-info-container">
                    @empty($employee->getTrainingHistory[0])
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_name">Training Name</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('training_name')) is-invalid @endif"
                                    placeholder="Training Name" name="training_name[]" value="{{ old('training_name[0]') }}">
                                @if ($errors->has('training_name'))
                                    <span class="error invalid-feedback">{!! $errors->first('training_name') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_description">Training Description</label>
                                {{-- <input type="text" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                <textarea name="training_description[]" class="form-control" id="" cols="10" rows="1">{{ old('training_description[0]') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_start_date">Training Start Date</label>
                                {{-- <input type="date" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime"
                                    name="training_start_date[]" value="{{ old('training_start_date[0]') }}"
                                        data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_end_date">Training End Date</label>
                                {{-- <input type="date" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime"
                                    name="training_end_date[]" value="{{ old('training_end_date[0]') }}"
                                        data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endempty
                    @foreach ($employee->getTrainingHistory as $TrainingHistory)
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_name">Training Name</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('training_name')) is-invalid @endif"
                                        placeholder="Training Name" name="training_name[]"
                                        value="{{ $TrainingHistory->training_name }}">
                                    @if ($errors->has('training_name'))
                                        <span class="error invalid-feedback">{!! $errors->first('training_name') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_description">Training Description</label>
                                    {{-- <input type="text" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                    <textarea name="training_description[]" class="form-control" id="" cols="10" rows="1">{{ $TrainingHistory->training_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_start_date">Training Start Date</label>
                                    {{-- <input type="date" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            data-inputmask-alias="datetime" name="training_start_date[]"
                                            value="{{ $TrainingHistory->training_start_date }}"
                                            data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_end_date">Training End Date</label>
                                    {{-- <input type="date" class="form-control @if ($errors->has('child_name')) is-invalid @endif" placeholder="Training Name" name="child_name[]"> --}}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            data-inputmask-alias="datetime" name="training_end_date[]"
                                            value="{{ $TrainingHistory->training_end_date }}"
                                            data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary text-white text-center">STEP 5/7 - Address Info</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Present Address(English)</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('present_address_english')) is-invalid @endif"
                                    name="present_address_english" value="{{ $employee->present_address_english }}"
                                    placeholder="Enter Present Address(English)">
                                @if ($errors->has('present_address_english'))
                                    <span class="error invalid-feedback">{!! $errors->first('present_address_english') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Present Address(Bangla)</label>
                                <input type="text"
                                    class="bangla-input form-control @if ($errors->has('present_address_bangla')) is-invalid @endif"
                                    name="present_address_bangla" value="{{ $employee->present_address_bangla }}"
                                    placeholder="Enter Present Address(Bangla)">
                                @if ($errors->has('present_address_bangla'))
                                    <span class="error invalid-feedback">{!! $errors->first('present_address_bangla') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Permanent Address(Bangla)</label>
                                <input type="text"
                                    class="bangla-input form-control @if ($errors->has('permanent_address_bangla')) is-invalid @endif"
                                    name="permanent_address_bangla" value="{{ $employee->permanent_address_bangla }}"
                                    placeholder="Enter Permanent Address(Bangla)">
                                @if ($errors->has('permanent_address_bangla'))
                                    <span class="error invalid-feedback">{!! $errors->first('permanent_address_bangla') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NID</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('nid')) is-invalid @endif"
                                    name="nid" value="{{ $employee->nid }}" placeholder="Enter NID">
                                @if ($errors->has('nid'))
                                    <span class="error invalid-feedback">{!! $errors->first('nid') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="mobile" value="{{ $employee->mobile }}"
                                        class="form-control" data-inputmask='"mask": "999 999-99999"' data-mask>
                                </div>
                                @if ($errors->has('mobile'))
                                    <span class="error invalid-feedback">{!! $errors->first('mobile') !!}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('email')) is-invalid @endif"
                                    name="email" value="{{ $employee->email }}" placeholder="Enter Email">
                                @if ($errors->has('email'))
                                    <span class="error invalid-feedback">{!! $errors->first('email') !!}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="card mb-3">
                <div class="card-header bg-primary text-white text-center">STEP 6/7 - Office Info</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label><br>
                                <select name="department_id"
                                    class="form-control select2 @if ($errors->has('department_id')) is-invalid @endif">
                                    <option>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected':''}}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                    <span class="error invalid-feedback">{!! $errors->first('department_id') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation</label><br>
                                <select name="designation_id"
                                    class="form-control select2 @if ($errors->has('designation_id')) is-invalid @endif">
                                    <option>Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}" {{ $employee->designation_id == $designation->id ? 'selected':''}}>{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('designation_id'))
                                    <span class="error invalid-feedback">{!! $errors->first('designation_id') !!}</span>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_of_join">Date Of Join</label>
                                {{-- <input type="date"  class="form-control @if ($errors->has('date_of_join')) is-invalid @endif" wire:model="date_of_join"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="date_of_join" class="form-control" value="{{ $employee->date_of_join }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                                @if ($errors->has('date_of_join'))
                                    <span class="error invalid-feedback">{!! $errors->first('date_of_join') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Commission Date</label>
                                {{-- <input type="date" class="form-control @if ($errors->has('commission_date')) is-invalid @endif" wire:model="commission_date"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="commission_date" class="form-control" value="{{ $employee->commission_date }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                                @if ($errors->has('commission_date'))
                                    <span class="error invalid-feedback">{!! $errors->first('commission_date') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Promotion Date</label>
                                {{-- <input type="date" class="form-control @if ($errors->has('promotion_date')) is-invalid @endif" wire:model="promotion_date"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="promotion_date" class="form-control"
                                    value="{{ $employee->promotion_date }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                </div>
                                @if ($errors->has('promotion_date'))
                                    <span class="error invalid-feedback">{!! $errors->first('promotion_date') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telephone Of Office</label>
                                {{-- <input type="text" class="form-control @if ($errors->has('telephone_office')) is-invalid @endif" placeholder="Telephone Of Office" wire:model="telephone_office"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="telephone_office"
                                        value="{{ $employee->telephone_office }}" class="form-control"
                                        data-inputmask='"mask": "999 999-99999"' data-mask>
                                </div>
                                @if ($errors->has('telephone_office'))
                                    <span class="error invalid-feedback">{!! $errors->first('telephone_office') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telephone Of Home</label>
                                {{-- <input type="text" class="form-control @if ($errors->has('v')) is-invalid @endif" placeholder="Telephone Of Home" wire:model="telephone_home"> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control"
                                        data-inputmask='"mask": "999 999-99999"' name="telephone_home"
                                        value="{{ $employee->telephone_home }}" data-mask>
                                </div>
                                @if ($errors->has('telephone_home'))
                                    <span class="error invalid-feedback">{!! $errors->first('telephone_home') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pbx">PBX</label>
                                <input type="text" name="pbx" value="{{ $employee->pbx }}"
                                    class="form-control @if ($errors->has('pbx')) is-invalid @endif"
                                    placeholder="PBX">
                                @if ($errors->has('pbx'))
                                    <span class="error invalid-feedback">{!! $errors->first('pbx') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Salary</label>
                                <input type="number"
                                    class="form-control @if ($errors->has('salary')) is-invalid @endif"
                                    name="salary" value="{{ $employee->salary }}" placeholder="Enter Salary">
                                @if ($errors->has('salary'))
                                    <span class="error invalid-feedback">{!! $errors->first('salary') !!}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="card mb-3">
                <div class="card-header bg-primary text-white text-center">STEP 7/7 - Emergency Info</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emergency_contact">Emergency Contact</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="emergency_contact"
                                        value="{{ $employee->emergency_contact }}" class="form-control"
                                        data-inputmask='"mask": "999 999-99999"' data-mask>
                                </div>
                                @if ($errors->has('emergency_contact'))
                                    <span class="error invalid-feedback">{!! $errors->first('emergency_contact') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emergency_relation">Relation With Emergency Contact</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('emergency_relation')) is-invalid @endif"
                                    value="{{ $employee->emergency_relation }}"
                                    placeholder="Relation With Emergency Contatct">
                                @if ($errors->has('emergency_relation'))
                                    <span class="error invalid-feedback">{!! $errors->first('emergency_relation') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="exampleInputEmail1">Employee Photo</label>
                                                    <input type="file" class="form-control mb-1" id="formFile" onChange="mainThamUrl(this)" name="employee_photo"> --}}
                                <label for="employee_photo">Employee Photo</label>
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" name="employee_photo"
                                        id="formFile" onChange="mainThamUrl(this)">
                                    <label class="custom-file-label" for="employee_photo">Choose file</label>
                                </div>
                                <img src="" id="mainThmb" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="exampleInputEmail1">Employee Signature</label>
                                                    <input type="file" class="form-control mb-1" id="formFile2" onChange="mainThamUrl2(this)" wire:model="employee_sign"> --}}
                                <label for="exampleInputFile">Employee Signature</label>
                                <div class="custom-file mb-2">
                                    <input type="file" name="employee_sign" class="custom-file-input"
                                        id="formFile" onChange="mainThamUrl1(this)">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <img src="" id="mainThmb1" />
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </section>
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    {{-- <!-- Select2 -->


{{-- <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>

<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
 --}}
    {{-- <script src="{{  asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}


    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.bangla@1/dist/jquery.bangla.js"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>





    <script>
        $(document).ready(function() {
            $('.bangla-input').bangla({
                enable: true
            });

            $('#datemask').inputmask('dd-mm-yyyy', {
                'placeholder': 'dd-mm-yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm-dd-yyyy', {
                'placeholder': 'mm-dd-yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            $("#child_info").on("click", function() {
                var clonedRow = $("#child-info-container .row").first().clone();
                clonedRow.find("input").val("");
                var removeButton = $('<div>' +
                    '<button type="button" class="btn btn-outline-danger" style="margin-left: 8px;">' +
                    '<span class="visually-hidden">Remove</span>' +
                    '</button>' +
                    '</div>');
                clonedRow.append(removeButton);
                removeButton.on("click", function() {
                    $(this).closest(".row").remove();
                });
                $("#child-info-container").append(clonedRow);
            });

            $("#education_info").on("click", function() {
                var clonedRow = $("#education-info-container .row").first().clone();
                clonedRow.find("input").val("");
                var removeButton = $('<div>' +
                    '<button type="button" class="btn btn-outline-danger" style="margin-left: 8px;">' +
                    '<span class="visually-hidden">Remove</span>' +
                    '</button>' +
                    '</div>');
                clonedRow.append(removeButton);
                removeButton.on("click", function() {
                    $(this).closest(".row").remove();
                });
                $("#education-info-container").append(clonedRow);
            });

            $("#training_info").on("click", function() {
                var clonedRow = $("#trainig-info-container .row").first().clone();
                clonedRow.find("input").val("");
                var removeButton = $('<div>' +
                    '<button type="button" class="btn btn-outline-danger" style="margin-left: 8px;">' +
                    '<span class="visually-hidden">Remove</span>' +
                    '</button>' +
                    '</div>');
                clonedRow.append(removeButton);
                removeButton.on("click", function() {
                    $(this).closest(".row").remove();
                });
                $("#trainig-info-container").append(clonedRow);
            });
        });
    </script>

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function mainThamUrl1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb1').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function mainThamUrl2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoPathInput').val("{{ asset('Custom/img/small_btrc.png') }}");
                    $('#mainThmb2').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
