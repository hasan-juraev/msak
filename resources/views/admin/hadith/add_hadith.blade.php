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

                    <h4 class="card-title">Hadith </h4>  <br>  
                    <form method="POST" action="{{ route('store.hadith') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Hadith Topic -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Hadith Topic</label>
                            <div class="col-sm-10">
                                <input name="topic" class="form-control" type="text" value="" id="short_title">
                                @error('topic')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Hadith narrator -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Hadith Narrator</label>
                            <div class="col-sm-10">
                                <input name="narrator" class="form-control" type="text" value="" id="short_title">
                                @error('narrator')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Hadith tags -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Hadith Tags</label>
                            <div class="col-sm-10">
                                <input name="hadith_tags" class="form-control" type="text" value="ramadan, charity" data-role="tagsinput">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- Hadith content -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Hadith Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" id="elm1"> </textarea>  
                                @error('content')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>                      
                        </div>
                        <!-- end row -->

                        <!-- Hadith reference -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Hadith Reference</label>
                            <div class="col-sm-10">
                                <input name="hadith_reference" class="form-control" type="text" value="" id="short_title">
                                @error('reference')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                      
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Hadith">

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
