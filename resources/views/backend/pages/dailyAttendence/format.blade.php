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
                Note:: Employee Attendance Report
            </div>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <img src="{{ asset("Custom/img/btrc-logo.png") }}" style="height: 80px" alt="">
            </div>
            <br><br>
            <div class="d-flex justify-content-between">
                <p>Name: {{ $name->name_english }}</p>
                <p>Designation: {{ $des->name }}</p>
                <p>Department: {{ $dept->name }}</p>
            </div>
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>status</th>
                        <th>inTime</th>
                        <th>outTime</th>
                        <th>lateStatus</th>
                        <th>totalDuty</th>
                        <th>isFriday</th>
                        <th>holiday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportData as $data)
                        <tr>
                            <td>{{ $data['date'] }}</td>
                            <td>{{ $data['status'] }}</td>
                            <td>{{ $data['inTime'] }}</td>
                            <td>{{ $data['outTime'] }}</td>
                            <td>{{ $data['lateStatus'] }}</td>
                            <td>{{ $data['totalDuty'] }}</td>
                            <td>{{ $data['isFriday'] }}</td>
                            <td>{{ $data['holiday'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
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
    $(function () {
      $("#example").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,

      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
