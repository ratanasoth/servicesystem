@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Task Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/task/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/task/edit/'.$task->id)}}" class="text-danger"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/task')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group row">
                               <label for="name" class="control-label col-sm-4 lb">Task ID</label>
                               <div class="col-sm-8">
                                   : <strong>{{$task->id}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="title" class="control-label col-sm-4 lb">Title</label>
                               <div class="col-sm-8">
                                   : <strong>{{$task->title}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                                <label for="severity" class="control-label col-sm-4 lb">Severity</label>
                                <div class="col-sm-8">
                                    : <strong>{{$task->severity}}</strong>
                                </div>
                           </div>
                            <div class="form-group row">
                                <label for="deadline" class="control-label col-sm-4 lb">Deadline</label>
                                <div class="col-sm-8">
                                    : <strong>{{$task->deadline}}</strong>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="handler" class="control-label col-sm-4 lb">Handle Person</label>
                                    <div class="col-sm-8">
                                        : <strong>{{$task->fname}} {{$task->lname}}</strong>
                                    </div>
                                </div>
                           <div class="form-group row">
                               <label for="customer" class="control-label col-sm-4 lb">Customer</label>
                               <div class="col-sm-8">
                                   : <strong>{{$task->first_name}} {{$task->last_name}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="progression" class="control-label col-sm-4 lb">Progression</label>
                               <div class="col-sm-8">
                                   : <strong>{{$task->progression}}%</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="description" class="control-label col-sm-4 lb">Description</label>
                               <div class="col-sm-8">
                                   : <strong>{{$task->description}}</strong>
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
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#task").addClass("current");
        })
    </script>

@endsection