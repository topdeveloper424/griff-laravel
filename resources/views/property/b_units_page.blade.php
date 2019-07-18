
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Units Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Units</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="card-title">Units</h3>
                        </div>
                        <div class="col-md-2">
                            {{count($properties)}} Total
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <a href="{{route('add-b-property')}}">
                                <button type="button" class="btn btn-rounded btn-block btn-danger"> + Add Property</button>
                            </a>
                        </div>
                    </div>
                    <ul class="list-unstyled mt-4">
                        @foreach($properties as $property)
                        <li class="media">
                            @if($property->files)
                            <img class="d-flex mr-3" src="storage/uploads/b-property/{{$property->files}}" width="120" alt="Generic placeholder image">
                            @endif
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mt-0 mb-1">{{$property->name}}</h5>
                                        <br>
                                        <span class="badge badge-pill badge-cyan ml-auto">{{$property->address}}</span>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-12">

                                    @if($property->property_type == false)
                                        <?php $idx = 0; ?>
                                        <?php $units = json_decode($property->units);
                                        $num = count($units);
                                        ?>
                                        @foreach($units as $unit)
                                            <div class="row">
                                        <div class="col-md-3">
                                            <hr style="border-color: white">

                                        </div>
                                        <div class="col-md-9">
                                            <h2>
                                                <span class="badge badge-pill badge-danger ml-auto">Unit {{$unit->unit_no}}</span>

                                            </h2>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-6">
                                            <span class="badge badge-pill badge-primary ml-auto">{{$unit->unit_type}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$unit->unit_beds}} beds</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$unit->unit_baths}} baths</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$unit->unit_size}} SQ.FT</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">$ {{$unit->unit_rent}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">$ {{$unit->unit_deposit}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                                <div class="col-md-3">
                                                    <a href="/edit-b-unit?property_id={{$property->id}}&idx={{$idx}}"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-sm btn-secondary" @if($num == 1) disabled @endif onclick="onDelete({{$property->id}},{{$idx}})"><i class="fa fa-trash"></i> Delete</button>

                                                </div>

                                        </div>
                                            <br>
                                            <?php $idx ++; ?>
                                            @endforeach
                                    @else
                                        <div class="row">

                                        <div class="col-md-3">
                                            <hr style="border-color: white">
                                        </div>
                                        <div class="col-md-9">
                                            <h2>
                                                <span class="badge badge-pill badge-danger ml-auto">SINGLE - FAMILY</span>
                                            </h2>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="badge badge-pill badge-primary ml-auto">{{$property->beds}} beds</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$property->baths}} baths</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$property->size}} SQ.FT</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">{{$property->parking}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">$ {{$property->market_rent}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-primary ml-auto">$ {{$property->deposit}}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                            <div class="col-md-3">
                                                <a href="/edit-b-unit?property_id={{$property->id}}"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                                &nbsp;&nbsp;&nbsp;
                                            </div>

                                        </div>


                                    @endif

                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                            {{$properties->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function onDelete(id,idx) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this unit anymore !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, remove this!",
                closeOnConfirm: false
            }, function(){
                document.location.href = "/remove-b-unit?property_id="+id+"&idx="+idx;
            });
        }

    </script>

@stop