@extends('layouts-bootstrap.master')

@section('content')
<!-- MAIN CONTENT
    ================================================== -->


        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12  ">
                    <!-- HEADER -->
                    <div class="header mt-md-5">
                        <!-- Body -->
                        <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                {{$section}}
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                {{$title}}
                            </h1>

                            </div>
                            <div class="col-auto">

                            <!-- Button -->
                            <h4 class="" >
                                <div id="time-part"></div>
                            </h4>

                            </div>
                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                                <div class="col">

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs">
                                    <li class="nav-item">
                                    <a href="#" class="nav-link {{Request::segment(3) == 'general' ? 'active' : ''}}">
                                        General
                                    </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                    <a href="{{ route('shop.payment') }}" class="nav-link {{Request::segment(3) == 'payment' ? 'active' : ''}}">
                                        Billing
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{ route('shop.notification') }}" class="nav-link {{Request::segment(3) == 'notification' ? 'active' : ''}}">
                                        Notifications
                                    </a>
                                    </li> --}}
                                </ul>

                                </div>
                            </div>
                        </div> <!-- / .header-body -->
                    </div> <!-- / .header -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('office.update')}}" method="POST">
                                @csrf
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Instansi</label>
                                <input class="form-control" name='nama_instansi' value="{{ @$office->nama_instansi }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Instansi</label>
                                    <input class="form-control" name='email_instansi' value="{{ @$office->email_instansi }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shop Description</label>
                                    <textarea class="form-control" name='shop_description'>{{ @$shop->shop_description }}</textarea>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Instansi</label>
                                    <textarea class="form-control" name='alamat_instansi'>{{ @$office->alamat_instansi }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telfon Instansi</label>
                                    <input class="form-control" name='phone_instansi' value="{{ @$office->phone_instansi }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input class="form-control" name='website_instansi' value="{{ @$office->website_instansi }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input class="form-control" name='shop_facebook' value="{{ @$shop->shop_facebook }}">
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                            </div> --}}
                            <div class="col-md-6 text-right">
                                <button class="btn btn-block btn-primary">Save</button>
                            </div>
                        </div> <!-- / .row -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

 <!-- / .main-content -->
@endsection
