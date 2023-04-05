@extends('admin.admin_master')
@section('admin')

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- page-content -->
<div class="page-content">

    <style type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        } 
    </style>
    <!-- div container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Blogs Page</h4>  <br>  
                    <form method="POST" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- blog name -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="blog_category_id"  aria-label="Default select example">
                                    <option selected="">Choose</option>
                                    @foreach($blogs_category as $item)
                                    <option value="{{ $item->id}}"> {{ $item->blog_category }} </option>
                                    @endforeach
                                    
                                </select>

                                @error('blog_category_id')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- portfolio title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input name="blog_title" class="form-control" type="text" value="" id="short_title">
                                @error('blog_title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- blog tags -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                            <div class="col-sm-10">
                                <input name="blog_tags" class="form-control" type="text" value="home, tech" data-role="tagsinput">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- blog description -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="blog_description" id="elm1"> </textarea>  
                                @error('blog_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
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
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ url('upload/no-image.jpg') }}" alt="image">
                                @error('blog_image')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                            </div>

                        
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Blog">

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