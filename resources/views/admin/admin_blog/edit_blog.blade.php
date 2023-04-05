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
                <style type="text/css">
                    .bootstrap-tagsinput .tag{
                        margin-right: 2px;
                        color: #b70000;
                        font-weight: 700px;
                    } 
                </style>

                    <h4 class="card-title"> Edit Blogs Page </h4>  <br>  
                    <form method="POST" action="{{ route('update.blog', $edit_blogs->id) }}" enctype="multipart/form-data">
                        @csrf                        

                        <!-- portfolio name -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="blog_category_id"  aria-label="Default select example">
                                    <option selected="">Choose</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"  {{ $cat-> id == $edit_blogs->blog_category_id ? 'selected' : '' }} >
                                        {{ $cat->blog_category }} 
                                    </option>
                                    @endforeach
                                    
                                </select>                             
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- portfolio title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input name="blog_title" class="form-control" type="text" value="{{ $edit_blogs->blog_title }}" id="short_title">
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- portfolio tags -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                            <div class="col-sm-10">
                                <input name="blog_tags" class="form-control" type="text" value="{{ $edit_blogs->blog_tags }}"  data-role="tagsinput">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- Long description -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="blog_description" id="elm1"> {{ $edit_blogs->blog_description }} </textarea>                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!--Pportfolio Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input name="blog_image" class="form-control" type="file" value="" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Portfolio image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ asset ($edit_blogs->blog_image) }}" alt="image">
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog">

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