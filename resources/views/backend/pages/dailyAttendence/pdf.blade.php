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
@section('page_level_js_plugins')




@endsection

@section('page_level_js_scripts')


<script type="text/javascript">

</script>


@endsection

