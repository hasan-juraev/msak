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

                    <h4 class="card-title"> Edit Blog Page </h4>  <br>  
                    <!-- id of blog category is passed to route itself -->
                    <form method="POST" action="{{ route('update.blog.category', $edit_blog_categories->id) }}" >
                        @csrf                      

                        <!-- name -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <input name="blog_category" class="form-control" type="text" value="{{ $edit_blog_categories->blog_category }}" id="title">
                             
                            </div>
                        </div>
                        <!-- end row -->                       
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Category">

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