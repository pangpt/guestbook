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

                <div class="card" id="data-list">
                    <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                        <tr>
                            <th>
                            <a href="#" class="text-muted sort" data-sort="table-product">
                                Nama Pengguna
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-category">
                                NIP
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-point">
                               Username
                            </a>
                            </th>
                            <th >
                            <a href="#" class="text-muted sort" data-sort="table-baseprice">
                                Jabatan
                            </a>
                            </th>
                            <th>
                            <a href="#" class="text-muted sort" data-sort="table-finalprice">
                                Nomor Telepon
                            </a>
                            </th>
                            <th colspan="2">
                            <a href="#" class="text-muted sort" data-sort="table-finalprice">
                                Role
                            </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($user as $item)
                            <tr >
                                <td class="text-left" style="width:20%;">
                                    {{$item->name}}
                                </td>
                                {{-- <td class="text-left" style="width:5%;vertical-align:middle">
                                    
                                </td> --}}
                                <td class="table-product text-left" style="vertical-align:middle">
                                    {{ $item->nip }}
                                </td>
                                <td class="table-finnalprice" style="vertical-align:middle">
                                    {{ $item->username }}
                                </td>
                                <td class="table-point" style="vertical-align:middle">
                                    {{ $item->jabatan }}
                                </td>
                                <td class="table-baseprice" style="vertical-align:middle">
                                    {{ $item->nomor_telepon }}
                                </td>
                                <td class="table-category" style="vertical-align:middle">
                                    {{ @$item->role }}
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
{{-- @section('content-form')
    @include('backend.bukutamu.form.guest')
@endsection --}}
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

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


</script>
@endsection
