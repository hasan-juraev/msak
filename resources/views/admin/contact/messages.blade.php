@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Messages </h4><br><br>
                       

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th> Name </th>
                                <th> Email </th>                              
                                <th> Phone </th>
                                <th> Message </th>
                                <th> Date </th>
                                <th> Action</th>
                             
                                
                            </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($messages as $message)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <td> {{ $message->name }} </td>
                                <td> {{ $message->email }} </td>    
                                <td> {{ $message->phone }} </td>    
                                <td> <a href="{{route('contact.messages.view', $message->id)}}">Read</a></td>    
                                                          
                                <td> {{ $message->created_at->diffForHumans() }} </td>
                              
                                <td>                                  
                                    <a class="btn btn-danger sm" href=" {{ route('delete.message', $message->id) }}" title="delete" id="delete"> <i class="fas fa-trash"> </i> </a>
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