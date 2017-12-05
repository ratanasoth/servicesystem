@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create Warehouse</strong>&nbsp;&nbsp;
                    <a href="{{url('/warehouse')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
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
                    <form action="{{url('/warehouse/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4 lb">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$warehouse->name}}" name="name" id="name" required>
                                        <input type="hidden" value="{{$warehouse->id}}" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="control-label col-sm-4 lb">Address</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="address" name="address" value="{{$warehouse->address}}">
                                         <p>
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                            <button class="btn btn-danger btn-flat" type="button" id="btnCancel">Cancel</button>
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
            $("#menu_warehouse").addClass("current");
            $("#btnCancel").click(function(){
                location.href = burl + "/warehouse/edit/{{$warehouse->id}}" ;
            });
        })
    </script>
@endsection