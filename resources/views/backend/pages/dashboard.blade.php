@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')

@auth
    @if(Auth::user()->user_type == 'employee')
        <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="card bg-success">
                        <div class="card-header">
                            <h3>Hi {{ Auth::user()->name }}</h3>
                            @php
                                date_default_timezone_set('Asia/Dhaka');
                                $time = time();
                                $t = date("H:i:s",$time);
                                if($t>"12:00:00")
                                {
                            @endphp
                                    <p>Good Afternoon</p>
                            @php
                                }
                                else if($t<="12:00:00")
                                {
                            @endphp
                                    <p>Good Morning</p>
                            @php
                                }
                            @endphp

                        </div>
                        <div class="card-body">
                            <h1 id="time"></h1>
                        </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <!-- ./col -->

            </div>

            <div class="row">

                <!-- ./col -->
                <div class="col-lg-6 col-6">
                <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3></h3>

                        <p class="text-center">Total Working Days</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <!-- ./col -->

                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3></h3>


                            <p class="text-center">Absent This Month</p>
                        </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
            </div>


            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

        </section>
    @else
        <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3></h3>

                        <p>Total Employee</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3></h3>

                    <p>Today's Presents</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3></h3>

                    <p>Today's Absents</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>


                        <p>Today's Leave</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
            </div>


            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

        </section>
    @endif
@endauth

@endsection

<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

{{-- <script src="{{ asset('AdminLTE-3.2.0/plugins/chart.js/Chart.min.js') }}"></script> --}}

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
<script>
    function updateTime()
        {
            const d = new Date();
            const time = d.toLocaleTimeString();
            document.getElementById("time").innerHTML = time;

        }
    updateTime();
    setInterval(updateTime, 1000);
</script>

@endsection
