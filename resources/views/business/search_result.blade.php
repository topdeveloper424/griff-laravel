
@extends('layouts/default')
@section('content')

    <link href="{{asset('assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Search Results</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Search Result</li>
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
        <input type="hidden" id="latitude" value="{{$property->latitude}}">
        <input type="hidden" id="longitude" value="{{$property->longitude}}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Address</label>
                    <form id="address-form">
                        <input spellcheck="false" name="hidden" type="text" style="display:none;">
                        <input class="form-control" id="address-map" name="address" value="@if($property->address){{$property->address}} @elseif($property->neighborhood) {{$property->neighborhood}} @elseif($property->zipcode){{$property->zipcode}} @endif" placeholder="Manhattan, New York">
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Listing Type</label><br>
                    <select class="selectpicker" id="listing_type" multiple data-style="form-control btn-secondary" onchange="search(1)">
                        <optgroup label="FOR SALE">
                            <?php $sales = json_decode($property->for_sale); ?>
                            <option value="by_agent" @if($sales->by_agent == 1) selected @endif>By Agent</option>
                            <option value="by_owner" @if($sales->by_owner == 1) selected @endif>By Owner</option>
                            <option value="new_construction" @if($sales->new_construction == 1) selected @endif>New Construction</option>
                            <option value="foreclosures" @if($sales->foreclosures == 1) selected @endif>Foreclosures</option>
                            <option value="coming_soon" @if($sales->coming_soon == 1) selected @endif>Coming Soon</option>
                        </optgroup>
                        <optgroup label="POTENTIAL LISTINGS">
                            <?php
                            $potential_listings = json_decode($property->potential_listings);
                            ?>
                            <option @if($potential_listings->foreclosed == 1) selected @endif>Foreclosed</option>
                            <option @if($potential_listings->pre_foreclosure == 1) selected @endif>Pre-Foreclosure</option>
                            <option @if($potential_listings->make_me_move == 1) selected @endif>Make Me Move</option>
                        </optgroup>
                        <optgroup label="OTHER">
                            <?php
                            $for_rent = json_decode($property->for_rent);
                            ?>
                            <option @if($for_rent->for_rent == 1) selected @endif>FOR RENT</option>
                            <option @if($for_rent->recently_sold == 1) selected @endif>RECENTLY SOLD</option>
                            <option @if($for_rent->open_houses == 1) selected @endif>Open Houses only</option>
                            <option @if($for_rent->pending_under == 1) selected @endif>Pending & Under Contract</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Home Type</label><br>
                    <?php
                    $home_types = json_decode($property->home_types);
                    ?>
                    <select class="selectpicker" id="home_types" multiple data-style="form-control btn-secondary" onchange="search(1)">
                        <optgroup label="HOUSES">
                            <option value="single_family" @if($home_types->houses == 1) selected @endif>Single Family</option>
                            <option value="multi_family" @if($home_types->houses == 1) selected @endif>Multi Family</option>
                        </optgroup>
                        <optgroup label="FEATUES">
                            <option value="apartments" @if($home_types->apartments == 1) selected @endif>Apartments</option>
                            <option value="condos" @if($home_types->condos == 1) selected @endif>Condos/co-ops</option>
                            <option value="townhomes" @if($home_types->townhomes == 1) selected @endif>Townhomes</option>
                            <option value="manufactured" @if($home_types->manufactured == 1) selected @endif>Manufactured</option>
                            <option value="lots_land" @if($home_types->lots_land == 1) selected @endif>Lots/Land</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Beds</label>
                    <select class="selectpicker" name="beds" id="beds" data-style="form-control btn-secondary" onchange="search(1)">
                        <option value="0" @if($property->beds == 0) selected @endif>0+ beds</option>
                        <option value="1" @if($property->beds == 1) selected @endif>1+ beds</option>
                        <option value="2" @if($property->beds == 2) selected @endif>2+ beds</option>
                        <option value="3" @if($property->beds == 3) selected @endif>3+ beds</option>
                        <option value="4" @if($property->beds == 4) selected @endif>4+ beds</option>
                        <option value="5" @if($property->beds == 5) selected @endif>5+ beds</option>
                        <option value="6" @if($property->beds == 6) selected @endif>6+ beds</option>

                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal" data-whatever="@mdo">More Filters</button>
                </div>
            </div>
            <div class="col-md-2">
                <label>min price : </label>
                <input id="min_price" type="number" value="" class="form-control" min="0" name="min_price" value="{{$property->min_price}}" onchange="search(1)">
            </div>
            <div class="col-md-2">
                <label for="max_price">max price : </label>
                <input id="max_price" type="number" value="" class="form-control" min="0" name="max_price" value="{{$property->max_price}}" onchange="search(1)">
            </div>

            <div class="col-md-2">
                <label>in miles</label>
                <input class="form-control" type="number" min="0" id="in_mile" value="{{$property->miles}}" onchange="search(1)">
            </div>
        </div>
        <br>

        <div class="modal fade bs-example-modal-lg" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1" style="color: blue"><b>More Filter</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label style="color: blue">Baths:&nbsp;&nbsp;&nbsp;</label>
                                        <select class="selectpicker" id="baths" data-style="form-control btn-secondary">
                                            <option value="0" @if($property->baths == 0) selected @endif>0+</option>
                                            <option value="1" @if($property->baths == 1) selected @endif>1+</option>
                                            <option value="1.5" @if($property->baths == 2) selected @endif>1.5+</option>
                                            <option value="2" @if($property->baths == 3) selected @endif>2+</option>
                                            <option value="3" @if($property->baths == 4) selected @endif>3+</option>
                                            <option value="4" @if($property->baths == 5) selected @endif>4+</option>
                                            <option value="5" @if($property->baths == 6) selected @endif>5+</option>
                                            <option value="6" @if($property->baths == 7) selected @endif>6+</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label" style="color: blue">Square Feet :</label>
                                        <div style="display: inline-flex">
                                            <input id="square_feet_min" type="text" value="" name="square_feet_min" value="{{$property->square_feet_min}}" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"><label>-</label>
                                            <input id="square_feet_max" type="text" value="" name="square_feet_max" value="{{$property->square_feet_max}}" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label" style="color: blue">Lot Size:&nbsp;&nbsp;&nbsp;</label>
                                        <select class="selectpicker" id="lot_size" data-style="form-control btn-secondary">
                                            <option value="0" @if($property->lot_size == 0) selected @endif>Any</option>
                                            <option value="2000" @if($property->lot_size == 1) selected @endif>2,000+ sqft</option>
                                            <option value="3000" @if($property->lot_size == 2) selected @endif>3,000+ sqft</option>
                                            <option value="4000" @if($property->lot_size == 3) selected @endif>4,000+ sqft</option>
                                            <option value="5000" @if($property->lot_size == 4) selected @endif>5,000+ sqft</option>
                                            <option value="7500" @if($property->lot_size == 5) selected @endif>7,500+ sqft</option>
                                            <option value="10890" @if($property->lot_size == 6) selected @endif>.25+ acre / 10,890+ sqft</option>
                                            <option value="21780" @if($property->lot_size == 7) selected @endif>.5+ acre / 21,780+ sqft</option>
                                            <option value="43560" @if($property->lot_size == 8) selected @endif>1+ acre</option>
                                            <option value="87120" @if($property->lot_size == 9) selected @endif>2+ acres</option>
                                            <option value="217800" @if($property->lot_size == 10) selected @endif>5+ acres</option>
                                            <option value="435600" @if($property->lot_size == 11) selected @endif>10+ acres</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label" style="color: blue">Year Built :</label>
                                        <div style="display: inline-flex">
                                            <input id="year_built_min" type="text" value="" name="year_built_min" value="{{$property->year_built_min}}" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"><label>-</label>
                                            <input id="year_built_max" type="text" value="" name="year_built_max" value="{{$property->year_built_max}}" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message-text" class="control-label" style="color: blue">Max HOA :</label>
                                    <select class="selectpicker" id="max_hoa" data-style="form-control btn-secondary">
                                        <option value="0" @if($property->max_hoa == 0) selected @endif>Any</option>
                                        <option value="100" @if($property->max_hoa == 1) selected @endif>$100/month</option>
                                        <option value="200" @if($property->max_hoa == 2) selected @endif>$200/month</option>
                                        <option value="300" @if($property->max_hoa == 3) selected @endif>$300/month</option>
                                        <option value="400" @if($property->max_hoa == 4) selected @endif>$400/month</option>
                                        <option value="500" @if($property->max_hoa == 5) selected @endif>$500/month</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label" style="color: blue">Days on Zillow :</label>
                                    <select class="selectpicker" id="days_on_zillow" data-style="form-control btn-secondary">
                                        <option value="any" @if($property->days_on_zillow == 0) selected @endif>Any</option>
                                        <option value="1" @if($property->days_on_zillow == 1) selected @endif>1 day</option>
                                        <option value="7" @if($property->days_on_zillow == 2) selected @endif>7 days</option>
                                        <option value="14" @if($property->days_on_zillow == 3) selected @endif>14 days</option>
                                        <option value="30" @if($property->days_on_zillow == 4) selected @endif>30 days</option>
                                        <option value="90" @if($property->days_on_zillow == 5) selected @endif>90 days</option>
                                        <option value="6m" @if($property->days_on_zillow == 6) selected @endif>6 months</option>
                                        <option value="12m" @if($property->days_on_zillow == 7) selected @endif>12 months</option>
                                        <option value="24m" @if($property->days_on_zillow == 8) selected @endif>24 months</option>
                                        <option value="36m" @if($property->days_on_zillow == 9) selected @endif>36 months</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label" style="color: blue">Keywords :</label>
                                    <textarea class="form-control" name="keywords" id="keywords" placeholder="Garage,pool,waterfront,etc.">{{$property->Keywords}}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="search(1)">Check</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-8">
            <img id="reading_loader" style="display: none; margin-left: 25%" src="{{asset('assets/landing/img/loader.gif')}}" ></img>
            <div class="row" id="result_content">
            </div>
        </div>
        <div class="col-md-4">
            <div id="gmaps-simple" class="gmaps"></div>
        </div>

    </div>
</div>
    <script type="text/javascript" src="{{asset('assets/landing/js/infobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/landing/js/markerwithlabel_packed.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/landing/js/custom-map.js')}}"></script>

<script>
    var responseData = null;

    $(".select2").select2();
    $("#address-form").disableAutoFill();
    $("input[name='square_feet_min']").TouchSpin({
        min: 0,
    });
    $("input[name='square_feet_max']").TouchSpin({
        min: 0,
    });
    search(1);
    google.maps.event.addDomListener(window, 'load', initSubmitMap());
    function initSubmitMap(){
        var _latitude = document.getElementById("latitude").value;
        var _longitude = document.getElementById("longitude").value;
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 12,
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

            // search(1);
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
                map.setZoom(12);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            $('#latitude').val( marker.getPosition().lat() );
            $('#longitude').val( marker.getPosition().lng() );
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            search(1);

        });
    }

    var times = 0;

     function search(page) {
        $("#filterModal").modal('hide');
        document.getElementById("reading_loader").style.display = "block";
        document.getElementById("result_content").innerHTML = "";

        var lat = document.getElementById("latitude").value;
        var log = document.getElementById("longitude").value;

        var rect = "";

        if (lat != "" && log != ""){
            var miles = 3.10;
            var in_mile = document.getElementById("in_mile").value;
            if (in_mile != "" && in_mile != 0){
                miles = parseFloat(in_mile);
            }
            if(page == 1) {
                times = 0;
            }else{
                times += 1;
            }

            miles -= 0.0015;
            if(page >= 2 ){
                miles += 0.0015 * times;
            }

            console.log(miles);


            var earth_radius = 3960.0;
            var degrees_to_radians =  Math.PI/180.0;
            var radians_to_degrees = 180.0/Math.PI;
            var mile_lat = (miles/earth_radius)*radians_to_degrees;
            var r = earth_radius*Math.cos(mile_lat*degrees_to_radians);
            var mile_log = (miles/r)*radians_to_degrees;
            var distance = (mile_lat + mile_log)/2;
            console.log(mile_log)
            console.log(mile_lat)

            var rect1 = parseFloat(log) - mile_log;
            var rect2 = parseFloat(lat) - mile_lat;
            var rect3 = parseFloat(log) + mile_log;
            var rect4 = parseFloat(lat) + mile_lat;
            console.log(rect1);
            console.log(rect2);
            console.log(rect3);
            console.log(rect4);
            rect1 = Number((rect1).toFixed(6));
            var str_rect1 = rect1.toString().replace(".","");
            rect2 = Number((rect2).toFixed(6));
            var str_rect2 = rect2.toString().replace(".","");
            rect3 = Number((rect3).toFixed(6));
            var str_rect3 = rect3.toString().replace(".","");
            rect4 = Number((rect4).toFixed(6));
            var str_rect4 = rect4.toString().replace(".","");
            rect = str_rect1 +"," + str_rect2 + "," + str_rect3 + "," + str_rect4;
        }
        console.log(rect);
        var address = document.getElementById("address-map").value;
        var min_price = document.getElementById("min_price").value;
        var max_price = document.getElementById("max_price").value;
        var listing_types = document.getElementById("listing_type").value;
        var by_agent = false;
        var by_owner = false;
        var new_construction = false;
        var foreclosures = false;
        var coming_soon = false;
        var foreclosed = false;
        var pre_foreclosure = false;
        var make_me_move = false;

         var for_rent = false;
         var recently_sold = false;
         var open_houses = false;
         var pending_under = false;

        if(listing_types.indexOf("by_agent") != -1){
            by_agent = true;
        }
         if(listing_types.indexOf("by_owner") != -1){
             by_owner = true;
         }
         if(listing_types.indexOf("new_construction") != -1){
             new_construction = true;
         }
         if(listing_types.indexOf("foreclosures") != -1){
             foreclosures = true;
         }
         if(listing_types.indexOf("coming_soon") != -1){
             coming_soon = true;
         }
         if(listing_types.indexOf("foreclosed") != -1){
             foreclosed = true;
         }
         if(listing_types.indexOf("pre_foreclosure") != -1){
             pre_foreclosure = true;
         }
         if(listing_types.indexOf("make_me_move") != -1){
             make_me_move = true;
         }
         if(listing_types.indexOf("for_rent") != -1){
             for_rent = true;
         }
         if(listing_types.indexOf("recently_sold") != -1){
             recently_sold = true;
         }
         if(listing_types.indexOf("open_houses") != -1){
             open_houses = true;
         }
         if(listing_types.indexOf("pending_under") != -1){
             pending_under = true;
         }

         var home_types = document.getElementById("home_types").value;
        var apartments = false;
         var condos = false;
         var townhomes = false;
         var manufactured = false;
         var lots_land = false;

         if(home_types.indexOf("apartments") != -1){
             apartments = true;
         }
         if(home_types.indexOf("condos") != -1){
             condos = true;
         }
         if(home_types.indexOf("townhomes") != -1){
             townhomes = true;
         }
         if(home_types.indexOf("manufactured") != -1){
             manufactured = true;
         }
         if(home_types.indexOf("lots_land") != -1){
             lots_land = true;
         }

        // var single_family= document.getElementById("single_family").checked;
        // var multi_family = document.getElementById("multi_family").checked;
        var houses = false;

        var beds = document.getElementById("beds").value;
        var baths = document.getElementById("baths").value;

        var square_feet_min = document.getElementById("square_feet_min").value;
        var square_feet_max = document.getElementById("square_feet_max").value;

        var lot_size = document.getElementById("lot_size").value;
        var year_built_min = document.getElementById("year_built_min").value;
        var year_built_max = document.getElementById("year_built_max").value;

        var max_hoa = document.getElementById("max_hoa").value;
        var days_on_zillow = document.getElementById("days_on_zillow").value;

        var keywords = document.getElementById("keywords").value;

        price_range = ',';
        if(min_price !=0 && max_price == 0 ){
            price_range = min_price+",";
        }else if(min_price ==0 && max_price != 0 ){
            price_range = ","+max_price;
        }
        $.post("/search-result",{
            _token:'{{csrf_token()}}',
            async:false,
            rect:rect,
            page:1,
            address:address,
            price_range:price_range,
            by_agent:by_agent,
            by_owner:by_owner,
            new_construction:new_construction,
            foreclosures:foreclosures,
            coming_soon:coming_soon,
            foreclosed:foreclosed,
            pre_foreclosure:pre_foreclosure,
            make_me_move:make_me_move,
            for_rent:for_rent,
            recently_sold:recently_sold,
            open_houses:open_houses,
            pending_under:pending_under,
            houses:houses,
            apartments:apartments,
            condos:condos,
            townhomes:townhomes,
            manufactured:manufactured,
            lots_land:lots_land,
            beds:beds,
            baths:baths,
            square_feet_min:square_feet_min,
            square_feet_max:square_feet_max,
            lot_size:lot_size,
            year_built_min:year_built_min,
            year_built_max:year_built_max,
            max_hoa:max_hoa,
            days_on_zillow:days_on_zillow,
            keywords:keywords,
        }).done(
            function (data) {
                if(data == "error"){
                    search(2)
                    return;
                }
                document.getElementById("reading_loader").style.display = "none";

                var longitude = 0.0;
                var latitude = 0.0;
                var locations = [];
                var home_types = document.getElementById("home_types").value;
                var single_family = false;
                var multi_family = false;
                if(home_types.indexOf("single_family") != -1){
                    single_family = true;
                }
                if(home_types.indexOf("multi_family") != -1){
                    multi_family = true;
                }
                var result_content = document.getElementById("result_content");
                var jsondata = null;
                try{
                    jsondata = JSON.parse(data);
                }catch (e) {
                    result_content.innerHTML = "<h3>No Result</h3>";

                }

                var curPage = jsondata['curPage'];
                var numPage = jsondata['numPages'];
                var data = jsondata['data'];

                if(data.length == 0 && times < 4){
                    search(2);
                    return;
                    result_content.innerHTML = "<h3>No Result</h3>";
                    createHomepageGoogleMap(latitude,longitude,[]);
                }
                responseData = data;

                var htm = "";
                var counter = 0;
                for(var i = 0; i < data.length; i ++){
                    var row = data[i];
                    var status = row.homeStatus;
                    if(status.valueOf('_') != -1){
                        status = status.replace("_"," ");
                    }
                    var homeType = row.homeType;
                    if(single_family && multi_family){
                        console.log("two");
                    }else {
                        if (single_family || multi_family){
                            if(single_family){
                                if(homeType != "SINGLE_FAMILY"){
                                    continue;
                                }
                            }

                            if(multi_family){
                                if (homeType != "MULTI_FAMILY") {
                                    continue;
                                }
                            }
                        }
                    }

                    if(homeType == 'SINGLE_FAMILY'){
                        homeType = 'S';
                    }else if(homeType == 'MULTI_FAMILY'){
                        homeType = 'M';
                    }else if(homeType == 'TOWNHOUSE'){
                        homeType = 'T';
                    }else if(homeType == 'CONDO'){
                        homeType = 'C';
                    }

                    var location = [];
                    location.push(row.streetAddress);
                    location.push(row.city+","+row.state+","+row.zipcode);
                    location.push(row.price + "<br>" + homeType);
                    location.push(row.latitude);
                    location.push(row.longitude);
                    location.push("/house-detail?zpid="+row.zpid);
                    location.push(row.desktopWebHdpImageLink);
                    location.push("assets/landing/img/f.svg");
                    locations.push(location);
                    latitude += row.latitude;
                    longitude += row.longitude;
                    counter += 1;

                    var bedroom = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    if(typeof row.bedrooms != "undefined"){
                        bedroom = row.bedrooms+" beds";
                    }
                    var bathroom = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    if(typeof row.bathrooms != "undefined"){
                        bathroom = row.bathrooms+" baths";
                    }
                    var livingArea = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    if(typeof row.livingArea != "undefined"){
                        livingArea = row.livingArea + " sqft";
                    }
                    var dayson = row.daysOnZillow;
                    if(dayson == -1){
                        dayson = 0;
                    }
                    htm += "<div class=\"col-lg-4 col-md-4\">\n" +
                        "<div class=\"card\">\n" +
                        "<img class=\"card-img-top img-responsive\" style='height:207px;object-fit:cover;background-position: 50% 50%;background-repeat:no-repeat;background-size:cover;' src=\""+row.desktopWebHdpImageLink+"\" alt=\"Card image cap\">\n" +
                        "<div class=\"card-body\">\n" +
                        "<p class=\"card-text\">"+row.streetAddress+"<br>"+row.city+","+row.state+","+row.zipcode +
                        "<br><b>Rent Est. :</b> "+row.rentZestimate+"<br>$ "+row.price+"/sqft "+row.lotSize+"<br>Days Listed : "+dayson+"&nbsp;&nbsp;&nbsp;Status : "+status+"</p>\n" +
                        "<p class=\"card-text\">"+"<i class=\"mdi mdi-bank\"></i> <span class=\"badge badge-pill badge-info\n" +
                        "text-white ml-auto\">"+bedroom+"</span>\n" +
                        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class=\"mdi mdi-seat-legroom-extra\"></i> <span class=\"badge badge-pill badge-warning text-white ml-auto\">"+bathroom+"</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"badge badge-pill badge-success text-white ml-auto\">"+homeType+"</span></p>\n" +
                        "<a href=\"house-detail?zpid="+row.zpid+"\" class=\"btn btn-primary\" target='_blank'>View Details</a>\n" +
                        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n" +
                        "<button type=\"button\" class=\"btn btn-danger btn-circle\" onclick='addCart("+i+")'><i class=\"fa fa-heart\"></i> </button>\n" +
                        "</div>\n" +
                        "</div>\n" +
                        "</div>\n";
                }

                latitude = latitude/counter;
                longitude = longitude/counter;

                createHomepageGoogleMap(latitude,longitude,locations);

                result_content.innerHTML = htm;
            }
        );

    }

    function addCart(idx) {
        var house_data = JSON.stringify(responseData[idx]);

        $.post("/add-cart",{
            _token:'{{csrf_token()}}',
            house_data:house_data,
        }).done(
            function (data) {
                if(data == "success"){
                    swal("Success !", "Added to your watchlist !", "success")
                }else if(data == "dup"){
                    swal("Cancelled", "You already added this house!", "error");
                }else if(data == "error"){
                    swal("Cancelled", "database error !", "error");
                }
            }
        );

    }

    function paginate(page) {
        search(page);

    }

    function onDetail(zpid) {
        window.open("/house-detail?zpid="+zpid);
    }
    function createHomepageGoogleMap(_latitude,_longitude, locations){
        if( document.getElementById('gmaps-simple') != null ){
            var map = new google.maps.Map(document.getElementById('gmaps-simple'),{
                zoom: 12,
                zoomControl: true,
                streetViewControl: true,
                zoomControlOptions:{
                    position: google.maps.ControlPosition.RIGHT_TOP
                },
                streetViewControlOptions:{
                    position: google.maps.ControlPosition.RIGHT_TOP
                },
                scrollwheel: false,
                center: new google.maps.LatLng(_latitude, _longitude)
            });
            var i;
            var newMarkers = [];
            for (i = 0; i < locations.length; i++){
                var pictureLabel = document.createElement("img");
                pictureLabel.src = locations[i][7];
                var boxText = document.createElement("div");
                infoboxOptions = {
                    content: boxText,
                    disableAutoPan: false,
                    pixelOffset: new google.maps.Size(-100, 0),
                    zIndex: null,
                    alignBottom: true,
                    boxClass: "infobox-wrapper",
                    enableEventPropagation: true,
                    closeBoxMargin: "0px 0px -8px 0px",
                    closeBoxURL: "assets/landing/img/close-btn.png",
                    infoBoxClearance: new google.maps.Size(1, 1)
                };
                var marker = new MarkerWithLabel({
                    title: locations[i][0],
                    position: new google.maps.LatLng(locations[i][3], locations[i][4]),
                    map: map,
                    labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="' + locations[i][7] + '" alt="" /></div></div>',
                    labelAnchor: new google.maps.Point(50, 0),
                    labelClass: "marker-style"
                });
                newMarkers.push(marker);
                boxText.innerHTML =
                    '<div class="infobox-inner">' +
                    '<a href="' + locations[i][5] + '">' +
                    '<div class="infobox-image" style="position: relative">' +
                    '<img src="' + locations[i][6] + '" style="max-width: 60px; max-height: 70px">' + '<div><span class="infobox-price">' + locations[i][2] + '</span></div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="infobox-description">' +
                    '<div class="infobox-title"><a href="'+ locations[i][5] +'">' + locations[i][0] + '</a></div>' +
                    '<div class="infobox-location">' + locations[i][1] + '</div>' +
                    '</div>' +
                    '</div>';
                //Define the infobox
                newMarkers[i].infobox = new InfoBox(infoboxOptions);
                google.maps.event.addListener(marker, 'click', (function(marker, i){
                    return function(){
                        for (h = 0; h < newMarkers.length; h++){
                            newMarkers[h].infobox.close();
                        }
                        newMarkers[i].infobox.open(map, this);
                    }
                })(marker, i));
            }

            // Autocomplete
        }
    }
</script>
@stop