@extends('backend')

@section('page_level_css_plugins')

<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('page_level_css_files')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
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
            <div class="d-flex justify-content-between mb-5">
                <h6>Name: {{ $name->name_english }}</h6>
                <h6>Date: {{ date('Y-m-d') }}</h6>
                <h6>Designation: {{ $des->name }}</h6>
                <h6>Department: {{ $dept->name }}</h6>
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-primary" type="button" id="attendanceReportPdf">PDF</button>
                <button class="btn btn-outline-dark" type="button">Excel</button>
            </div>

                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
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
                                        @php

                                            $officetime = date('h:i A',strtotime($officeTime));
                                            if($data['status'])
                                            {
                                                $status = 'Present';
                                            }
                                            else{
                                                $status = 'Absent';
                                            }
                                        @endphp
                                        @if($status == 'Present')
                                            <td class="text-center">
                                                <span class="badge badge-info">{{ $status }}</span>
                                            </td>
                                        @elseif($status == 'Absent')
                                            <td class="text-center">
                                                <span class="badge badge-danger">{{ $status }}</span>
                                            </td>
                                        @endif

                                        @php
                                            if($data['inTime'])
                                            {
                                                $inTime = date('h:i A',strtotime($data['inTime']));
                                            }
                                            else{
                                                $inTime = '-';
                                            }

                                        @endphp
                                        <td class="text-center">{{ $inTime }}</td>

                                        @php
                                            if($data['outTime'])
                                            {
                                                $outTime = date('h:i A',strtotime($data['outTime']));
                                            }
                                            else{
                                                $outTime = '-';
                                            }
                                        @endphp
                                        <td class="text-center">{{ $outTime }}</td>
                                        @php
                                            if($inTime != '-')
                                            {
                                                if($inTime>$officetime)
                                                {
                                                    $time = 'Late';
                                                }
                                                else{
                                                    $time = 'On Time';
                                                }
                                            }
                                            else {
                                                $time = '-';
                                            }
                                        @endphp
                                        @if($time == 'On Time')
                                            <td class="text-center">
                                                <span class="badge badge-success">{{  $time }}</span>
                                            </td>
                                        @elseif($time == 'Late')
                                            <td class="text-center">
                                                <span class="badge badge-danger">{{  $time }}</span>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                {{  $time }}
                                            </td>
                                        @endif
                                        @php
                                            if( $inTime != '-' && $outTime != '-')
                                            {
                                                $time1 = new DateTime($inTime);
                                                $time2 = new DateTime($outTime);
                                                $interval = $time1->diff($time2);
                                                $duty = $interval->format('%h:%i');
                                                //$duty = $outTime - $inTime;
                                            }
                                            else{
                                                $duty = '-';
                                            }
                                        @endphp
                                        @if($duty != '-')
                                            <td class="text-center">{{ $duty.' '.'Hours' }}</td>
                                        @else
                                        <td class="text-center">{{ $duty }}</td>
                                        @endif
                                        @php
                                            if($data['isFriday'])
                                            {
                                                $fri = 'Friday';
                                            }
                                            else {
                                                $fri = '-';
                                            }
                                        @endphp
                                        @if($fri == '-' )
                                            <td class="text-center">{{ $fri }}</td>
                                        @elseif ($fri != '-')
                                            <td class="text-center">
                                                <span class="badge badge-dark">{{  $fri }}</span>
                                            </td>
                                        @endif

                                        <td>{{ $data['holiday'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

</section>


@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ asset('AdminLTE-3.2.0/dist/js/demo.js') }}"></script> --}}




@endsection
{{-- <!-- END PAGE LEVEL PLUGINS --> --}}

{{-- <!-- BEGIN PAGE LEVEL SCRIPTS --> --}}
@section('page_level_js_scripts')


<script type="text/javascript">
    $(function () {
      $("#example1").DataTable({
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

    $('#attendanceReportPdf').click(function(e){
        e.preventDefault();
        console.log('Hello');
        $.ajax({
            type: 'POST',
            url: '/get-attendaceReport-pdf',
            // headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            data: {
                name: '{{ $name->name_english }}',
                date: '{{ date('Y-m-d') }}',
                designation: '{{ $des->name }}',
                department: '{{ $dept->name }}',
                reportData: {!! json_encode($reportData) !!},
            },
            beforeSend: function(){
                //alert('{{ $des->name }}');
                //console.log('hello from before send');
            },

            success:function(response){
                console.log('hello from success');
            },
            error: function(e){
                //console.log('hello from error');
            },
        });
    });
</script>


@endsection
