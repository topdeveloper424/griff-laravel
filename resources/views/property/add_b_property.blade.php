@extends('layouts/default')
@section('content')
    <link href="{{asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

    <script src="{{asset('assets/node_modules/moment/moment.js')}}"></script>

    <script src="{{asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>


    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Create New Property</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('b-properties')}}">Properties</a></li>
                    <li class="breadcrumb-item active">Add Property</li>
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
                    <form id="form-submit" class="form-submit" autocomplete="off" action="/create-b-property" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">General Information</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Property Name *</label>
                                        <input type="text" name="property_name" id="property_name" class="form-control" placeholder="Enter your title (maximum 250 characters)" required>
                                        <small class="form-control-feedback"> This is Name of property</small>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Year Built</label>
                                        <input type="number" name="year_built" id="year_built" class="form-control" min="1700" max="2050" placeholder="Enter Year Built">
                                        <small class="form-control-feedback"> This is Name of property</small>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">MLS #</label>
                                        <input type="text" name="mls" id="mls" class="form-control" placeholder="Enter MLS #">
                                        <small class="form-control-feedback"> This is MLS # of property</small>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Street Address *</label>
                                        <input spellcheck="false" type="text" style="display:none;">
                                        <input type="text" id="address-map" autocomplete="off"  class="form-control" name="address">
                                        <small class="form-control-feedback"> This is Address of property</small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City *</label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                                        <small class="form-control-feedback"> This is City of property</small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">State/Region *</label>
                                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter State/Region">
                                        <small class="form-control-feedback"> This is State/Region of property</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">ZIP *</label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Zipcode">
                                        <small class="form-control-feedback"> This is zipcode of property</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Country *</label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country">
                                        <small class="form-control-feedback"> This is Country  of property</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="gmaps-simple" class="gmaps"></div>
                                    <input type="text" id="latitude" name="latitude" readonly>
                                    <input type="text" id="longitude" name="longitude" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="input-file-now">Photo Upload</label>
                                    <input type="file" name="photo[]" id="file-upload" class="dropify" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                </div>
                            </div>
                            <h3 class="box-title m-t-40">Property Type</h3>
                            <hr>
                            <div class="row">
                                <input name="property_type" type="hidden" id="property_type">
                                <div class="col-md-4">
                                    <h4>SINGLE UNIT TYPE</h4>
                                    <span>Single family rentals (often abbreviated as SFR) are rentals in which there is only one rental associated to a specific address. This type of rental is usually used for a house, single mobile home, or a single condo. This type of property does not allow to add any units/rooms</span>
                                    <br>
                                    <br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked onchange="clickUnit()">
                                        <label class="custom-control-label" for="customRadio1">Single Unit type</label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <h4>MULTI UNIT TYPE</h4>
                                    <span>Multi-unit property are for rentals in which there are multiple rental units per a single address. This type of property is typically used for renting out rooms of a house, apartment units, office units, condos, garages, storage units, mobile home park and etc.</span>
                                    <br>
                                    <br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" onchange="clickUnit()">
                                        <label class="custom-control-label" for="customRadio2">Multi Unit type </label>
                                    </div>
                                </div>
                            </div>

                            <div id="single_container">
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Beds</label>
                                            <select class="form-control" name="beds" id="beds">
                                                <option value="">Select Beds... </option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9+">9+</option>
                                                <option value="Studio">Studio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Baths</label>
                                            <select class="form-control" name="baths" id="baths">
                                                <option value="">Select Baths... </option>
                                                <option value="none">none</option>
                                                <option value="1">1</option>
                                                <option value="1.5">1.5</option>
                                                <option value="2">2</option>
                                                <option value="2.1">2.1</option>
                                                <option value="2.5">2.5</option>
                                                <option value="3">3</option>
                                                <option value="3.5">3.5</option>
                                                <option value="4">4</option>
                                                <option value="5+">5+</option>
                                                <option value="Shared">Shared</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Size,SQ.FT</label>
                                            <input type="number" name="size_sq" id="size_sq" class="form-control" min="0" placeholder="Enter Size,SQ.FT">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Parking</label>
                                            <select class="form-control" name="parking" id="parking">
                                                <option value="">Select Parking... </option>
                                                <option value="none">none</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Market Rent *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-money"></i></span></div>
                                                <input type="number" class="form-control" name="market_rent" id="market_rent" min="0" placeholder="Enter Market Rent" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Deposit</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-money"></i></span></div>
                                                <input type="number" class="form-control" name="deposit" id="deposit" min="0" placeholder="Enter Deposite">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div id="multi_container" style="display: none;">
                                <h3 class="box-title m-t-40">Unit Information</h3>
                                <hr>
                                <input type="hidden" name="unit_json" id="unit_json">
                                <div id="unit_container">
                                    <input type="hidden" id="unit_counter" value="0">
                                    <div id="unit_body">
                                    </div>

                                    <button type="button" class="btn btn-sm btn-warning" onclick="addUnit()"><i class="ti-plus text"></i> add unit</button>

                                </div>

                            </div>

                            <h3 class="box-title m-t-40">Property Loan Information</h3>
                            <hr>
                            <div id="loan_container">
                                <input type="hidden" name="loan_json" id="loan_json">
                                <input type="hidden" id="loan_counter" value="0">
                                <div id="loan_body">
                                </div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="addLoan()"><i class="ti-plus text"></i> add loan information</button>
                            </div>
                            <h3 class="box-title m-t-40">Property Purchase Information</h3>
                            <hr>
                            <div id="purchase_container">
                                <input type="hidden" name="purchase_json" id="purchase_json">
                                <button type="button" class="btn btn-sm btn-warning" onclick="addPurchase()"><i class="ti-plus text"></i> add purchase information</button>
                                <br>
                                <br>
                                <div id="purchase_body">

                                </div>
                            </div>

                            <h3 class="box-title m-t-40"></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                        <input type="file" name="doc_title[]" id="doc_title" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">Real Estate Taxes :</label>
                                        <input type="file" name="doc_tax[]" id="doc_tax" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">Plot of Survey :</label>
                                        <input type="file" name="doc_survey[]" id="doc_survey" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deed :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="file" name="doc_deed[]" id="doc_deed" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">&nbsp;Assessment :&nbsp;</label>
                                        <input type="file" name="doc_ass[]" id="doc_ass" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-file-now">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="file" name="doc_other[]" id="doc_other" class="btn btn-success" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" data-browse-class="btn btn-default" data-browse-label="Add Files" />
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-5 col-md-9">
                                                <button type="button" class="btn btn-success" id="submit_bt" onclick="submitProperty()"> <i class="fa fa-check"></i> Submit</button>
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

//        $('#form-submit').disableAutoFill();
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
                console.log(place.address_components);
                for(var i = 0; i < place.address_components.length; i ++){
                    if(place.address_components[i].types[0] == "locality"){
                        $("#city").val(place.address_components[i].long_name);
                    }else if(place.address_components[i].types[0] == "postal_code"){
                        $("#zipcode").val(place.address_components[i].long_name);
                    }else if(place.address_components[i].types[0] == "country"){
                        $("#country").val(place.address_components[i].long_name);
                    }else if(place.address_components[i].types[0] == "administrative_area_level_1"){
                        $("#state").val(place.address_components[i].short_name);
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
    function clickUnit() {
        var single = document.getElementById("customRadio1").checked;
        if(single === true){
            document.getElementById("single_container").style.display = "block";
            document.getElementById("multi_container").style.display = "none";
        }else{
            document.getElementById("single_container").style.display = "none";
            document.getElementById("multi_container").style.display = "block";

        }
    }

    function addUnit() {
        var unit_body = document.getElementById("unit_body");
        var elements = unit_body.getElementsByClassName("unit-element");
        var len = 1;
        if(elements){
            len = elements.length + 1;
        }

        var unit_counter = document.getElementById("unit_counter").value;
        var counter = parseInt(unit_counter) + 1;
        document.getElementById("unit_counter").value  = counter;
        var html = "                                <div class=\"unit-element\" id=\"unit_element"+counter+"\"><hr><button  type=\"button\" class='btn btn-primary' style='float: right' onclick='del_unit("+counter+")'><i class='ti-trash'></i></button><div class='row'>\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Unit #</label>\n" +
            "                                            <input type=\"text\" name=\"unit_no\" id=\"unit_no\" class=\"form-control\" value='"+len+"' required>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-6\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Unit Type</label>\n" +
            "                                            <select class=\"form-control\" name=\"unit_type\" id=\"unit_type\" required>\n" +
            "                                                <option value=\"Room\">Room</option>\n" +
            "                                                <option value=\"Apartment\" selected>Apartment</option>\n" +
            "                                                <option value=\"Duplex\">Duplex</option>\n" +
            "                                                <option value=\"Townhouse\">Townhouse</option>\n" +
            "                                                <option value=\"Condo\">Condo</option>\n" +
            "                                                <option value=\"Commercial\">Commercial</option>\n" +
            "                                                <option value=\"Storage\">Storage</option>\n" +
            "                                                <option value=\"Parking Space\">Parking Space</option>\n" +
            "                                                <option value=\"Triplex\">Triplex</option>\n" +
            "                                                <option value=\"Suite\">Suite</option>\n" +
            "                                                <option value=\"Mobile Home\">Mobile Home</option>\n" +
            "                                                <option value=\"Fourplex\">Fourplex</option>\n" +
            "                                            </select>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Size, SQ.FT</label>\n" +
            "                                            <input type=\"number\" name=\"unit_size\" id=\"unit_size\" class=\"form-control\">\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Beds</label>\n" +
            "                                            <select class=\"form-control\" id=\"unit_beds\">\n" +
            "                                                <option value=\"\">Select Beds... </option>\n" +
            "                                                <option value=\"1\">1</option>\n" +
            "                                                <option value=\"2\">2</option>\n" +
            "                                                <option value=\"3\">3</option>\n" +
            "                                                <option value=\"4\">4</option>\n" +
            "                                                <option value=\"5\">5</option>\n" +
            "                                                <option value=\"6\">6</option>\n" +
            "                                                <option value=\"7\">7</option>\n" +
            "                                                <option value=\"8\">8</option>\n" +
            "                                                <option value=\"9+\">9+</option>\n" +
            "                                                <option value=\"Studio\">Studio</option>\n" +
            "                                            </select>\n" +
            "\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Baths</label>\n" +
            "                                            <select class=\"form-control\" id=\"unit_baths\">\n" +
            "                                                <option value=\"\">Select Baths... </option>\n" +
            "                                                <option value=\"none\">none</option>\n" +
            "                                                <option value=\"1\">1</option>\n" +
            "                                                <option value=\"1.5\">1.5</option>\n" +
            "                                                <option value=\"2\">2</option>\n" +
            "                                                <option value=\"2.1\">2.1</option>\n" +
            "                                                <option value=\"2.5\">2.5</option>\n" +
            "                                                <option value=\"3\">3</option>\n" +
            "                                                <option value=\"3.5\">3.5</option>\n" +
            "                                                <option value=\"4\">4</option>\n" +
            "                                                <option value=\"5+\">5+</option>\n" +
            "                                                <option value=\"Shared\">Shared</option>\n" +
            "                                            </select>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                    </div>\n" +
            "\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Rent *</label>\n" +
            "                                            <div class=\"input-group\">\n" +
            "                                                <div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"ti-money\"></i></span></div>\n" +
            "                                                <input type=\"number\" class=\"form-control\" name=\"unit_rent\" id=\"unit_rent\" min=\"0\" placeholder=\"Enter Rent\" required>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                    </div>\n" +
            "\n" +
            "                                    <div class=\"col-md-3\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Deposit</label>\n" +
            "                                            <div class=\"input-group\">\n" +
            "                                                <div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"ti-money\"></i></span></div>\n" +
            "                                                <input type=\"number\" class=\"form-control\" id=\"unit_deposit\" min=\"0\" placeholder=\"Enter Deposite\">\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                    </div>\n" +
            "\n" +
            "                                </div></div>\n";
        var e = document.createElement('div');
        e.innerHTML = html;
        while(e.firstChild) {
            unit_body.appendChild(e.firstChild);
        }

    }

    function del_unit(counter) {
        var unit_body = document.getElementById("unit_body");
        var element = document.getElementById("unit_element" + counter);
        element.parentElement.removeChild(element);

    }


    function addLoan() {

        var loan_body = document.getElementById("loan_body");
        var elements = loan_body.getElementsByClassName("loan-element");
        var len = 0;
        if(elements){
            len = elements.length;
        }
        if(len > 2){
            return;
        }
        var loan_counter = document.getElementById("loan_counter").value;
        var counter = parseInt(loan_counter) + 1;
        document.getElementById("loan_counter").value  = counter;

        var html = "                                    <div class=\"loan-element\" id=\"loan_element"+counter+"\"><hr><button  type=\"button\" class='btn btn-primary' style='float: right' onclick='del_loan("+counter+")'><i class='ti-trash'></i></button><div class='row'>\n" +
            "                                        <div class=\"col-md-8\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Title *</label>\n" +
            "                                                <input type=\"text\" name=\"loan_title\" id='loan_title' class=\"form-control\" placeholder=\"Enter a title\" required>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Loan Amount $ *</label>\n" +
            "                                                <input type=\"number\" name=\"loan_amount\" id='loan_amount' class=\"form-control\" min=\"0\" placeholder=\"Enter a loan amount\" required>\n" +
            "                                                <small class=\"form-control-feedback\"> Enter the total amount of money you are borrowing. </small>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Annual Interest *</label>\n" +
            "                                                <input type=\"text\" name=\"annual_interest\" id='annual_interest' class=\"form-control\" placeholder=\"Enter a interest rate\" required>\n" +
            "                                                <small class=\"form-control-feedback\"> This is the total amount of interest that you would pay, assuming that you make all of your regular payments. </small>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Loan Start Date *</label>\n" +
            "                                                <input type=\"text\" class=\"datepicker-autoclose form-control\" placeholder=\"2017-06-04\" id=\"loan_st_date\" required>\n" +
            "                                                <small class=\"form-control-feedback\"> Assumes that the first payment date is at the end of the first period. </small>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Loan Period In Years *</label>\n" +
            "                                                <input type=\"text\" name=\"loan_period\" class=\"form-control\" id=\"loan_period\" placeholder=\"Enter a loan period\" required>\n" +
            "                                                <small class=\"form-control-feedback\"> Enter the length of the loan in years(ie..,15 or 30 years). </small>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Loan Type</label>\n" +
            "                                                <select class=\"form-control\" id=\"loan_type\">\n" +
            "                                                    <option value=\"\">Select Loan Type ... </option>\n" +
            "                                                    <option value=\"0\">Private</option>\n" +
            "                                                    <option value=\"1\">Conventional</option>\n" +
            "                                                </select>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Payments Due</label>\n" +
            "                                                <select class=\"form-control\" id=\"payment_due\">\n" +
            "                                                    <option value=\"\">Select payment due ... </option>\n" +
            "                                                    <option value=\"0\">monthly</option>\n" +
            "                                                    <option value=\"1\">quarterly</option>\n" +
            "                                                    <option value=\"2\">annually</option>\n" +
            "                                                </select>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"col-md-4\">\n" +
            "                                            <div class=\"form-group\">\n" +
            "                                                <label class=\"control-label\">Current Loan Balance $</label>\n" +
            "                                                <input type=\"number\" name=\"loan_balance\" class=\"form-control\" id=\"loan_balance\" placeholder=\"0.00\">\n" +
            "                                            </div>\n" +
            "                                        </div></div>\n" +
            "\n" +
            "                                    </div>\n";

        var e = document.createElement('div');
        e.innerHTML = html;
        while(e.firstChild) {
            loan_body.appendChild(e.firstChild);
        }

        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });


    }

    function del_loan(counter) {
        var loan_body = document.getElementById("loan_body");
        var element = document.getElementById("loan_element" + counter);
        element.parentElement.removeChild(element);
    }
    
    function addPurchase() {
        var purchase_body = document.getElementById("purchase_body");
        var elements = purchase_body.getElementsByClassName("purchase");
        var len = 0;
        if(elements){
            len = elements.length;
        }
        if(len > 0){
            return;
        }

        var html = "                                   <div id='purchase_content'> <button  type=\"button\" class='btn btn-primary' style='float: right' onclick=\"del_purchase()\"><i class='ti-trash'></i></button>\n" +
            "                                    <div class=\"row purchase\" id=\"purchase\">\n" +
            "                                        <div class=\"col-md-4\"><div class='form-group'>\n" +
            "                                            <label class=\"control-label\">Purchase Price $ *</label>\n" +
            "                                            <input type=\"number\" name=\"purchase_price\" id=\"purchase_price\" min=\"0\" class=\"form-control\" placeholder=\"Enter a purchase price\"  onchange='cal_depreciation()'>\n" +
            "                                            <small class=\"form-control-feedback\"> Enter the original price of the asset. The amount you paid for the house or asset</small>\n" +
            "                                        </div></div>\n" +
            "                                        <div class=\"col-md-4\"><div class='form-group'>\n" +
            "                                            <label class=\"control-label\">Start Date *</label>\n" +
            "                                            <input type=\"text\" name=\"purchase_st_date\" id=\"purchase_st_date\" class=\"datepicker-autoclose form-control\" placeholder=\"Enter a purchase start date\">\n" +
            "                                            <small class=\"form-control-feedback\"> Select the date and enter the year the asset started being used for its intended purpose. in most cases this is the purchase date.</small>\n" +
            "                                        </div></div>\n" +
            "                                        <div class=\"col-md-4\"><div class='form-group'>\n" +
            "                                            <label class=\"control-label\">Down Payment $</label>\n" +
            "                                            <input type=\"number\" name=\"purchase_d_payment\" id=\"purchase_d_payment\" min=\"0\" class=\"form-control\" placeholder=\"0.00\">\n" +
            "                                        </div></div>\n" +
            "                                        <div class=\"col-md-4\"><div class='form-group'>\n" +
            "                                            <label class=\"control-label\">Depreciable Years</label>\n" +
            "                                            <select class=\"form-control\" id=\"purchase_d_years\" onchange='cal_depreciation()'>\n" +
            "                                                <option value=\"3\">3 Years</option>\n" +
            "                                                <option value=\"5\">5 Years</option>\n" +
            "                                                <option value=\"7\">7 Years</option>\n" +
            "                                                <option value=\"10\">10 Years</option>\n" +
            "                                                <option value=\"15\">15 Years</option>\n" +
            "                                                <option value=\"20\">20 Years</option>\n" +
            "                                                <option value=\"22\">22 Years</option>\n" +
            "                                                <option value=\"27.5\" selected>27.5 Years</option>\n" +
            "                                                <option value=\"30\">30 Years</option>\n" +
            "                                                <option value=\"31.5\">31.5 Years</option>\n" +
            "                                                <option value=\"39\">39 Years</option>\n" +
            "                                                <option value=\"40\">40 Years</option>\n" +
            "                                            </select>\n" +
            "                                        </div></div>\n" +
             "                                    <div class=\"col-md-4\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Annual Depreciation $</label>\n" +
            "                                            <input type=\"text\" class=\"form-control\" id=\"purchase_a_dep\" readonly>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-4\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Land Value $</label>\n" +
            "                                            <input type=\"text\" class=\"form-control\" id=\"purchase_land_value\" placeholder=\"Enter a land value\">\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                    <div class=\"col-md-12\">\n" +
            "                                        <div class=\"form-group\">\n" +
            "                                            <label class=\"control-label\">Details</label>\n" +
            "                                            <textarea type=\"text\" class=\"form-control\" id=\"purchase_details\" style=\"min-height: 20vh\" placeholder=\"Enter a land value\"></textarea>\n" +
            "                                        </div>\n" +
            "                                    </div>\n"+
                "<div class='col-md-12'>                            <div class=\"form-group\">\n" +
            "                                <label for=\"input-file-now\">Store Documents and templates</label>\n" +
            "                                <input type=\"file\" name=\"purchase_files[]\" id=\"file-upload\" class=\"dropify\" required multiple data-show-upload=\"false\" data-show-caption=\"false\" data-show-remove=\"false\" accept=\"image/jpeg,image/png\" data-browse-class=\"btn btn-default\" data-browse-label=\"Add Files\" />\n" +
            "                            </div></div>"
            "\n" +
            "                                    </div></div>";

        var e = document.createElement('div');
        e.innerHTML = html;
        while(e.firstChild) {
            purchase_body.appendChild(e.firstChild);
        }

        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });


    }

    function del_purchase() {
        var element = document.getElementById("purchase_content");
        element.parentElement.removeChild(element);

    }

    function cal_depreciation() {
        var price = $("#purchase_price").val();
        var year = $("#purchase_d_years").val();
        if(price != "" && year != ""){
            var price_float = parseFloat(price);
            var year_float = parseFloat(year);
            var dep = price_float/year_float;
            $("#purchase_a_dep").val(dep);
        }
    }
    function submitProperty() {

        event.preventDefault();
        var property_name = $("#property_name").val();
        var address = $("#address-map").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zipcode = $("#zipcode").val();
        var country = $("#country").val();
        var latitude = $("#latitude").val();
        var longitude = $("#longitude").val();
        if(property_name == '' || address == '' || city == '' || state=='' || zipcode == '' || country==''|| latitude == '' || longitude== ''){
            swal("Cancelled", "Enter required fields in general information!", "error");
            return;
        }

        var property_type = document.getElementById("customRadio1").checked;
        if(property_type == false){
            $("#property_type").val(0);
            var unit_json = '';

            var unit_body = document.getElementById("unit_body");
            var unit_elements = unit_body.getElementsByClassName("unit-element");
            var JSONObj = [];
            for (var i = 0; i < unit_elements.length; i ++){
                var element = unit_elements[i];
                var unit_no = element.querySelector("#unit_no").value;
                var unit_type = element.querySelector("#unit_type").value;
                var unit_size = element.querySelector("#unit_size").value;
                var unit_beds = element.querySelector("#unit_beds").value;
                var unit_baths = element.querySelector("#unit_baths").value;
                var unit_rent = element.querySelector("#unit_rent").value;
                var unit_deposit = element.querySelector("#unit_deposit").value;
                var item = {};
                if(unit_rent == ''){
                    swal("Cancelled", "Enter rent field !", "error");
                    return;

                }
                item["unit_no"] = unit_no;
                item["unit_type"] = unit_type;
                item["unit_size"] = unit_size;
                item["unit_beds"] = unit_beds;
                item["unit_baths"] = unit_baths;
                item["unit_rent"] = unit_rent;
                item["unit_deposit"] = unit_deposit;
                JSONObj.push(item);
            }
            console.log(JSONObj);
            unit_json = JSON.stringify(JSONObj);
            document.getElementById("unit_json").value = unit_json;
        }else{
            $("#property_type").val(1);

            var market_rent = $("#market_rent").val();
            if(market_rent == ''){
                swal("Cancelled", "Enter market rent field !", "error");
                return;
            }
        }

        var loan_body = document.getElementById("loan_body");
        var loan_elements = loan_body.getElementsByClassName("loan-element");
        var loan_len = 0;
        if(loan_elements){
            loan_len = loan_elements.length;
        }

        if(loan_len > 0){
            var loan_json = '';
            var JSONObj = [];
            for(var i = 0; i < loan_elements.length; i ++){
                var element = loan_elements[i];
                var loan_title = element.querySelector("#loan_title").value;
                var loan_amount = element.querySelector("#loan_amount").value;
                var annual_interest = element.querySelector("#annual_interest").value;
                var loan_st_date = element.querySelector("#loan_st_date").value;
                var loan_period = element.querySelector("#loan_period").value;
                var loan_type = element.querySelector("#loan_type").value;
                var payment_due = element.querySelector("#payment_due").value;
                var loan_balance = element.querySelector("#loan_balance").value;
                if(loan_title == ''){
                    swal("Cancelled", "Enter Title field in Property loan information!", "error");
                    return;
                }
                if(loan_amount == ''){
                    swal("Cancelled", "Enter Loan Amount Field in Property loan information!", "error");
                    return;
                }
                if(annual_interest == ''){
                    swal("Cancelled", "Enter Annual Interest Field in Property loan information!", "error");
                    return;
                }
                if(loan_st_date == ''){
                    swal("Cancelled", "Enter Loan Start Date Field in Property loan information!", "error");
                    return;
                }
                if(loan_period == ''){
                    swal("Cancelled", "Enter Loan Period In Years Field in Property loan information!", "error");
                    return;
                }
                var item = {};
                item["loan_title"] = loan_title;
                item["loan_amount"] = loan_amount;
                item["annual_interest"] = annual_interest;
                item["loan_st_date"] = loan_st_date;
                item["loan_period"] = loan_period;
                item["loan_type"] = loan_type;
                item["payment_due"] = payment_due;
                item["loan_balance"] = loan_balance;
                JSONObj.push(item);
            }
            console.log(JSONObj);

            loan_json = JSON.stringify(JSONObj);
            document.getElementById("loan_json").value = loan_json;
        }


        var purchase_body = document.getElementById("purchase_body");
        var purchase_content = purchase_body.querySelector("#purchase_content");
        if(purchase_content){
            var purchase_json = '';
            var item = {};
            var purchase_price = document.getElementById("purchase_price").value;
            var purchase_st_date = document.getElementById("purchase_st_date").value;
            var purchase_d_payment = document.getElementById("purchase_d_payment").value;
            var purchase_d_years = document.getElementById("purchase_d_years").value;
            var purchase_a_dep = document.getElementById("purchase_a_dep").value;
            var purchase_land_value = document.getElementById("purchase_land_value").value;
            var purchase_details = document.getElementById("purchase_details").value;
            if(purchase_price == ''){
                swal("Cancelled", "Enter Purchase Price in Property purchase information!", "error");
                return;
            }
            if(purchase_st_date == ''){
                swal("Cancelled", "Enter Start Date in Property purchase information!", "error");
                return;
            }

            item["purchase_price"] = purchase_price;
            item["purchase_st_date"] = purchase_st_date;
            item["purchase_d_payment"] = purchase_d_payment;
            item["purchase_d_years"] = purchase_d_years;
            item["purchase_a_dep"] = purchase_a_dep;
            item["purchase_land_value"] = purchase_land_value;
            item["purchase_details"] = purchase_details;
            purchase_json = JSON.stringify(item);
            document.getElementById("purchase_json").value = purchase_json;
            console.log(item);

        }
       document.getElementById("form-submit").submit();

    }



</script>
@stop