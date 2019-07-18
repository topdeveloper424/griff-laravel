
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>


    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Property View Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Property View</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title" id="1">General Information</h4>
                    <a href="/edit-b-unit?property_id={{$property->id}}" style="margin-left: 70vw"><button class="btn btn-danger">Edit Unit</button></a>
                    <br>
                </div>
                <div class="col-md-6">
                    <label class="label label-info">Property Name : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->name}}
                </div>
                <div class="col-md-3">
                    <label class="label label-info">Year Built : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->year_built}}
                </div>
                <div class="col-md-3">
                    <label class="label label-info">MLS # : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->mls}}
                </div>
                <div class="col-md-6">
                    <label class="label label-info">Street Address : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->address}}
                </div>
                <div class="col-md-6">
                    <label class="label label-info">City : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->city}}
                </div>
                <div class="col-md-3">
                    <label class="label label-info">State/Region : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->state}}
                </div>
                <div class="col-md-3">
                    <label class="label label-info">ZIP : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->zipcode}}
                </div>
                <div class="col-md-6">
                    <label class="label label-info">Country : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->country}}
                </div>
                <div class="col-md-6">
                    <label class="label label-info">Property Status : </label>
                    &nbsp;&nbsp;&nbsp;{{$property->property_status}}
                </div>

                <div class="col-md-6"></div>
                <hr><br><br>
                <div class="col-md-6">
                    <label class="label label-info">Title documents : </label>
                    @if($property->doc_title)
                    @foreach($property->doc_title as $document)
                            &nbsp;&nbsp;
                            <a href="{{asset('storage/uploads/documents/title/')}}/{{$document}}" download>{{$document}}</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="label label-info">Tax documents : </label>
                    @if($property->doc_tax)
                        @foreach($property->doc_tax as $document)
                            <a href="{{asset('storage/uploads/documents/tax/')}}/{{$document}}" download>{{$document}}</a>
                        @endforeach
                    @endif
                </div>


                <div class="col-md-6">
                    <label class="label label-info">Survey documents : </label>
                    @if($property->doc_survey)
                        @foreach($property->doc_survey as $document)
                            <a href="{{asset('storage/uploads/documents/survey/')}}/{{$document}}" download>{{$document}}</a>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="label label-info">Deed documents : </label>
                    @if($property->doc_deed)
                        @foreach($property->doc_deed as $document)
                            <a href="{{asset('storage/uploads/documents/deed/')}}/{{$document}}" download>{{$document}}</a>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="label label-info">Assessment documents : </label>
                    @if($property->doc_ass)
                        @foreach($property->doc_ass as $document)
                            <a href="{{asset('storage/uploads/documents/ass/')}}/{{$document}}" download>{{$document}}</a>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="label label-info">Other documents : </label>
                    @if($property->doc_other)
                        @foreach($property->doc_other as $document)
                            <a href="{{asset('storage/uploads/documents/other/')}}/{{$document}}" download>{{$document}}</a>
                        @endforeach
                    @endif
                </div>


            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title" id="2">Property Units</h4>
                    <br>
                </div>
                @if($property->property_type == 1)
                    <div class="col-md-6">
                        <label class="label label-success">Beds : </label>
                        &nbsp;&nbsp;&nbsp;{{$property->beds}}
                    </div>
                    <div class="col-md-6">
                        <label class="label label-success">Baths : </label>
                        &nbsp;&nbsp;&nbsp;{{$property->baths}}
                    </div>
                    <div class="col-md-6">
                        <label class="label label-success">Size,SQ.FT : </label>
                        &nbsp;&nbsp;&nbsp;{{$property->size}}
                    </div>
                    <div class="col-md-6">
                        <label class="label label-success">Parking : </label>
                        &nbsp;&nbsp;&nbsp;{{$property->parking}}
                    </div>
                    <div class="col-md-6">
                        <label class="label label-success">Market Rent : </label>
                        &nbsp;&nbsp;&nbsp;${{$property->market_rent}}
                    </div>
                    <div class="col-md-6">
                        <label class="label label-success">Deposit : </label>
                        &nbsp;&nbsp;&nbsp;$ {{$property->deposit}}
                    </div>
                @else
                    <?php
                        $units = json_decode($property->units);
                        $idx = 0;

                    ?>
                    @foreach($units as $unit)
                        <div class="col-md-12">
                            <hr>
                            <div style="display: inline-flex">
                                <h3>Unit {{$unit->unit_no}}</h3>
                                <a href="/edit-b-unit?property_id={{$property->id}}&idx={{$idx}}" style="margin-left: 70vw"><button class="btn btn-danger">Edit Unit</button></a>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Unit Type : </label>
                            &nbsp;&nbsp;&nbsp;{{$unit->unit_type}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Bed : </label>
                            &nbsp;&nbsp;&nbsp;{{$unit->unit_beds}} beds
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Bath : </label>
                            &nbsp;&nbsp;&nbsp;{{$unit->unit_baths}} baths
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Size, SQ.FT : </label>
                            &nbsp;&nbsp;&nbsp;{{$unit->unit_size}} SQ.FT
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Rent : </label>
                            &nbsp;&nbsp;&nbsp;$ {{$unit->unit_rent}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-success">Deposit : </label>
                            &nbsp;&nbsp;&nbsp;$ {{$unit->unit_deposit}}
                        </div>

                        <?php $idx ++; ?>

                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title" id="3">Property Loan Information</h4>
                    <br>
                </div>
                @if($property->loan_info)
                    <?php $loans = json_decode($property->loan_info) ?>
                    @foreach($loans as $loan)
                        <div class="col-md-12">
                            <h3>{{$loan->loan_title}}</h3>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Title : </label>
                            &nbsp;&nbsp;&nbsp; {{$loan->loan_title}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Loan Amount : </label>
                            &nbsp;&nbsp;&nbsp;$ {{$loan->loan_amount}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Annual Interest : </label>
                            &nbsp;&nbsp;&nbsp; {{$loan->annual_interest}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Loan Start Date : </label>
                            &nbsp;&nbsp;&nbsp; {{$loan->loan_st_date}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Loan Period In Years : </label>
                            &nbsp;&nbsp;&nbsp; {{$loan->loan_period}}
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Loan Type : </label>
                            @if($loan->loan_type == 0)
                            &nbsp;&nbsp;&nbsp; Private
                            @else
                            &nbsp;&nbsp;&nbsp; Conventional
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Payments Due : </label>
                            @if($loan->payment_due == 0)
                                &nbsp;&nbsp;&nbsp; Monthly
                            @elseif($loan->payment_due == 1)
                                &nbsp;&nbsp;&nbsp; quarterly
                            @else
                                &nbsp;&nbsp;&nbsp; annually
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="label label-purple">Current Loan Balance : </label>
                            &nbsp;&nbsp;&nbsp;$ {{$loan->loan_balance}}
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="card-title" id="4">Property Purchase Information</h4>
                        <br>
                    </div>
                    @if($property->purchase_info)
                        <?php $purchase = json_decode($property->purchase_info); ?>
                        <div class="col-md-3">
                            <label class="label label-megna">Purchase Price $: </label>
                            &nbsp;&nbsp;&nbsp;$ {{$purchase->purchase_price}}
                        </div>
                            <div class="col-md-3">
                                <label class="label label-megna">Start Date : </label>
                                &nbsp;&nbsp;&nbsp; {{$purchase->purchase_st_date}}
                            </div>
                            <div class="col-md-3">
                                <label class="label label-megna">Down Payment $: </label>
                                &nbsp;&nbsp;&nbsp;$ {{$purchase->purchase_d_payment}}
                            </div>
                            <div class="col-md-3">
                                <label class="label label-megna">Depreciable Years : </label>
                                &nbsp;&nbsp;&nbsp;$ {{$purchase->purchase_d_years}}
                            </div>
                            <div class="col-md-3">
                                <label class="label label-megna">Annual Depreciation : </label>
                                &nbsp;&nbsp;&nbsp;$ {{$purchase->purchase_a_dep}}
                            </div>
                            <div class="col-md-3">
                                <label class="label label-megna">Land Value $: </label>
                                &nbsp;&nbsp;&nbsp;$ {{$purchase->purchase_land_value}}
                            </div>
                            <div class="col-md-12">
                                <label class="label label-megna">Details : </label>
                                <br>
                                &nbsp;&nbsp;&nbsp; {{$purchase->purchase_details}}
                            </div>
                            <div class="col-md-12">
                                <label class="label label-megna">Documents : </label>
                                @if($property->purchase_documents)
                                    @foreach($property->purchase_documents as $document)
                                        &nbsp;&nbsp;
                                        <a href="{{asset('storage/uploads/purchase/')}}/{{$document}}" download>{{$document}}</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                @endif
                            </div>


                    @endif
                </div>
            </div>
        </div>




</div>
    <script>


    </script>

@stop