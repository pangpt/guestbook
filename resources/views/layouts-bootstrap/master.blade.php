<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vantura POS">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets-bootstrap/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="/assets-bootstrap/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="/assets-bootstrap/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="/assets-bootstrap/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets-bootstrap/libs/highlight.js/styles/vs2015.css">

    <!-- Map -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets-bootstrap/css/theme.min.css" >
    {{-- <style>body { display: none; }</style> --}}

    @yield('css')

    <link rel="icon" href="/images/icon-gbook.png" type="image/x-icon">
    <link rel="shortcut icon" href="/images/icon-gbook.png" type="image/x-icon">
    <meta name="csrf-token" conten="{{ csrf_token() }}" />
    <title>e-GUEST</title>

    @laravelPWA
  </head>
  <body>

    @include('layouts-bootstrap.modal')

    @include('layouts-bootstrap.navigation')

    <div class="main-content">

        <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
                <div class="container-fluid">
                    {{-- <div class="navbar-user">
                    <h2 class="mb-0 ">PROVEE </h2>
                    <div class="dropdown ml-2 dropright dropdown-menu-right">

                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        POS
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                        <a class="dropdown-item active" href="#!">POS</a>
                        <a class="dropdown-item" href="#!">Website</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                        </div>
                    </div>
                    </div> --}}
                <!-- Form -->
                <form class="form-inline mr-4 d-none d-md-flex">
                    <div class="input-group input-group-flush input-group-merge" data-toggle="lists" data-options='{"valueNames": ["name"]}'>

                    <!-- Input -->
                    <input type="search" class="form-control form-control-prepended dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fe fe-search"></i>
                        </div>
                    </div>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-card">
                        <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush list my-n3">
                            <a href="team-overview.html" class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="/assets-bootstrap/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Airbnb
                                </h4>

                                <!-- Time -->
                                <p class="small text-muted mb-0">
                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                </p>

                                </div>
                            </div> <!-- / .row -->
                            </a>
                            <a href="team-overview.html" class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="/assets-bootstrap/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Medium Corporation
                                </h4>

                                <!-- Time -->
                                <p class="small text-muted mb-0">
                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                </p>

                                </div>
                            </div> <!-- / .row -->
                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-4by3">
                                    <img src="/assets-bootstrap/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Homepage Redesign
                                </h4>

                                <!-- Time -->
                                <p class="small text-muted mb-0">
                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                </p>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-4by3">
                                    <img src="/assets-bootstrap/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Travels & Time
                                </h4>

                                <!-- Time -->
                                <p class="small text-muted mb-0">
                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                </p>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-4by3">
                                    <img src="/assets-bootstrap/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Safari Exploration
                                </h4>

                                <!-- Time -->
                                <p class="small text-muted mb-0">
                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                </p>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Dianna Smiley
                                </h4>

                                <!-- Status -->
                                <p class="text-body small mb-0">
                                    <span class="text-success">●</span> Online
                                </p>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="text-body mb-1 name">
                                    Ab Hadley
                                </h4>

                                <!-- Status -->
                                <p class="text-body small mb-0">
                                    <span class="text-danger">●</span> Offline
                                </p>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                        </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->

                    </div>
                </form>

                <!-- User -->
                <div class="navbar-user">

                    <!-- Dropdown -->
                    <div class="dropdown mr-4 d-none d-md-flex">

                    <!-- Toggle -->
                    <a href="#" class="navbar-user-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon active">
                        <i class="fe fe-bell"></i>
                        </span>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                            <!-- Title -->
                            <h5 class="card-header-title">
                                Notifications
                            </h5>

                            </div>
                            <div class="col-auto">

                            <!-- Link -->
                            <a href="#!" class="small">
                                View all
                            </a>

                            </div>
                        </div> <!-- / .row -->
                        </div> <!-- / .card-header -->
                        <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Adolfo Hess</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Glen Rouse</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                            <a class="list-group-item px-0" href="#!">

                            <div class="row">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                                </div>
                                <div class="col ml-n2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Grace Gross</strong> subscribed to you.
                                </div>

                                </div>
                                <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                                </div>
                            </div> <!-- / .row -->

                            </a>
                        </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->

                    </div>

                    <!-- Dropdown -->
                    <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/assets-bootstrap/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="settings.html" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="#" data-toggle="modal" data-target="#logoutmodal" class="dropdown-item">Logout</a>
                    </div>

                    </div>

                </div>

                </div>
            </nav>

        @yield('content')
    </div>



     <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="/assets-bootstrap/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets-bootstrap/libs/jquery/dist/jquery.validate.min.js"></script>
    <script src="/assets-bootstrap/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-bootstrap/libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script>
    <script src="/assets-bootstrap/libs/autosize/dist/autosize.min.js"></script>
    <script src="/assets-bootstrap/libs/chart.js/dist/Chart.min.js"></script>
    <script src="/assets-bootstrap/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="/assets-bootstrap/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="/assets-bootstrap/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="/assets-bootstrap/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="/assets-bootstrap/libs/list.js/dist/list.min.js"></script>
    <script src="/assets-bootstrap/libs/quill/dist/quill.min.js"></script>
    <script src="/assets-bootstrap/libs/select2/dist/js/select2.min.js"></script>
    <script src="/assets-bootstrap/libs/chart.js/Chart.extension.min.js"></script>
    <!-- Map -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="/assets-bootstrap/js/theme.min.js"></script>

    <script src="{{ URL::asset('assets/plugins/moment/moment.js')}}"></script>

    <script type="text/javascript">
        var baseURL = "{{url('')}}";
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        function formatNumber(angka) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return rupiah;
        }
        $(document).ready(function() {
            $('#formfilter').find('#filter_outlet').on('change',function(){
                $('#formfilter').submit();
            })
            $('#formfilter').find('#filter_date').on('change',function(){
                $('#formfilter').submit();
            })
            $('#formfilter').find('#filter_categories').on('change',function(){
                $('#formfilter').submit();
            })
            $('#backbutton').click(function() {
                history.go(-1);
            });
            var interval = setInterval(function() {
                var momentNow = moment();
                $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                                    + momentNow.format('dddd')
                                    .substring(0,3).toUpperCase());
                $('#time-part').html(momentNow.format('dddd, DD MMMM YYYY | hh : mm A'));
            }, 100);

            $('#stop-interval').on('click', function() {
                clearInterval(interval);
            });
            $(".numeric").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
            });
            $(".rupiah").bind('click keyup', function(event) {
                format = $(this).val().replace(/[^,\d]/g, "").toString();
                // $(".price-value").val(format);
                $(this).val(formatRupiah(this.value, 'Rp. '));
            });
            $( "#dataform" ).validate( {
                errorElement: "div",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "invalid-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-5" ).addClass( "has-feedback" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !element.next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                    }
                },
                success: function ( label, element ) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !$( element ).next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },
            } );
        });
    </script>
    @yield('scripts')
    {{-- <script src="{{ mix('/js/app.js')}}"></script> --}}

  </body>
</html>
