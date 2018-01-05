@extends("layouts.customer")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Detail Feedback</strong>&nbsp;&nbsp;&nbsp;
                    <a href="{{url('/customer/feedback')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                    <a href="{{url('/customer/feedback/delete/'.$feedback->id)}}" class="text-danger" onclick="return confirm('You want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                    <a href="#" class="text-success" onclick="editFeedback(event)"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/customer/feedback/create')}}" class="text-primary"><i class="fa fa-plus"></i> New</a>

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
                    <form action="{{url('/customer/feedback/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="subject" class="control-label col-sm-3 lb">Subject <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$feedback->subject}}" name="subject" id="subject" required="true" disabled>
                                        <input type="hidden" name="id" value="{{$feedback->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="feedback_to" class="control-label col-sm-3 lb">Feedback To <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="feedback_to" id="feedback_to" class="form-control" disabled>
                                            <option value="Salesperson" {{$feedback->feedback_to=='Salesperson'?'selected':''}}>Salesperson</option>
                                            <option value="Supporter" {{$feedback->feedback_to=='Supporter'?'selected':''}}>Supporter</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-3 lb">Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea id="description" name="description" class="form-control" rows="10" required disabled="disabled">{{$feedback->description}}</textarea>
                                        <p id="sp" class="hide">
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                            <button class="btn btn-danger btn-flat" type="button" onclick="cancelEdit()">Cancel</button>
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
    <script>
        $(document).ready(function(){
            $(".mn .nav-item").removeClass('active');
            $("#menu_feedback").addClass("active");
        });
        function editFeedback(evt) {
            evt.preventDefault();
            $("input, textarea, select").removeAttr("disabled");
            $("#sp").removeClass('hide');
        }
        function cancelEdit() {
            $("input, textarea, select").attr("disabled", 'disabled');
            $("#sp").addClass('hide');
        }
    </script>
@endsection