<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title"></h1>

            <div class="card-tools">
                Note:: All Employees Attendence List
            </div>
        </div>
        <!-- /.card-header -->



        <form action="{{ route('report.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
<div class="card-body">
 <div class="container-fluid card " style="overflow:hidden">
    <div class="row">
                <div class="col-md-4">

                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" required>

                </div>

                <div class="col-md-4">

                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" required>

                </div>

                <div class="col-md-4">
                <div class="form-group  @if ($errors->has('name_english')) has-error @endif">
                        <label class="control-label">Select Employee </label>
                        <select name="employee_name" id="name" class="form-control select2 @if($errors->has('name')) is-invalid @endif" value="{!! old('department_name') !!}">
                            @foreach($emp as $employee)
                                <option value="{!! $employee->name_english !!}" @if(old('type') == $employee->name_english) {!! 'selected' !!} @endif>{!! $employee->name_english !!}</option>
                            @endforeach
                        </select>

                        @if($errors->has('name_english'))
                            <span class="error invalid-feedback"> {!! $errors->first('name_english') !!} </span>
                        @else
                            <span class="help-block" style="color:maroon">*Select Employee first ! </span>
                        @endif
                </div>
            </div>

    </div>
<div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
	</form>



</div>


        <div class="card-body p-0">

            <table class="table table-responsive-md table-responsive-lg table-responsive-md text-center">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Attendence Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Late Status</th>
                        <th>Total Duty</th>


                        @include('backend.pages.commons.timestamps_th')


                        <!-- <th class="custom_actions">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $row)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $row->getName->name_english }}</td>
                        <td>{{ $row->attendance_date }}</td>
                        <td class="custom_actions">{{ $row->inTime }}</td>
                        <td class="custom_actions">{{ $row->outTime }}</td>
                        <td>On Time</td>
                        <td>calculating</td>

                        @include('backend.pages.commons.timestamps_td')

                        <!-- <td class="custom_actions">
                            <div class="btn-group">

                                <a href="" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form method="post" class="list_delete_form" action="" accept-charset="UTF-8" >
                                    {!! csrf_field() !!}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {{ $employees->withQueryString()->links('pagination::bootstrap-5') }}
        </div>

    </div>

</section>
