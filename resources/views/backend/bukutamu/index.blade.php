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
                            <a href="#" data-toggle="modal" id="add-data" data-url="{{ route('guest.store') }}" data-target="#datamodal" class="btn btn-primary lift">
                                    New Data
                                </a>

                            </div>
                            {{-- <div class="col-auto">

                            <!-- Button -->
                            <h4 class="" >
                                <div id="time-part"></div>
                            </h4>

                            </div> --}}
                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                            <div class="col">

                            </div>
                        </div>
                    </div> <!-- / .header-body -->
                </div> <!-- / .header -->

                <!-- Card -->
                @if ($errors->any())
                    <div class="alert {{ $errors->has('success') ? 'alert-primary' : 'bg-danger alert-danger'}} fade show alert-dismissible" role="alert">
                        @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12 col-xl-12 mb-5 ">

                        <form action="" id="formfilter" method="GET">
                            <div class="row align-items-center">

                                <label class="col-form-label col-1">Category</label>

                                <div class="col-5">
                                    <select class="form-control type" name="category_id" id="filter_categories" data-toggle="select">
                                        <option selected='selected' value="0">General</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}" {{ @Request::get('category_id') == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

                <div class="card" id="data-list">
                    <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col">

                        <!-- Search -->
                        <form class="row align-items-center">
                            <div class="col-auto pr-0">
                            <span class="fe fe-search text-muted"></span>
                            </div>
                            <div class="col">
                                <input type="search" class="form-control form-control-flush search" placeholder="Search">
                            </div>
                        </form>

                        </div>
                        <div class="col-auto">

                        <!-- Button -->

                        <div class="dropdown">
                            <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bulk action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                            <a class="dropdown-item" href="#!">Action</a>
                            <a class="dropdown-item" href="#!">Another action</a>
                            <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>

                        </div>
                    </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                        <tr>
                            <th style="width:5%">
                            {{-- <div class="custom-control custom-checkbox table-checkbox">
                                <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                                <label class="custom-control-label" for="ordersSelectAll">
                                &nbsp;
                                </label>
                            </div> --}}
                            </th>
                            <th>
                            <a href="#" class="text-muted sort" data-sort="table-product">
                                Tanggal
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-category">
                                Nama Tamu
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-point">
                                Asal Tamu/Instansi
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-baseprice">
                                Tujuan
                            </a>
                            </th>
                            <th colspan="2">
                            <a href="#" class="text-muted sort" data-sort="table-finalprice">
                                Kategori
                            </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($guest as $item)
                            <tr >
                                <td class="text-left" style="width:20%;">
                                    <img style="width:100px" src="{{ asset('storage/'.$item->foto_tamu )}}">
                                </td>
                                {{-- <td class="text-left" style="width:5%;vertical-align:middle">
                                    
                                </td> --}}
                                <td class="table-product text-left" style="vertical-align:middle">
                                    {{ $item->tanggal_kunjungan }}
                                </td>
                                <td class="table-finnalprice" style="vertical-align:middle">
                                    {{ $item->nama }}
                                </td>
                                <td class="table-point" style="vertical-align:middle">
                                    {{ $item->instansi }}
                                </td>
                                <td class="table-baseprice" style="vertical-align:middle">
                                    {{ $item->tujuan_kunjungan }}
                                </td>
                                <td class="table-category" style="vertical-align:middle">
                                    {{ @$item->category->name }}
                                </td>
                                <td class="text-right" style="vertical-align:middle">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle text-primary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" data-url="{{route('guest.update', ['id' => $item->id])}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#datamodal" class="dropdown-item edit">
                                                Edit
                                            </a>
                                            <a href="#!" data-url="{{route('guest.destroy', ['id' => $item->id])}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#deletemodal" class="dropdown-item delete">
                                                Delete
                                            </a>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                    {{-- <div class="col-auto text-right">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            </ul>
                        </nav>
                    </div> --}}
                </div>


            </div>
        </div>
    </div>
 <!-- / .main-content -->
@endsection
@section('content-form')
    @include('backend.bukutamu.form.guest')
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        //set webcam
        Webcam.set({
            width: 280,
            height: 280,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        var options = {
            valueNames: [ 'table-name','table-product' ],

        };

        var datalist = new List('data-list', options);
        //js product

        $('#uploadfoto').on('click',function(){
            $('#foto').click();
        });
        $(function () {
            $("#foto").change(function () {
                var size = this.files[0].size;
                if(size > 15000000){
                    $(this).addClass('is-invalid');
                    $('#submitbutton').attr('disabled', true);
                }else{
                    $(this).removeClass('is-invalid');
                    $('#submitbutton').attr('disabled', false);
                }
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $('#fotoimage').attr('src', e.target.result);
            $('#valueresetfoto').val('');
        };
        $('#resetfoto').on('click',function(){
            $('#fotoimage').attr('src', '{{ asset('images/default.png') }}');
            $('#valueresetfoto').val('1');
            $('#foto').val('');
        });


        //js baru
        $('#add-data').on('click',function(){
            url = $(this).data('url');
            $('#formtitle').html('Create');
            $('#dataform').attr('action',url);
            $('#dataform').attr('enctype','multipart/form-data');
            $('#dataform').attr('method','POST');
            $('#is_deliverable').attr('checked',false);
            $("#fotoimage").attr('src', baseURL+'/images/default.jpg');
        })

        $('.edit').on('click',function(){
            id = $(this).data('id');
            url = $(this).data('url');
            $('#formtitle').html('Edit');
            $('#dataform').attr('action',url);
            $('#dataform').attr('enctype','multipart/form-data');
            $('#dataform').attr('method','POST');
            $('#is_deliverable').attr('checked',false);
            $("#fotoimage").attr('src', baseURL+'/images/default.jpg');
            $.ajax({
				url: baseURL+"/admin/bukutamu/edit/"+id,
				type: "GET",
				dataType: "JSON",
				success : function(data){
                    $('#nama').val(data.nama);
                    $('#tujuan_kunjungan').val(data.tujuan_kunjungan);
                    $('#category_id').val(data.category_id);
                    $('#instansi').val(data.instansi);
                    $('#catatan').val(data.catatan);
                    $('#tanggal_kunjungan').val(data.tanggal_kunjungan);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $("#my_camera").attr('src', baseURL+'/uploads/'+data.foto_tamu);
                    // console.log(data.foto_tamu)
                    if(data.is_deliverable == 1){
                        $('#is_deliverable').attr('checked',true);
                    }else{
                        $('#is_deliverable').attr('checked',false);
                    }
				}
			});
        })

        $('.delete').on('click',function(){
            id = $(this).data('id');
            url = $(this).data('url');
            $('#deletedataform').attr('action',url);
        })
    });

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                console.log(data_uri)
                document.getElementById('my_camera').innerHTML = '<img src="'+data_uri+'"/>';
                // console.log(data_uri)
                // var image_data = data_uri.replace(/^data:image\/jpeg;base64,/, '');
                // console.log(image_data);
                // document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
                // document.getElementById('foto_tamu').value = image_data;
            });
        }

        function reset_camera() {
            Webcam.reset();
            document.getElementById('my_camera').innerHTML = '';
            Webcam.attach('#my_camera');
        }


</script>
@endsection
