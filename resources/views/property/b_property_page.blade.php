
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
    <style>
        td,th{
            text-align: center;
        }
    </style>

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Properties Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Properties</li>
                </ol>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a href="{{route('add-b-property')}}">
                    <button type="button" class="btn btn-rounded btn-block btn-danger"> + Add Property</button>
                </a>
            </div>

        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#cart" role="tab"><span class="hidden-sm-up"><i class="ti-image"></i></span> <span class="hidden-xs-down">Cart View</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#list" role="tab"><span class="hidden-sm-up"><i class="ti-menu"></i></span> <span class="hidden-xs-down">List View</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border m-t-20">
                        <div class="tab-pane active" id="cart" role="tabpanel">
                            <div class="row">
                                @foreach($properties as $property)

                                    <div class="col-lg-4 col-md-8">
                                        <div class="card">
                                            @if($property->files)
                                                <img class="card-img-top img-responsive" style="width: 400px; height: 333px" src="storage/uploads/b-property/{{$property->files}}" alt="Card image cap">
                                            @else
                                                <img class="card-img-top img-responsive" src="" alt="Card image cap">
                                            @endif
                                            <div class="card-body">
                                                <h4 class="card-title">{{$property->name}}</h4>
                                                <p class="card-text"> <b>Address : </b>{{$property->address}}<br>
                                                    <i class="mdi mdi-bank"></i> <span class="badge badge-pill badge-info text-white ml-auto">
                                                        @if($property->property_type == false)
                                                            <?php $units = json_decode($property->units); ?>
                                                            <span>{{count($units)}}&nbsp; UNITS</span>
                                                        @else
                                                            <span>SINGLE - FAMILY</span>
                                                        @endif

                                                    </span></p>
                                                <div style="float: right">
                                                    <a href="/view-b-property?property_id={{$property->id}}" class="btn btn-sm btn-primary"  >View</a>
                                                    <a href="/edit-b-property?property_id={{$property->id}}" class="btn btn-sm btn-success" >Edit</a>
                                                    <button type="button" class="btn btn-sm btn-secondary" onclick="onDelete({{$property->id}})"><i class="fa fa-trash"></i> Delete</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{$properties->links()}}

                            </div>

                        </div>
                        <div class="tab-pane" id="list" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="table-responsive m-t-5">
                                                <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <td>Property Name</td>
                                                        <td>Address</td>
                                                        <td>City</td>
                                                        <td>State</td>
                                                        <td>Zipcode</td>
                                                        <td>Year Built</td>
                                                        <td>MLS</td>
                                                        <td>Property Type</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($properties as $property)
                                                        <tr>
                                                            <td><a href="/view-b-property?property_id={{$property->id}}">{{$property->name}}</a></td>
                                                            <td>{{$property->address}}</td>
                                                            <td>{{$property->city}}</td>
                                                            <td>{{$property->state}}</td>
                                                            <td>{{$property->zipcode}}</td>
                                                            <td>{{$property->year_built}}</td>
                                                            <td>{{$property->mls}}</td>
                                                            @if($property->property_type == false)
                                                                <?php $units = json_decode($property->units); ?>
                                                                <td>{{count($units)}}&nbsp; UNITS</td>
                                                            @else
                                                                <td>SINGLE - FAMILY</td>
                                                            @endif
                                                            <td>
                                                                <a href="/edit-b-property?property_id={{$property->id}}" class="btn btn-sm btn-success" >Edit</a>
                                                                <button type="button" class="btn btn-sm btn-secondary" onclick="onDelete({{$property->id}})"><i class="fa fa-trash"></i> Delete</button>

                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script>
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        function onDelete(id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this property anymore !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, remove this!",
                closeOnConfirm: false
            }, function(){
                document.location.href = "/remove-b-property?property_id="+id;
            });
        }

    </script>

@stop