
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Unit Page ( Multi Unit Type )</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Units</li>
                    <li class="breadcrumb-item active">Edit Unit</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/update-m-unit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <input type="hidden" name="idx" value="{{$idx}}">
                        <?php $units = json_decode($property->units);
                        $unit = $units[$idx];
                        ?>
                        <input type="hidden" name="unit_no" value="{{$unit->unit_no}}">

                        <div class='row'>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-file-now">Photo Upload</label>

                                        <input type="file" name="photo[]" id="file-upload" class="dropify" required
                                               multiple data-show-upload="false" data-show-caption="false"
                                               @if($property->photo) data-default-file="{{asset('storage/uploads/units/')}}/{{$property->id}}/{{$property->photo}}" @endif
                                               data-show-remove="false" accept="image/jpeg,image/png"
                                               data-browse-class="btn btn-default" data-browse-label="Add Files"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Unit Type</label>
                                            <select class="form-control" name="unit_type"
                                                    id="unit_type" required>
                                                <option value="Room"
                                                        @if($unit->unit_type == 'Room' ) selected @endif >
                                                    Room
                                                </option>
                                                <option value="Apartment"
                                                        @if($unit->unit_type == 'Apartment' ) selected @endif>
                                                    Apartment
                                                </option>
                                                <option value="Duplex"
                                                        @if($unit->unit_type == 'Duplex' ) selected @endif>
                                                    Duplex
                                                </option>
                                                <option value="Townhouse"
                                                        @if($unit->unit_type == 'Townhouse' ) selected @endif>
                                                    Townhouse
                                                </option>
                                                <option value="Condo"
                                                        @if($unit->unit_type == 'Condo' ) selected @endif>
                                                    Condo
                                                </option>
                                                <option value="Commercial"
                                                        @if($unit->unit_type == 'Commercial' ) selected @endif>
                                                    Commercial
                                                </option>
                                                <option value="Storage"
                                                        @if($unit->unit_type == 'Storage' ) selected @endif>
                                                    Storage
                                                </option>
                                                <option value="Parking Space"
                                                        @if($unit->unit_type == 'Parking Space' ) selected @endif>
                                                    Parking Space
                                                </option>
                                                <option value="Triplex"
                                                        @if($unit->unit_type == 'Triplex' ) selected @endif>
                                                    Triplex
                                                </option>
                                                <option value="Suite"
                                                        @if($unit->unit_type == 'Suite' ) selected @endif>
                                                    Suite
                                                </option>
                                                <option value="Mobile Home"
                                                        @if($unit->unit_type == 'Mobile Home' ) selected @endif>Mobile Home</option>
                                                <option value="Fourplex"
                                                        @if($unit->unit_type == 'Fourplex' ) selected @endif>
                                                    Fourplex
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Size, SQ.FT</label>
                                            <input type="number" name="unit_size" id="unit_size"
                                                   class="form-control"
                                                   value="{{$unit->unit_size}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Beds</label>
                                            <select class="form-control" id="unit_beds" name="unit_beds">
                                                <option value="">Select Beds...</option>
                                                <option value="1"
                                                        @if($unit->unit_beds == '1' ) selected @endif>
                                                    1
                                                </option>
                                                <option value="2"
                                                        @if($unit->unit_beds == '2' ) selected @endif>
                                                    2
                                                </option>
                                                <option value="3"
                                                        @if($unit->unit_beds == '3' ) selected @endif>
                                                    3
                                                </option>
                                                <option value="4"
                                                        @if($unit->unit_beds == '4' ) selected @endif>
                                                    4
                                                </option>
                                                <option value="5"
                                                        @if($unit->unit_beds == '5' ) selected @endif>
                                                    5
                                                </option>
                                                <option value="6"
                                                        @if($unit->unit_beds == '6' ) selected @endif>
                                                    6
                                                </option>
                                                <option value="7"
                                                        @if($unit->unit_beds == '7' ) selected @endif>
                                                    7
                                                </option>
                                                <option value="8"
                                                        @if($unit->unit_beds == '8' ) selected @endif>
                                                    8
                                                </option>
                                                <option value="9+"
                                                        @if($unit->unit_beds == '9+' ) selected @endif>
                                                    9+
                                                </option>
                                                <option value="Studio"
                                                        @if($unit->unit_beds == 'Studio' ) selected @endif>
                                                    Studio
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Baths</label>
                                            <select class="form-control" id="unit_baths" name="unit_baths">
                                                <option value="">Select Baths...</option>
                                                <option value="none"
                                                        @if($unit->unit_baths == 'none' ) selected @endif>
                                                    none
                                                </option>
                                                <option value="1"
                                                        @if($unit->unit_baths == '1' ) selected @endif>
                                                    1
                                                </option>
                                                <option value="1.5"
                                                        @if($unit->unit_baths == '1.5' ) selected @endif>
                                                    1.5
                                                </option>
                                                <option value="2"
                                                        @if($unit->unit_baths == '2' ) selected @endif>
                                                    2
                                                </option>
                                                <option value="2.1"
                                                        @if($unit->unit_baths == '2.1' ) selected @endif>
                                                    2.1
                                                </option>
                                                <option value="2.5"
                                                        @if($unit->unit_baths == '2.5' ) selected @endif>
                                                    2.5
                                                </option>
                                                <option value="3"
                                                        @if($unit->unit_baths == '3' ) selected @endif>
                                                    3
                                                </option>
                                                <option value="3.5"
                                                        @if($unit->unit_baths == '3.5' ) selected @endif>
                                                    3.5
                                                </option>
                                                <option value="4"
                                                        @if($unit->unit_baths == '4' ) selected @endif>
                                                    4
                                                </option>
                                                <option value="5+"
                                                        @if($unit->unit_baths == '5+' ) selected @endif>
                                                    5+
                                                </option>
                                                <option value="Shared"
                                                        @if($unit->unit_baths == 'Shared' ) selected @endif>
                                                    Shared
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Rent *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text"><i
                                                                class="ti-money"></i></span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       name="unit_rent" id="unit_rent" min="0"
                                                       placeholder="Enter Rent"
                                                       value="{{$unit->unit_rent}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Deposit</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text"><i
                                                                class="ti-money"></i></span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       id="unit_deposit" min="0" name="unit_deposit"
                                                       placeholder="Enter Deposite"
                                                       value="{{$unit->unit_deposit}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
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

                            <div class="col-md-6">
                                <label class="label label-info">Title documents : </label>
                                @if($property->doc_title)
                                    @foreach($property->doc_title as $document)
                                        <a href="{{asset('storage/uploads/units/title-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="label label-info">Tax documents : </label>
                                @if($property->doc_tax)
                                    @foreach($property->doc_tax as $document)
                                        <a href="{{asset('storage/uploads/units/tax-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                    @endforeach
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label class="label label-info">Survey documents : </label>
                                @if($property->doc_survey)
                                    @foreach($property->doc_survey as $document)
                                        <a href="{{asset('storage/uploads/units/survey-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="label label-info">Deed documents : </label>
                                @if($property->doc_deed)
                                    @foreach($property->doc_deed as $document)
                                        <a href="{{asset('storage/uploads/units/deed-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="label label-info">Assessment documents : </label>
                                @if($property->doc_ass)
                                    @foreach($property->doc_ass as $document)
                                        <a href="{{asset('storage/uploads/units/ass-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="label label-info">Other documents : </label>
                                @if($property->doc_other)
                                    @foreach($property->doc_other as $document)
                                        <a href="{{asset('storage/uploads/units/other-')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $('.dropify').dropify();
    </script>
@stop