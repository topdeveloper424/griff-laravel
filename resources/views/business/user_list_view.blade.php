
@extends('layouts/default')
@section('content')
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
            <h4 class="text-themecolor">Watch List view</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Watch Lists</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
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
                                    @foreach($lists as $cart)
                                        <?php $cart_json = json_decode($cart->data);
                                        $dayson = $cart_json->daysOnZillow;
                                        if($dayson == -1){
                                            $dayson = 0;
                                        }
                                        $homeType = '';
                                        if($cart_json->homeType == 'SINGLE_FAMILY'){
                                            $homeType = 'S';
                                        }else if($cart_json->homeType  == 'MULTI_FAMILY'){
                                            $homeType = 'M';
                                        }else if($cart_json->homeType  == 'TOWNHOUSE'){
                                            $homeType = 'T';
                                        }else if($cart_json->homeType  == 'CONDO'){
                                            $homeType = 'C';
                                        }
                                        $status = $cart_json->homeStatus;
                                        $status = str_replace("_"," ",$status);

                                        ?>
                                        <div class="col-lg-4 col-md-8">
                                            <div class="card">
                                                <img class="card-img-top img-responsive" src="{{$cart_json->desktopWebHdpImageLink}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$cart_json->streetAddress}}<br>{{$cart_json->city}}, {{$cart_json->state}}, {{$cart_json->zipcode}}</h4>
                                                    <p class="card-text"> <b>Rent Est. :</b> <?php if (isset($cart_json->rentZestimate)){ ?>{{$cart_json->rentZestimate}}<?php } ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ @if(isset($cart_json->price)){{$cart_json->price}} @endif/sqft @if(isset($cart_json->lotSize)) {{$cart_json->lotSize}} @endif<br>Days Listed : {{$dayson}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status : {{$status}}<br>
                                                        <i class="mdi mdi-bank"></i> <span class="badge badge-pill badge-info text-white ml-auto"> @if(isset($cart_json->bedrooms)) {{$cart_json->bedrooms}} @endif bedrooms</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-seat-legroom-extra"></i> <span class="badge badge-pill badge-warning text-white ml-auto"> @if(isset($cart_json->bathrooms)) {{$cart_json->bathrooms}} @endif bathroom</span></p>
                                                    <a href="house-detail?zpid={{$cart_json->zpid}}" class="btn btn-primary" style="float: right" target="_blank">View Details</a>
                                                    <button class="btn btn-danger btn-circle" onclick="removeCart({{$cart->id}})"><i class="ti-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="tab-pane" id="list" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="table-responsive m-t-5">
                                                    <table id="myTable" class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <td style="width: 20%">Street Address</td>
                                                            <td style="width: 20%">Address</td>
                                                            <td>Price</td>
                                                            <td>Lot Size</td>
                                                            <td>Bedrooms</td>
                                                            <td>Bathrooms</td>
                                                            <td>Rent Zestimate</td>
                                                            <td>Days Listed</td>
                                                            <td>Home Type</td>
                                                            <td>Status</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($lists as $list)
                                                            <?php $cart_json = json_decode($list->data);
                                                            $dayson = $cart_json->daysOnZillow;
                                                            if($dayson == -1){
                                                                $dayson = 0;
                                                            }
                                                            $homeType = '';
                                                            if($cart_json->homeType == 'SINGLE_FAMILY'){
                                                                $homeType = '<span class="badge badge-pill badge-cyan ml-auto">S</span>';
                                                            }else if($cart_json->homeType  == 'MULTI_FAMILY'){
                                                                $homeType = '<span class="badge badge-pill badge-primary ml-auto">M</span>';
                                                            }else if($cart_json->homeType  == 'TOWNHOUSE'){
                                                                $homeType = '<span class="badge badge-pill badge-danger ml-auto">T</span>';
                                                            }else if($cart_json->homeType  == 'CONDO'){
                                                                $homeType = '<span class="badge badge-pill badge-warning ml-auto">C</span>';
                                                            }
                                                            $status = $cart_json->homeStatus;
                                                            $status = str_replace("_"," ",$status);

                                                            ?>


                                                            <tr>
                                                                <td><a href="house-detail?zpid={{$cart_json->zpid}}" target="_blank">{{$cart_json->streetAddress}}</a></td>
                                                                <td>{{$cart_json->city}}, {{$cart_json->state}}, {{$cart_json->zipcode}}</td>
                                                                <td>@if(isset($cart_json->price)) {{$cart_json->price}} @endif</td>
                                                                <td>@if(isset($cart_json->lotSize)) {{$cart_json->lotSize}} @endif</td>
                                                                <td>@if(isset($cart_json->bedrooms)) {{$cart_json->bedrooms}} @else 0 @endif</td>
                                                                <td>@if(isset($cart_json->bathrooms)) {{$cart_json->bathrooms}} @else 0 @endif </td>
                                                                <td>@if(isset($cart_json->rentZestimate)) {{$cart_json->rentZestimate}} @endif</td>
                                                                <td>{{$dayson}}</td>
                                                                <td>{!! $homeType !!}</td>
                                                                <td>{{$status}}</td>

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

    function removeCart(id) {

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this house!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, remove this!",
            closeOnConfirm: false
        }, function(){
            $.post("/remove-cart",{
                _token:'{{csrf_token()}}',
                id:id,
            }).done(
                function (data) {
                    if(data == "success"){
                        swal("Deleted!", "this cart has been deleted.", "success");
                    }else if(data == "error"){
                        swal("Cancelled", "database error !", "error");
                    }
                    location.reload(true);
                }
            );

        });


    }


</script>
@stop