@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Footer Data</h4><br>                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th> Phone Number </th>
                                <th> Email </th>                                    
                                <th> Icon 1 </th>                                
                                <th> Icon 2</th>                                
                                <th> Icon 3 </th>                                
                                <th> Icon 4 </th> 
                                <th> Action </th> 

                            </tr>

                            </thead>

                            <tbody>                           
                            <tr>                               
                                <td> {{ $info->phone_number }} </td>                              
                                <td> {{ $info->email }} </td>                               
                                <td> <a href="{{ url( $info->social_connect_icon_url1 ) }}"> <i class="fab fa-facebook-f"></i> </a></td>
                                <td> <a href="{{ url( $info->social_connect_icon_url2 ) }}"> <i class="fab fa-twitter"></i>  </a></td>
                                <td> <a href="{{ url( $info->social_connect_icon_url3 ) }}"> <i class="fab fa-telegram"></i> </a></td>
                                <td> <a href="{{ url( $info->social_connect_icon_url4 ) }}"> <i class="fab fa-instagram"></i> </a></td>
                            
                                <!-- action -->
                                <td>
                                    <a class="btn btn-info sm" href="{{ route('edit.footer', $info->id) }}" title="edit"> <i class="fas fa-edit"></i> </a>
                                    
                                </td>                              
                            </tr>
                                           
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
</div>
</div>

@endsection