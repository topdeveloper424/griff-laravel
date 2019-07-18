
@extends('layouts/default')
@section('content')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Settings Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                    <h4 class="m-b-0 text-white">User Settings</h4>
                </div>
                <div class="card-body">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">User Name</label>
                                        <input type="text" id="userName" class="form-control" value="{{$username}}" placeholder="user name">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">User Email</label>
                                        <input type="email" id="userEmail" class="form-control form-control" value="{{$useremail}}" placeholder="example@com">
                                    </div>
                                <!--/span-->
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" onclick="changePersonal()"> <i class="fa fa-check"></i> Change</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="m-b-0 text-white">Change Your Password</h4>
                </div>
                <div class="card-body">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" id="currentPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Hint:
                                    Be careful. After you change the password, the password is automatically applied.

                                    If you don't have a current password you can sign out and reset your password at sign in page.
                                </div>

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" id="newPassword" class="form-control form-control">
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Confirm New Password</label>
                                        <input type="password" id="confirmPassword" class="form-control form-control">
                                    </div>
                                    <!--/span-->
                                </div>


                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" onclick="changePassword()"> <i class="fa fa-check"></i> Change</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function changePersonal() {

            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            if(userEmail.indexOf("@") == -1 || userEmail.indexOf(".") == -1){
                alert("Put Correct Email address !");
                return;

            }
            if (userName == "" || userEmail == ""){
                alert("Put User Name and Email !");
                return;
            }

            $.post("/change-personal",{
                _token:'{{csrf_token()}}',
                username:userName,
                email:userEmail,
            }).done(
                function (data) {
                    if(data == "success"){
                        swal("Success !", "Successfully changed !", "success")
                    }else if(data == "error"){
                        swal("Cancelled", "database error !", "error");
                    }
                }
            );
        }

        function changePassword() {
            var currentPassword = $("#currentPassword").val();
            var newPassword = $("#newPassword").val();
            var confirmPassword = $("#confirmPassword").val();
            if(newPassword != confirmPassword){
                swal("Cancelled", "Password doesn't match !", "error");
                $("#newPassword").val("");
                $("#confirmPassword").val("");
                return;
            }
            $.post("/change-password",{
                _token:'{{csrf_token()}}',
                currentPass:currentPassword,
                newPass:newPassword,
            }).done(
                function (data) {
                    if(data == "success"){
                        swal("Success !", "Successfully changed !", "success")
                    }else if(data == "failed"){
                        swal("Cancelled", "Password is incorrect !", "error");
                    }else if(data == "error"){
                        swal("Cancelled", "database error !", "error");
                    }
                }
            );


        }
    </script>

@stop