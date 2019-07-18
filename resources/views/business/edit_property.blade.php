@extends('layouts/default')
@section('content')

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Property</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Property</li>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Property Information</h4>
                </div>
                <div class="card-body">
                    <form id="form-submit" class="form-submit" action="/update-property" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <div class="form-body">
                            <h3 class="card-title">Main Information</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Property Name</label>
                                        <input type="text" name="property_name" class="form-control" value="{{$property->property_name}}" placeholder="Enter your title (maximum 250 characters)" required>
                                        <small class="form-control-feedback"> This is Name of property</small> </div>
                                </div>
                                <!--/span-->
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br>
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" name="description" style="min-height: 20vh" placeholder="Description">{{$property->description}}</textarea>
                                        <small class="form-control-feedback"> This is description of property</small> </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="input-file-now">Photo Upload</label>
                                            <input type="file" name="photo[]" id="file-upload" class="dropify" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" @if($property->files) data-default-file="{{asset('storage/uploads/property/')}}/{{$property->files[0]}}" @endif accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                </div>
                                <!--/span-->
                            </div>
                            <h3 class="box-title m-t-40">Location Information</h3>
                            <hr>
                            <div class="row">
                                <div class="location-map col-md-12 ">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="address-map" class="form-control" name="address" value="{{$property->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>in miles</label>
                                                <input type="number" class="form-control" name="in_mile" min="0" value="{{$property->miles}}" placeholder="Enter miles you want to search">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>neighborhood</label>
                                                <input type="text" class="form-control" name="neighborhood" value="{{$property->neighborhood}}" placeholder="Enter property neighborhood">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>city</label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{$property->city}}" placeholder="Enter property city">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Post/ZIP Code</label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{$property->zipcode}}" placeholder="_ _ - _ _ _">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="gmaps-simple" class="gmaps"></div>
                                    <input type="text" id="latitude" name="latitude" value="{{$property->latitude}}" readonly>
                                    <input type="text" id="longitude" name="longitude" value="{{$property->longitude}}" required>

                                </div>
                            </div>
                            <h3 class="box-title m-t-40">Listing Type</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="box-title m-t-10">For Sale</h4>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <?php $sales = json_decode($property->for_sale); ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>By Agent</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="by_agent" @if($sales->by_agent == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>By Owner</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="by_owner" @if($sales->by_owner == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>New Construction</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="new_construction" @if($sales->new_construction == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Foreclosures</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="foreclosures" @if($sales->foreclosures == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Coming Soon</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="coming_soon" @if($sales->coming_soon == 1) checked @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="box-title m-t-10">Potential listings</h4>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <?php
                                $potential_listings = json_decode($property->potential_listings);
                                ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Foreclosed</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="foreclosed" @if($potential_listings->foreclosed == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pre-Foreclosure</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="pre_foreclosure" @if($potential_listings->pre_foreclosure == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Make Me Move</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="make_me_move" @if($potential_listings->make_me_move == 1) checked @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                $for_rent = json_decode($property->for_rent);
                                ?>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">For Rent</h4>
                                        <input type="checkbox" name="for_rent" @if($for_rent->for_rent == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Recently Sold</h4>
                                        <input type="checkbox" name="recently_sold" @if($for_rent->recently_sold == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Open Houses Only</h4>
                                        <input type="checkbox" name="open_houses" @if($for_rent->open_houses == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Pending & Under Contract</h4>
                                        <input type="checkbox" name="pending_under" @if($for_rent->pending_under == 1) checked @endif>
                                    </div>
                                </div>

                            </div>
                            <h3 class="box-title m-t-40">Summary</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Min Price</label> &nbsp;&nbsp;&nbsp;
                                        <input type="number" class="form-control" name="min_price" min="0" value="{{$property->min_price}}" placeholder="Enter your Min Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max Price</label> &nbsp;&nbsp;&nbsp;
                                        <input type="number" class="form-control" min="0" name="max_price" value="{{$property->max_price}}" placeholder="Enter your Max Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Beds</label> &nbsp;&nbsp;&nbsp;
                                        <select class="form-control" name="beds">
                                            <option value="0" @if($property->beds == 0) selected @endif>0+</option>
                                            <option value="1" @if($property->beds == 1) selected @endif>1+</option>
                                            <option value="2" @if($property->beds == 2) selected @endif>2+</option>
                                            <option value="3" @if($property->beds == 3) selected @endif>3+</option>
                                            <option value="4" @if($property->beds == 4) selected @endif>4+</option>
                                            <option value="5" @if($property->beds == 5) selected @endif>5+</option>
                                            <option value="6" @if($property->beds == 6) selected @endif>6+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="box-title m-t-40">Home Types</h3>
                            <hr>
                            <div class="row">
                                <?php
                                $home_types = json_decode($property->home_types);
                                ?>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Houses</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="houses" @if($home_types->houses == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apartments</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="apartments" @if($home_types->apartments == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Condos/co-ops</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="condos" @if($home_types->condos == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Townhomes</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="townhomes" @if($home_types->townhomes == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Manufactured</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="manufactured" @if($home_types->manufactured == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lots/land</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="lots_land" @if($home_types->lots_land == 1) checked @endif>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Baths</label>
                                        <select class="form-control" name="baths">
                                            <option value="0" @if($property->baths == 0) selected @endif>0+</option>
                                            <option value="1" @if($property->baths == 1) selected @endif>1+</option>
                                            <option value="2" @if($property->baths == 2) selected @endif>1.5+</option>
                                            <option value="3" @if($property->baths == 3) selected @endif>2+</option>
                                            <option value="4" @if($property->baths == 4) selected @endif>3+</option>
                                            <option value="5" @if($property->baths == 5) selected @endif>4+</option>
                                            <option value="6" @if($property->baths == 6) selected @endif>5+</option>
                                            <option value="7" @if($property->baths == 7) selected @endif>6+</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Square Feet Min</label>
                                        <input type="number" class="form-control" name="square_feet_min" min="0" value="{{$property->square_feet_min}}" placeholder="Enter your Max">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Square Feet Max</label>
                                        <input type="number" class="form-control" name="square_feet_max" min="0" value="{{$property->square_feet_max}}" placeholder="Enter your Max">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lot Size</label>
                                        <select class="form-control" name="lot_size">
                                            <option value="0" @if($property->lot_size == 0) selected @endif>Any</option>
                                            <option value="1" @if($property->lot_size == 1) selected @endif>2,000+sqft</option>
                                            <option value="2" @if($property->lot_size == 2) selected @endif>3,000+sqft</option>
                                            <option value="3" @if($property->lot_size == 3) selected @endif>4,000+sqft</option>
                                            <option value="4" @if($property->lot_size == 4) selected @endif>5,000+sqft</option>
                                            <option value="5" @if($property->lot_size == 5) selected @endif>7,500+sqft</option>
                                            <option value="6" @if($property->lot_size == 6) selected @endif>.25+acre/10,890+sqft</option>
                                            <option value="7" @if($property->lot_size == 7) selected @endif>.5+acre/21,780+sqft</option>
                                            <option value="8" @if($property->lot_size == 8) selected @endif>1+acre</option>
                                            <option value="9" @if($property->lot_size == 9) selected @endif>2+acres</option>
                                            <option value="10" @if($property->lot_size == 10) selected @endif>5+acres</option>
                                            <option value="11" @if($property->lot_size == 11) selected @endif>10+acres</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Min</label>
                                        <input type="number" class="form-control" name="year_built_min" min="0" value="{{$property->year_built_min}}" placeholder="Enter your Max">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Max</label>
                                        <input type="number" class="form-control" name="year_built_max" min="0" value="{{$property->year_built_max}}" placeholder="Enter your Max">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max HOA</label>
                                        <select class="form-control" name="max_hoa">
                                            <option value="0" @if($property->max_hoa == 0) selected @endif>Any</option>
                                            <option value="1" @if($property->max_hoa == 1) selected @endif>$100/month</option>
                                            <option value="2" @if($property->max_hoa == 2) selected @endif>$200/month</option>
                                            <option value="3" @if($property->max_hoa == 3) selected @endif>$300/month</option>
                                            <option value="4" @if($property->max_hoa == 4) selected @endif>$400/month</option>
                                            <option value="5" @if($property->max_hoa == 5) selected @endif>$500/month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Days on Zillow</label>
                                        <select class="form-control" name="days_on_zillow">
                                            <option value="0" @if($property->days_on_zillow == 0) selected @endif>Any</option>
                                            <option value="1" @if($property->days_on_zillow == 1) selected @endif>1 day</option>
                                            <option value="2" @if($property->days_on_zillow == 2) selected @endif>7 days</option>
                                            <option value="3" @if($property->days_on_zillow == 3) selected @endif>14 days</option>
                                            <option value="4" @if($property->days_on_zillow == 4) selected @endif>30 days</option>
                                            <option value="5" @if($property->days_on_zillow == 5) selected @endif>90 days</option>
                                            <option value="6" @if($property->days_on_zillow == 6) selected @endif>6 months</option>
                                            <option value="7" @if($property->days_on_zillow == 7) selected @endif>12 months</option>
                                            <option value="8" @if($property->days_on_zillow == 8) selected @endif>24 months</option>
                                            <option value="9" @if($property->days_on_zillow == 9) selected @endif>136 months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Max</label>
                                        <input type="number" class="form-control" name="year_built_max" min="0" value="{{$property->Keywords}}" placeholder="Enter your Max">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-4 col-md-9">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="{{asset('assets/landing/js/markerwithlabel_packed.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/landing/js/custom-map.js')}}"></script>

    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

    });

    var _latitude = {{$property->latitude}};
    var _longitude = {{$property->longitude}};
    google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
    function initSubmitMap(_latitude,_longitude){
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 14,
            center: mapCenter,
            disableDefaultUI: false
        };
        var mapElement = document.getElementById('gmaps-simple');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: 'assets/landing/img/marker-h.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#gmaps-simple').removeClass('fade-map');
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#latitude').val( this.position.lat() );
            $('#longitude').val( this.position.lng() );
        });

        //Autocomplete
        var input = /** @type {HTMLInputElement} */( document.getElementById('address-map') );
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(15);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            $('#latitude').val( marker.getPosition().lat() );
            $('#longitude').val( marker.getPosition().lng() );
            if (place.address_components) {
                for(var i = 0; i < place.address_components.length; i ++){
                    if(place.address_components[i].types[0] == "locality"){
                        $("#city").val(place.address_components[i].long_name);
                    }else if(place.address_components[i].types[0] == "postal_code"){
                        $("#zipcode").val(place.address_components[i].long_name);
                    }
                }
            }
        });
    }
    function success(position) {
        initSubmitMap(position.coords.latitude, position.coords.longitude);
        $('#latitude').val( position.coords.latitude );
        $('#longitude').val( position.coords.longitude );
    }


</script>
@stop