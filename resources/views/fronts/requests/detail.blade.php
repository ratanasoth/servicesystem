@extends('layouts.customer')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Request Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/customer/request')}}" class='text-success'><i class="fa fa-arrow-left"></i> Back</a>
                    <a href="{{url('/customer/request/delete/'.$request->id)}}" class="text-danger" onclick="return confirm('You want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                    <a href="{{url('/customer/request/edit/'.$request->id)}}" class="text-success"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/customer/request/create')}}" class="text-primary"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-9">
                           <div class="form-group row">
                               <label class="control-label col-sm-3">Request ID</label>
                               <div class="col-sm-8">
                                    : <strong>{{$request->id}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                                <label class="control-label col-sm-3">Subject</label>
                                <div class="col-sm-8">
                                     : <strong>{{$request->subject}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3">Request Date</label>
                                <div class="col-sm-8">
                                        : <strong>{{$request->request_date}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3">Description</label>
                                <div class="col-sm-8">
                                        : <strong>{{$request->description}}</strong>
                                </div>
                            </div>
                       </div>
                      
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_request").addClass("active");
    });
</script>
@endsection