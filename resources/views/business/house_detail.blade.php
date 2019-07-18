
@extends('layouts/default')
@section('content')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Property Detail</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Property Detail</li>
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
                    <h4 class="card-title">Details</h4>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Summary and Features</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Schools and Near By Homes</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="card-title">Photos</h5>
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                            <li class="street-view" data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <?php
                                            $photos = $detail->responsivePhotos;
                                            $flag = 0;
                                            ?>
                                            @foreach($photos as $photo)
                                            <div class="carousel-item @if($flag == 0) active @endif">
                                                <img class="img-responsive" src="{{$photo->mixedSources->jpeg[5]->url}}" style="min-width:417px; max-width: 417px; max-height: 278px" alt="First slide">
                                            </div>
                                                <?php $flag = 1; ?>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Google Map</h5>
                                    <div id="gmaps-simple" class="gmaps"></div>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Street View</h5>
                                    <div id="streetView" class="gmaps"></div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <h5 class="card-title">{{$detail->streetAddress}}</h5>
                                    <p><i class="fa fa-address-card"></i>&nbsp;<span class="badge badge-pill badge-danger text-white ml-auto">{{$detail->streetAddress}}, {{$detail->city}}, {{$detail->state}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$detail->zipcode}}</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-bank"></i>&nbsp;<span class="badge badge-pill badge-info text-white ml-auto">{{$detail->bedrooms}} Bedrooms</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-seat-legroom-extra"></i>&nbsp;<span class="badge badge-pill badge-warning text-white ml-auto">{{$detail->bathrooms}} Bathrooms</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dollar"></i>&nbsp;<span class="badge badge-pill badge-success text-white ml-auto">{{$detail->price}}</span>
                                        <?php
                                        $status = $detail->homeStatus;
                                        $status = str_replace('_',' ',$status);
                                        ?>

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spin fa-spinner"></i>&nbsp;<span class="badge badge-pill badge-dark text-white ml-auto">{{$status}}</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square"></i>&nbsp;<span class="badge badge-pill badge-primary text-white ml-auto">{{$detail->livingArea}} sqft</span>
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <p>{{$detail->description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  p-20" id="profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="label label-info">Home Type : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->homeType}}
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-info">Country : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->country}}
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-info">Festimate : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->festimate}}
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-info">Zestimate : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->zestimate}}
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-info">Rent Zestimate : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->rentZestimate}}
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-info">Lot Size : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$detail->lotSize}}
                                </div>

                            </div>

                            <?php $facts = $detail->homeFacts ?>
                            <hr>
                            <h3>Facts and features:</h3>
                            <div class="row">
                                @foreach($facts->atAGlanceFacts as $atAGlanceFact)
                                    <div class="col-md-6">
                                        <label class="label label-danger">{{$atAGlanceFact->factLabel}} : </label>&nbsp;&nbsp;&nbsp;&nbsp;{{$atAGlanceFact->factValue}}
                                    </div>
                                @endforeach
                            </div>

                            @foreach($facts->categoryDetails as $categoryDetail)
                                <hr>
                                <h3>{{$categoryDetail->categoryGroupName}}</h3>
                                @foreach($categoryDetail->categories as $category)
                                    @if($category->categoryName!= '')
                                        &nbsp;&nbsp;&nbsp;<label style="color: #2a9055">{{$category->categoryName}} : </label>
                                    @endif
                                    @foreach($category->categoryFacts as $cat_fact)
                                        &nbsp;&nbsp;&nbsp;<label style="font-weight: normal">{{$cat_fact->factLabel}} : {{$cat_fact->factValue}}</label>
                                        <br>
                                    @endforeach
                                @endforeach
                            @endforeach



                        </div>
                        <div class="tab-pane p-20" id="messages" role="tabpanel">
                            <h3>Schools</h3>
                            @foreach($detail->schools as $school)
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="label label-primary">Name : </label>&nbsp;&nbsp;&nbsp;{{$school->name}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Rating : </label>&nbsp;&nbsp;&nbsp;{{$school->rating}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Distance : </label>&nbsp;&nbsp;&nbsp;{{$school->distance}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Grades : </label>&nbsp;&nbsp;&nbsp;{{$school->grades}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Is Assigned : </label>&nbsp;&nbsp;&nbsp;{{$school->isAssigned}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Level : </label>&nbsp;&nbsp;&nbsp;{{$school->level}}
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-primary">Students Per Teacher : </label>&nbsp;&nbsp;&nbsp;{{$school->studentsPerTeacher}}
                                </div>
                            </div>
                                <hr>
                            @endforeach
                            <br>
                            <h3>Near By Homes</h3>
                            <div class="row">
                                @foreach($detail->nearbyHomes as $nearbyHome)
                                    <ul class="list-unstyled">
                                        <li class="media" style="padding: 10px">
                                            <img class="d-flex mr-3" src="{{$nearbyHome->miniCardPhotos[0]->url}}" width="60" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">{{$nearbyHome->address->streetAddress}} </h5><label class="label label-success">$ {{$nearbyHome->price}}</label><br>
                                                {{$nearbyHome->address->city}}, {{$nearbyHome->address->state}}, {{$nearbyHome->address->zipcode}}

                                            </div>
                                        </li>

                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <script type="text/javascript" src="{{asset('assets/landing/js/infobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/landing/js/markerwithlabel_packed.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/landing/js/custom-map.js')}}"></script>
<script>
    function initialize() {

        var latlng = {lat: {{$detail->latitude}}, lng: {{$detail->longitude}}};
        console.log(latlng);
        var mapOptions = {
            center: latlng,
            zoom: 15
        };
        var map = new google.maps.Map(document.getElementById('gmaps-simple'),
            mapOptions);
        var marker = new MarkerWithLabel({
            position: latlng,
            map: map,
            labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="assets/landing/img/f.svg" alt="" /></div></div>',
            labelClass: "marker-style"
        });
        {{--var contentString =   '<div id="mapinfo">'+--}}
            {{--'<h4 class="firstHeading">{{$detail->address->streetAddress}}</h4>'+--}}
            {{--'<h6>{{$nearbyHome->address->city}}, {{$nearbyHome->address->state}}, {{$nearbyHome->address->zipcode}}</h6>';--}}
        {{--var infowindow = new google.maps.InfoWindow({--}}
            {{--content: contentString--}}
        {{--});--}}
        {{--marker.addListener('click', function() {--}}
            {{--infowindow.open(map, marker);--}}
        {{--});--}}
        //resize for opeening and to get center of map
        $('.gmaps-simple').bind('click', function(){
            google.maps.event.trigger(map4, 'resize');
            map.panTo(marker.getPosition());
        });

        // Use this code below only if you are using google street view
        var fenway = {lat:{{$detail->latitude}}, lng: {{$detail->longitude}} };
        var map = new google.maps.Map(document.getElementById('gmaps-simple'), {
            center: fenway,
            zoom: 14
        });
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('streetView'), {
                position: fenway,
                pov: {
                    heading: 34,
                    pitch: 10
                }
            });
        map.setStreetView(panorama);
        $('.street-view').bind('click', function(e){
            setTimeout(function() {
                google.maps.event.trigger(panorama, 'resize');
            }, 400 );
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop