
@extends('layouts/default')
@section('content')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contact us</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Contac us</li>
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
                    <h4 class="m-b-0 text-white">We're here to help you.</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">User Name</label>
                                        <input type="text" id="userName" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">User Email</label>
                                        <input type="email" id="userEmail" class="form-control form-control" placeholder="Enter Your Email Address">
                                    </div>
                                <!--/span-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input type="text" id="subject" class="form-control form-control" >
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Your Message</label>
                                        <textarea id="message" class="form-control form-control" style="height: 150px"></textarea>
                                    </div>
                                    <!--/span-->
                                </div>

                            </div>
                        </div>

                        <div class="form-actions" style="text-align: center">
                            <button type="submit" class="btn btn-success" onclick="changePersonal()"> <i class="fa fa-check"></i> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop