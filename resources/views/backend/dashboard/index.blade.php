@extends('layouts-bootstrap.master')

@section('content')
<!-- MAIN CONTENT
    ================================================== -->
        
        
        <!-- CARDS -->
        <div class="container-fluid">
          <!-- HEADER -->
        <div class="header mt-md-5">

                <!-- Body -->
                <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        overview
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        Dashboard
                    </h1>

                    </div>
                    <div class="col-auto">
                    
                    <!-- Button -->
                    <h4 class="" >
                        <div id="time-part"></div>
                    </h4>

                    </div>
                </div> <!-- / .row -->
                </div> <!-- / .header-body -->

        </div> <!-- / .header -->
        <div class="row">
            <div class="col-12 col-lg-4 ">
                {{-- <div id="app">
                <example-component :userid="{{ Auth::user()->id }}"></example-component>
                </div> --}}
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-10">
                            Jumlah Tamu per Hari ini
                        </h6>
                        
                        <!-- Heading -->
                        <span class="h1 mb-0">
                        {{@number_format($total)}}                       
                        </span>

                        <!-- Badge -->
                        

                        </div>
                        <div class="col-auto">
                        
                        <!-- Icon -->
                        <span class="h1 fe fe-clipboard text-muted mb-0"></span>

                        </div>
                        {{-- <div class="col-12">
                            <hr>
                            <span class="text-muted">
                                @if($percenttotal == 0)
                                No data from yesterday
                                @elseif($percenttotal < 0)
                                <b class="text-danger">{{ $percenttotal }}%</b> from yesterday
                            @else 
                                <b class="text-success">+{{ $percenttotal }}%</b> from yesterday
                            @endif
                            
                            </span>
                        </div> --}}
                    </div> <!-- / .row -->
                    
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-lg-4 ">
            
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-10">
                            Jumlah Tamu Bulan ini
                        </h6>
                        
                        <!-- Heading -->
                        <span class="h1 mb-0">
                            IDR 20,000
                        </span>

                        <!-- Badge -->
                        {{-- <span class="badge badge-soft-success mt-n1">
                            +3.5% from yesterday
                        </span> --}}

                        </div>
                        <div class="col-auto">
                        
                        <!-- Icon -->
                        <span class="h1 fe fe-arrow-down-left text-muted mb-0"></span>

                        </div>
                    </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-4 ">
            
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-10">
                            Jumlah Pengunjung dari Mahkamah Agung
                        </h6>
                        
                        <!-- Heading -->
                        <span class="h1 mb-0">
                        IDR 3000
                        </span>

                        <!-- Badge -->
                        {{-- <span class="badge badge-soft-success mt-n1">
                            +3.5% from yesterday
                        </span> --}}

                        </div>
                        <div class="col-auto">
                        
                        <!-- Icon -->
                        <span class="h1 fe fe-arrow-up-right text-muted mb-0"></span>

                        </div>
                    </div> <!-- / .row -->

                    </div>
                </div>
                
            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-12">
            
            <!-- Orders -->
            <div class="card">
                <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                        Cash Flow
                    </h4>

                    </div>
                    <div class="col-auto mr-n3">
                    
                    <!-- Caption -->
                    <span class="text-muted">
                        Show cash out:
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#orderChart"
                         data-add='{"data":{"datasets":[{"data":,"backgroundColor":"#d2ddec","label":"Cash Out"}]}}'>
                        <label class="custom-control-label" for="cardToggle"></label>
                    </div>

                    </div>
                </div> <!-- / .row -->

                </div>
                <div class="card-body">
                
                <!-- Chart -->
                <div class="chart">
                    <canvas id="orderChart" class="chart-canvas"></canvas>
                </div>

                </div>
            </div>

            </div>
        </div> <!-- / .row -->
        </div>
 <!-- / .main-content -->
@endsection