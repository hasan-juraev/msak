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

                    <h4 class="card-title">Home About Page</h4>    
                    <form method="POST" action="{{ route('update.about')}}" enctype="multipart/form-data">
                        @csrf

                        <!-- id of image -->
                        <input type="hidden" name="id" value="{{ $about->id }}">

                        <!-- title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" class="form-control" type="text" value="{{ $about->title }}" id="title">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- short_title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input name="short_title" class="form-control" type="text" value="{{ $about->short_title }}" id="short_title">
                            </div>
                        </div>
                        <!-- end row -->                       

                        <!-- Long description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Long description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="long_description" id="elm1"> {{ $about->long_description }}</textarea>
                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Services Title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Services Title</label>
                            <div class="col-sm-10">
                                <input name="" value="" class="form-control" type="text" id="services_title">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Services Description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Services Description</label>
                            <div class="col-sm-10">
                                <input name="" value="" class="form-control" type="text" id="services_description">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Short card story title< -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short card story title</label>
                            <div class="col-sm-10">
                                <input name="" value="" class="form-control" type="text" id="short_card_story_title">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Short card social title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short card social title</label>
                            <div class="col-sm-10">
                                <input name="" value="" class="form-control" type="text" id="short_card_social_title">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Short card work title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short card work title</label>
                            <div class="col-sm-10">
                                <input name="" value="" class="form-control" type="text" id="short_card_work_title">
                            </div>
                        </div>
                        <!-- end row -->                        

                         <!-- home_slide Image Upload -->
                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide Image</label>
                            <div class="col-sm-10">
                                <input name="about_me_image" class="form-control" type="file" value="{{ $about->about_me_image }}" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- home_slide image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{
                            (!empty($about->about_me_image))? url('upload/home_slide/'.$about->about_me_image): url('upload/no-image.jpg') }}" alt="image">
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
        </div>

    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content -->

<script type="text/javascript">
    $(document).ready(function() {

        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                
                $('#showImage').attr('src', e.target.result);
                
            }
            reader.readAsDataURL(e.target.files['0']);
            
        });

    });

</script>

@endsection