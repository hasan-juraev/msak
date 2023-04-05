 @extends('admin.admin_master')
@section('admin')
<!-- page-content -->
<div class="page-content">
    <!-- div container-fluid -->
    <div class="container-fluid">
        <!-- div row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <!-- profile image -->
                    <center><br>
                        <img class="card-img-top img-fluid rounded-circle avatar-xl" src="{{
                            (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image): url('upload/no-image.jpg') }}" alt="image">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">User Email: {{ $adminData->email }}</h4>
                        <hr>
                        <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-info">Edit Profile</a>
                        
                        
                    </div>
                </div>
            </div>          

        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content -->

@endsection
