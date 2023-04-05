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

                    <h4 class="card-title"> Edit Portfolio Page </h4>  <br>  
                    <form method="POST" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- hidden input -->
                        <input type="hidden" name="id" value="{{ $edit_portfolio->id }}">

                        <!-- portfolio name -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                                <input name="portfolio_name" class="form-control" type="text" value="{{ $edit_portfolio->portfolio_name }}" id="title">
                             
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- portfolio title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                            <div class="col-sm-10">
                                <input name="portfolio_title" class="form-control" type="text" value="{{ $edit_portfolio->portfolio_title }}" id="short_title">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- Long description -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="portfolio_description" id="elm1"> {{ $edit_portfolio->portfolio_name }} </textarea>                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!--Pportfolio Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                            <div class="col-sm-10">
                                <input name="portfolio_image" class="form-control" type="file" value="" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Portfolio image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{asset( $edit_portfolio->portfolio_image ) }}" alt="image">
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio">

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