@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Blogs Data</h4><br>                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th> Sl </th>
                                <th> Blog Category </th>
                                <th> Blog Title </th>                               
                                <th> Blog Tags </th>                                
                                <th> Blog Image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($all_blogs as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <!-- relationship is made on this value -->
                                <td> {{ $item['category']['blog_category'] }} </td>
                                <td> {{ $item->blog_title }} </td>
                                <td> {{ $item->blog_tags }} </td>
                                <td> <img src="{{ asset($item->blog_image) }}" alt="" style="width:50px; height:50px"> </td>
                                <!-- action -->
                                <td>
                                    <a class="btn btn-info sm" href="{{ route('edit.blog', $item->id) }}" title="edit"> <i class="fas fa-edit"></i> </a>
                                    <a class="btn btn-danger sm" href="{{ route('delete.blog', $item->id) }}" title="delete" id="delete"> <i class="fas fa-trash"> </i> </a>
                                </td>
                              
                            </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
</div>
</div>

@endsection