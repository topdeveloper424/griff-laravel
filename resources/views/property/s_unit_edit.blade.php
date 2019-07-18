
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Unit Page ( Single Unit Type )</h4>
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
                    <form action="/update-s-unit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-file-now">Photo Upload</label>
                                        @if($property->photo)
                                        <input type="file" name="photo[]" id="file-upload" class="dropify" required
                                               multiple data-show-upload="false" data-show-caption="false"
                                               data-default-file="{{asset('storage/uploads/units/')}}/{{$property->id}}/{{$property->photo}}"
                                               data-show-remove="false" accept="image/jpeg,image/png"
                                               data-browse-class="btn btn-default" data-browse-label="Add Files"/>
                                        @else
                                            <input type="file" name="photo[]" id="file-upload" class="dropify" required
                                                   multiple data-show-upload="false" data-show-caption="false"
                                                   data-show-remove="false" accept="image/jpeg,image/png"
                                                   data-browse-class="btn btn-default" data-browse-label="Add Files"/>

                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Beds</label>
                                            <select class="form-control" name="beds" id="beds">
                                                <option value="">Select Beds...</option>
                                                <option value="1" @if($property->beds == 1) selected @endif >1
                                                </option>
                                                <option value="2" @if($property->beds == 2) selected @endif>2
                                                </option>
                                                <option value="3" @if($property->beds == 3) selected @endif>3
                                                </option>
                                                <option value="4" @if($property->beds == 4) selected @endif>4
                                                </option>
                                                <option value="5" @if($property->beds == 5) selected @endif>5
                                                </option>
                                                <option value="6" @if($property->beds == 6) selected @endif>6
                                                </option>
                                                <option value="7" @if($property->beds == 7) selected @endif>7
                                                </option>
                                                <option value="8" @if($property->beds == 8) selected @endif>8
                                                </option>
                                                <option value="9+" @if($property->beds == '+9') selected @endif>9+
                                                </option>
                                                <option value="Studio"
                                                        @if($property->beds == 'Studio') selected @endif>Studio
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Baths</label>
                                            <select class="form-control" name="baths" id="baths">
                                                <option value="">Select Baths...</option>
                                                <option value="none"
                                                        @if($property->baths == 'none') selected @endif >none
                                                </option>
                                                <option value="1" @if($property->baths == '1') selected @endif>1
                                                </option>
                                                <option value="1.5" @if($property->baths == '1.5') selected @endif>
                                                    1.5
                                                </option>
                                                <option value="2" @if($property->baths == '2') selected @endif>2
                                                </option>
                                                <option value="2.1" @if($property->baths == '2.1') selected @endif>
                                                    2.1
                                                </option>
                                                <option value="2.5" @if($property->baths == '2.5') selected @endif>
                                                    2.5
                                                </option>
                                                <option value="3" @if($property->baths == '3') selected @endif>3
                                                </option>
                                                <option value="3.5" @if($property->baths == '3.5') selected @endif>
                                                    3.5
                                                </option>
                                                <option value="4" @if($property->baths == '4') selected @endif>4
                                                </option>
                                                <option value="5+" @if($property->baths == '+5') selected @endif>
                                                    5+
                                                </option>
                                                <option value="Shared"
                                                        @if($property->baths == 'Shared') selected @endif>Shared
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Size,SQ.FT</label>
                                            <input type="number" name="size_sq" id="size_sq" class="form-control"
                                                   min="0" value="{{$property->size}}"
                                                   placeholder="Enter Size,SQ.FT">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Parking</label>
                                            <select class="form-control" name="parking" id="parking">
                                                <option value="">Select Parking...</option>
                                                <option value="none"
                                                        @if($property->parking == 'none') selected @endif>none
                                                </option>
                                                <option value="1" @if($property->parking == '1') selected @endif>1
                                                </option>
                                                <option value="2" @if($property->parking == '2') selected @endif>2
                                                </option>
                                                <option value="3" @if($property->parking == '3') selected @endif>3
                                                </option>
                                                <option value="4" @if($property->parking == '4') selected @endif>4
                                                </option>
                                                <option value="5" @if($property->parking == '5') selected @endif>5
                                                </option>
                                                <option value="6" @if($property->parking == '6') selected @endif>6
                                                </option>
                                                <option value="7" @if($property->parking == '7') selected @endif>7
                                                </option>
                                                <option value="8" @if($property->parking == '8') selected @endif>8
                                                </option>
                                                <option value="9" @if($property->parking == '9') selected @endif>9
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Market Rent *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-money"></i></span></div>
                                                <input type="number" class="form-control" name="market_rent"
                                                       id="market_rent" min="0" value="{{$property->market_rent}}"
                                                       placeholder="Enter Market Rent" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Deposit</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="ti-money"></i></span></div>
                                                <input type="number" class="form-control" name="deposit"
                                                       id="deposit" min="0" value="{{$property->deposit}}"
                                                       placeholder="Enter Deposite">
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
                                        &nbsp;&nbsp;
                                        <a href="{{asset('storage/uploads/units/title/')}}{{$property->id}}/{{$document}}" download>{{$document}}</a>
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