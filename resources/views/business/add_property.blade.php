@extends('layouts/default')
@section('content')

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Create New Managed Property</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Add Managed Property</li>
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
                    <form id="form-submit" class="form-submit" autocomplete="off" action="/create-property" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">Main Information</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Property Name</label>
                                        <input type="text" name="property_name" class="form-control" placeholder="Enter your title (maximum 250 characters)" required>
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
                                        <textarea class="form-control" name="description" style="min-height: 20vh" placeholder="Description"></textarea>
                                        <small class="form-control-feedback"> This is description of property</small> </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="input-file-now">Photo Upload</label>
                                            <input type="file" name="photo[]" id="file-upload" class="dropify" required multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Add Files" />
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
                                        <input spellcheck="false" name="hidden" type="text" style="display:none;">
                                        <input type="text" id="address-map" autocomplete="off"  class="form-control" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>in miles</label>
                                                <input type="number" class="form-control" name="in_mile" min="0" placeholder="Enter miles you want to search">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>neighborhood</label>
                                                <input type="text" class="form-control" name="neighborhood" placeholder="Enter property neighborhood">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>city</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter property city">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Post/ZIP Code</label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="_ _ - _ _ _">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="gmaps-simple" class="gmaps"></div>
                                    <input type="text" id="latitude" name="latitude" readonly>
                                    <input type="text" id="longitude" name="longitude" required>

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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>By Agent</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="by_agent">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>By Owner</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="by_owner">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>New Construction</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="new_construction">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Foreclosures</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="foreclosures">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Coming Soon</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="coming_soon">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="box-title m-t-10">Potential listings</h4>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Foreclosed</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="foreclosed">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pre-Foreclosure</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="pre_foreclosure">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Make Me Move</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="make_me_move">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">For Rent</h4>
                                        <input type="checkbox" name="for_rent">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Recently Sold</h4>
                                        <input type="checkbox" name="recently_sold">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Open Houses Only</h4>
                                        <input type="checkbox" name="open_houses">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h4 class="box-title m-t-10">Pending & Under Contract</h4>
                                        <input type="checkbox" name="pending_under">
                                    </div>
                                </div>

                            </div>
                            <h3 class="box-title m-t-40">Summary</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Min Price</label> &nbsp;&nbsp;&nbsp;
                                        <input type="number" class="form-control" name="min_price" min="0" placeholder="Enter your Min Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max Price</label> &nbsp;&nbsp;&nbsp;
                                        <input type="number" class="form-control" min="0" name="max_price" placeholder="Enter your Max Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Beds</label> &nbsp;&nbsp;&nbsp;
                                        <select class="form-control" name="beds">
                                            <option value="0">0+</option>
                                            <option value="1">1+</option>
                                            <option value="2">2+</option>
                                            <option value="3">3+</option>
                                            <option value="4">4+</option>
                                            <option value="5">5+</option>
                                            <option value="6">6+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="box-title m-t-40">Home Types</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Houses</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="houses">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apartments</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="apartments">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Condos/co-ops</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="condos">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Townhomes</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="townhomes">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Manufactured</label> &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="manufactured">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lots/land</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="lots_land">
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Baths</label>
                                        <select class="form-control" name="baths">
                                            <option value="0">0+</option>
                                            <option value="1">1+</option>
                                            <option value="2">1.5+</option>
                                            <option value="3">2+</option>
                                            <option value="4">3+</option>
                                            <option value="5">4+</option>
                                            <option value="6">5+</option>
                                            <option value="7">6+</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Square Feet Min</label>
                                        <input type="number" class="form-control" name="square_feet_min" min="0" placeholder="Enter your Max">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Square Feet Max</label>
                                        <input type="number" class="form-control" name="square_feet_max" min="0" placeholder="Enter your Max">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lot Size</label>
                                        <select class="form-control" name="lot_size">
                                            <option value="0">Any</option>
                                            <option value="1">2,000+sqft</option>
                                            <option value="2">3,000+sqft</option>
                                            <option value="3">4,000+sqft</option>
                                            <option value="4">5,000+sqft</option>
                                            <option value="5">7,500+sqft</option>
                                            <option value="6">.25+acre/10,890+sqft</option>
                                            <option value="7">.5+acre/21,780+sqft</option>
                                            <option value="8">1+acre</option>
                                            <option value="9">2+acres</option>
                                            <option value="10">5+acres</option>
                                            <option value="11">10+acres</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Min</label>
                                        <input type="number" class="form-control" name="year_built_min" min="0" placeholder="Enter your Max">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Max</label>
                                        <input type="number" class="form-control" name="year_built_max" min="0" placeholder="Enter your Max">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max HOA</label>
                                        <select class="form-control" name="max_hoa">
                                            <option value="0">Any</option>
                                            <option value="1">$100/month</option>
                                            <option value="2">$200/month</option>
                                            <option value="3">$300/month</option>
                                            <option value="4">$400/month</option>
                                            <option value="5">$500/month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Days on Zillow</label>
                                        <select class="form-control" name="days_on_zillow">
                                            <option value="0">Any</option>
                                            <option value="1">1 day</option>
                                            <option value="2">7 days</option>
                                            <option value="3">14 days</option>
                                            <option value="4">30 days</option>
                                            <option value="5">90 days</option>
                                            <option value="6">6 months</option>
                                            <option value="7">12 months</option>
                                            <option value="8">24 months</option>
                                            <option value="9">136 months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year Built Max</label>
                                        <input type="number" class="form-control" name="year_built_max" min="0" placeholder="Enter your Max">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-4 col-md-9">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        $('#form-submit').disableAutoFill();

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

    });

    var _latitude = 44.719457;
    var _longitude = -83.989642;
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