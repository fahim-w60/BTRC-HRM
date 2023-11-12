@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('all.employee.list') }}" id="myForm" method="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group d-flex">
                                <div class="col-md-3">
                                    <label for="designation">Select Designation</label>
                                </div>
                                <div class="col-md-5">
                                    <select name="designation" id="" class="form-control @if($errors->has('designation')) is-invalid @endif">
                                        <option value="" selected>Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{$designation->id  }}">{{ $designation->name }}</option>
                                            @endforeach
                                    </select>
                                    @if($errors->has('designation'))
                                        <span class="error invalid-feedback">{!! $errors->first('designation') !!}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="card-body p-0 mt-2">
                    <table class="table table-responsive-md table-responsive-lg table-responsive-sm text-center" id="example1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>

                                @include('backend.pages.commons.timestamps_th')

                                <th class="custom_actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @if($employee)
                                    @foreach($employee as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $row->name_english }}</td>
                                            <td>{{ $row->email  }}</td>

                                            @include('backend.pages.commons.timestamps_td')

                                            <td class="custom_actions">
                                                <div class="btn-group">
                                                    <a href="{{ route('employee.show', $row->id) }}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                                        <i class="far fa fa-eye"></i>

                                                    <a href="{{ route('employee.edit', $row->id) }}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    </a>
                                                    <form method="post" class="list_delete_form" action="#" accept-charset="UTF-8" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                    </table>
                </div>
            @if($employee)
                <div class="card-footer">
                    {{ $employee->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
</div>
    </section>
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
<script>

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
