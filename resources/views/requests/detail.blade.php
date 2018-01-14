@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Request Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/request')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                    <a href="{{url('/request/delete/'.$request->id)}}" class="text-danger" onclick="return confirm('You want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group row">
                                <label class="control-label lb col-sm-2">Request ID</label>
                                <div class="col-sm-9">
                                    : <strong>{{$request->id}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label lb col-sm-2">Subject</label>
                                <div class="col-sm-9">
                                    : <strong>{{$request->subject}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label lb col-sm-2">Request Date</label>
                                <div class="col-sm-9">
                                    : <strong>{{$request->request_date}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label lb col-sm-2">Request By</label>
                                <div class="col-sm-9">
                                    : <strong>{{$request->first_name}} {{$request->last_name}}</strong>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label lb col-sm-2">Description</label>
                                <div class="col-sm-9">
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
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#menu_request").addClass("current");
        })
    </script>
@endsection