@extends('backend')

@section('page_level_css_plugins')


@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $commons['content_title'] }}</h1>

            <div class="card-tools">
                Note:: Leave Management
            </div>
        </div>
        <form action="{{ route('leave.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Add New Leave</label>
                            <input type="text" name="leave_name" class="form-control @if($errors->has('leave_name')) is-invalid @endif" value="{!! old('leave_name') !!}" placeholder="Enter New Leave">
                            @if($errors->has('leave_name'))
                                <span class="error invalid-feedback">{!! $errors->first('leave_name') !!}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Leave Type</label>
                            <select class="form-control @if($errors->has('leave_type')) is-invalid @endif" name="leave_type">
                                <option value="" selected="">Select Status</option>
                                <option value="1">Paid</option>
                                <option value="2">Non Paid</option>
                            </select>
                            @if($errors->has('leave_type'))
                                <span class="error invalid-feedback">{!! $errors->first('leave_type') !!}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</section>



<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">All Leave List</h1>

            <div class="card-tools">
                Note:: Leave Management
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-responsive-md table-responsive-lg table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Leave Name</th>
                        <th>Leave Type</th>
                        @include('backend.pages.commons.timestamps_th')

                        <th class="custom_actions">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>অর্জিত ছুটি(Earned Leave)</td>
                        <td>Paid</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>অসাধারণ ছুটি(Extraordinary Leave)</td>
                        <td>Paid</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>মাতৃত্বকালীন ছুটি(Maternity Leave)</td>
                        <td>Paid</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>শিক্ষা ছুটি(Study Leave)</td>
                        <td>Paid</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


</div>

</section>


@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

  <!-- DataTables  & Plugins -->

@endsection

@section('page_level_js_scripts')




@endsection



