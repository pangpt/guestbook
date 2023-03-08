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
                            <a href="#" data-toggle="modal" id="add-data" data-url="{{ route('category.store') }}" data-target="#datamodal" class="btn btn-primary lift">
                                    New Category
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
                            <div class="custom-control custom-checkbox table-checkbox">
                                <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                                <label class="custom-control-label" for="ordersSelectAll">
                                &nbsp;
                                </label>
                            </div>
                            </th>
                            <th colspan="2">
                            <a href="#" class="text-muted sort" data-sort="table-name">
                                Category
                            </a>
                            </th>
                            <th colspan="2">
                            <a href="#" class="text-muted sort" data-sort="table-product">
                                Total Product
                            </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($category as $item)
                            <tr>
                                <td style="vertical-align:middle">
                                    @if($item->name != 'Uncategorized')
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                        <label class="custom-control-label" for="ordersSelectOne">
                                        &nbsp;
                                        </label>
                                    </div>
                                    @endif
                                </td>
                                <td class="text-left" style="width:5%;vertical-align:middle">
                                    
                                </td>
                                <td class="table-name" style="vertical-align:middle">
                                    {{ $item->name }}
                                </td>
                                <td class="table-product" style="vertical-align:middle">
                                    {{ count($item->guests) }}
                                </td>
                                <td class="text-right" style="vertical-align:middle">
                                    @if($item->name != 'Mahkamah Agung')
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle text-primary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" data-url="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#datamodal" class="dropdown-item edit">
                                                Edit
                                            </a>
                                            <a href="#!" data-url="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#deletemodal" class="dropdown-item delete">
                                                Delete
                                            </a>
                                            </div>
                                        </div>
                                    @endif
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
    @include('backend.category.form.category')
@endsection
@section('scripts')
<script type="text/javascript">
        $(document).ready(function() {
            $('#add-data').on('click',function(){
            url = $(this).data('url');
            $('#formtitle').html('Create');
            $('#dataform').attr('action',url);
            $('#dataform').attr('method','POST');
            $('#dataform').attr('enctype','multipart/form-data');
            $("#fotoimage").attr('src', baseURL+'/images/default.jpg');
        })
        });
</script>
@endsection
