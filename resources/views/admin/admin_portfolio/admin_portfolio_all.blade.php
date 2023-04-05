@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Portfolio ALl Data</h4><br>                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th> Sl </th>
                                <th> Portfolio Name </th>
                                <th> Portfolio Title </th>
                                <th> Portfolio Image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($portfolio as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <td> {{ $item->portfolio_name }} </td>
                                <td> {{ $item->portfolio_title }} </td>
                                <td> <img src="{{ asset($item->portfolio_image) }}" alt="" style="width:50px; height:50px"> </td>                                
                                <td>
                                    <a class="btn btn-info sm" href=" {{ route('edit.portfolio', $item->id) }}" title="edit"> <i class="fas fa-edit"></i> </a>
                                    <a class="btn btn-danger sm" href=" {{ route('delete.portfolio', $item->id) }}" title="delete" id="delete"> <i class="fas fa-trash"> </i> </a>
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
