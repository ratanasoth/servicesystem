@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Feedback Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/feedback')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                    <a href="{{url('/feedback/delete/'.$feedback->id)}}" class="text-danger" onclick="return confirm('You want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-9">
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Feedback ID</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->id}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Subject</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->subject}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Feedback To</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->feedback_to}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Feedback By</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->first_name}} {{$feedback->last_name}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Feedback Date</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->create_at}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="control-label lb col-sm-2">Description</label>
                               <div class="col-sm-9">
                                   : <strong>{{$feedback->description}}</strong>
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
            $("#menu_feedback").addClass("current");
        })
    </script>
@endsection