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

                    <h4 class="card-title"> Edit Footer Page </h4>  <br>  
                    <form method="POST" action="{{ route('update.footer') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $footer_info->id }}">

                       <!-- portfolio title -->
                       <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number </label>
                            <div class="col-sm-10">
                                <input name="phone_number" class="form-control" type="text" value="{{ $footer_info->phone_number }}" id="short_title">
                            
                            </div>
                        </div>
                        <!-- end row -->

                       <!-- Long description -->
                       <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Contact Us Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="contact_us_short_descr" id="elm1"> {{ $footer_info->contact_us_short_descr }} </textarea>                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- address country -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address Country</label>
                            <div class="col-sm-10">
                                <input name="address_country" class="form-control" type="text" value="{{ $footer_info->address_country }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- address-->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address </label>
                            <div class="col-sm-10">
                                <input name="address" class="form-control" type="text" value="{{ $footer_info->address }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- email-->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email </label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="text" value="{{ $footer_info->email }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- social connect short desctiption-->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description Social Connect </label>
                            <div class="col-sm-10">
                            <textarea name="social_connect_short_desc" class="form-control" > {{ $footer_info->social_connect_short_desc }} </textarea>
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- icon1 Facebook-->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Social Connect Icon 1 URL <i class="fab fa-facebook-f"></i></label>
                            <div class="col-sm-10">
                                
                                <input name="social_connect_icon_url1" class="form-control" type="text" value="{{ $footer_info->social_connect_icon_url1 }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- icon2 Twitter-->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Social Connect Icon 2 URL  <i class="fab fa-twitter"></i></label>
                            <div class="col-sm-10">
                               
                                <input name="social_connect_icon_url2" class="form-control" type="text" value="{{ $footer_info->social_connect_icon_url2 }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- icon3   Telegram -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Social Connect Icon 3 URL <i class="fab fa-telegram"></i> </label>
                            <div class="col-sm-10">
                              
                                <input name="social_connect_icon_url3" class="form-control" type="text" value="{{ $footer_info->social_connect_icon_url3 }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- icon4 Instagram -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Social Connect Icon 4 URL <i class="fab fa-instagram"></i></label>
                            <div class="col-sm-10">
                                
                                <input name="social_connect_icon_url4" class="form-control" type="text" value="{{ $footer_info->social_connect_icon_url4 }}" >
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer Data">

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