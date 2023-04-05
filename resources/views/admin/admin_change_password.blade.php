@extends('admin.admin_master')
@section('admin')
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- page-content -->
<div class="page-content">
    <!-- div container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Change Password Page</h4>    
                    <hr>
                    <br>
                    
                    <!-- check if there is any error -->
                    @if(count($errors))
                        @foreach($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissable fade show"> {{ $error }}</p>
                        @endforeach

                    @endif

                    <form method="POST" action="{{ route('update.password') }}" >
                        @csrf
                        <!-- old password -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                            <div class="col-sm-10">
                                <input name="oldpassword" class="form-control" type="password" value="" id="oldpassword">
                            </div>
                        </div>

                        <!-- new password -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                            <div class="col-sm-10">
                                <input name="newpassword" class="form-control" type="password" value="" id="newpassword">
                            </div>
                        </div>

                        <!-- confim password -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm password</label>
                            <div class="col-sm-10">
                                <input name="confirmpassword" class="form-control" type="password" value="" id="confirmpassword">
                            </div>
                        </div>

                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                      

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
        </div>

    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content -->

@endsection