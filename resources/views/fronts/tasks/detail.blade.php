@extends('layouts.customer')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Task Detail</strong>
                            &nbsp;&nbsp;
                            <a href="{{url('/customer/task')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col-sm-5">

                        </div>
                    </div>

                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Task ID</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->id}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Task Title</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->title}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Severity</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->severity}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Deadline</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->deadline}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Handle Person</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->first_name}} {{$task->last_name}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Progression</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->progression}}%</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 lb">Description</label>
                        <div class="col-sm-7">
                            : <strong>{{$task->description}}</strong>
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
            $("#menu_task").addClass("active");
        });
    </script>
@endsection