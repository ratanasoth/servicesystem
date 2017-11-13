@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Task Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/task/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/task/edit/'.$task_list->id)}}" class="text-danger"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/task')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group row">
                               <label for="name" class="control-label col-sm-4 lb">ID</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$task_list->id}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="title" class="control-label col-sm-4 lb">Title</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$task_list->title}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                                    <label for="severity" class="control-label col-sm-4 lb">Severity</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$task_list->severity}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deadline" class="control-label col-sm-4 lb">Deadline</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{$task_list->deadline}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="handler" class="control-label col-sm-4 lb">Handler</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$task_list->handler}}" readonly="true">
                                    </div>
                                </div>
                           <div class="form-group row">
                               <label for="description" class="control-label col-sm-4 lb">Description</label>
                               <div class="col-sm-8">
                                  <textarea name="description" id="description" readonly="true" class="form-control" rows="10">{{$task_list->description}}</textarea>
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
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#task").addClass("current");
        })
    </script>

@endsection