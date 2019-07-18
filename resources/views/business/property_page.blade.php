
@extends('layouts/default')
@section('content')
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">

    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Property Watch List</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Property Watch List Page</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Properties</h4>
                    <ul class="list-unstyled">
                        @foreach($properties as $property)
                        <li class="media">
                            @if(count($property->files) > 0)
                            <img class="d-flex mr-3" src="storage/uploads/property/{{$property->files[0]}}" width="60" alt="Generic placeholder image">
                            @endif
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{$property->property_name}}<br><br><span class="badge badge-pill badge-primary text-white ml-auto">{{$property->address}}</span>&nbsp;&nbsp;&nbsp;<i class="mdi mdi-bank"></i>&nbsp;<span class="badge badge-pill badge-info
                                 text-white ml-auto">{{$property->beds}}+ Bedrooms</span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-seat-legroom-extra"></i>&nbsp;<span class="badge badge-pill badge-warning text-white ml-auto">{{$property->baths}}+ Bathrooms</span>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="badge badge-pill badge-danger text-white ml-auto">for rent</span>
                                </h5> <br><div>{{$property->description}}</div>
                                <br>
                                <div style="float: right">
                                    <a href="/search?property_id={{$property->id}}"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-search"></i> Search</button></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-sm btn-success" onclick="onEdit({{$property->id}})"><i class="fa fa-edit"></i> Edit</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="onDelete({{$property->id}})"><i class="fa fa-trash"></i> Delete</button>
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
        function onDelete(id) {
            if(confirm("really you want to remove this property ?")){
                document.location.href = "/property-remove?property_id="+id;
            }
        }
        function onEdit(id) {
            document.location.href = "/property-edit?property_id="+id;
        }


    </script>

@stop