@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Event</strong>&nbsp;&nbsp;
                    <a href="{{url('/event/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/event')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
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
                    <form action="{{url('/event/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to change?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4 lb">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$events_list->name}}" name="name" id="name" required="true">
                                        <input type="hidden" name="id" value="{{$events_list->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="control-label col-sm-4 lb">Location</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$events_list->location}}" name="location" id="location">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="event_date" class="control-label col-sm-4 lb">Event Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{$events_list->event_date}}" name="event_date" id="event_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-4 lb">Description</label>
                                    <div class="col-sm-8">
                                        <textarea id="description" name="description" class="form-control" rows="10">{{$events_list->description}}</textarea>
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
            $("#event").addClass("current");
        });
    </script>

@endsection