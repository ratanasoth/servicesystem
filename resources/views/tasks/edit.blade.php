@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Task</strong>&nbsp;&nbsp;
                    <a href="{{url('/task/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/task')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/task/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to change?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="title" class="control-label col-sm-4 lb">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$task_list->title}}" name="title" id="title" required="true">
                                        <input type="hidden" name="id" value="{{$task_list->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="severity" class="control-label col-sm-4 lb">Severity<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$task_list->severity}}" name="severity" id="severity" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deadline" class="control-label col-sm-4 lb">Deadline<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{$task_list->deadline}}" name="deadline" id="deadline" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="handler" class="control-label col-sm-4 lb">Handler</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$task_list->handler}}" name="handler" id="handler">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-4 lb">Description<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea id="description" name="description" class="form-control" rows="10" required="true">{{$task_list->description}}</textarea>
                                         <p>
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                            <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset("chosen/chosen.jquery.js")}}"></script>
    <script src="{{asset("chosen/chosen.proto.js")}}"></script>
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#task").addClass("current");
        });
    </script>

@endsection