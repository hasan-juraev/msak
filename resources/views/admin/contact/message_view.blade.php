@extends('admin.admin_master')
@section('admin')

@php

    $homeslide = App\Models\HomeSlide::find($messagesview->id);

@endphp
<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Messages </h4><br><br>
                        {{ $messagesview->message }} 
                                                          
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
</div>
</div>
@endsection