@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Customer</strong>&nbsp;&nbsp;
                    <a href="{{url('/customer')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>&nbsp;&nbsp;
                    <a href="{{url('/customer/create')}}" class="text-info"><i class="fa fa-plus"></i> New</a>

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
                    <form action="{{url('/customer/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save changes?')">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$customer->id}}" name="id">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="first_name" class="control-label col-sm-3 lb">First Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$customer->first_name}}" name="first_name" id="first_name" required>
                                    </div>
                                </div>
                               
                               <div class="form-group row">
                                    <label for="last_name" class="control-label col-sm-3 lb">Last Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$customer->last_name}}" name="last_name" id="last_name" required>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="gender" class="control-label col-sm-3 lb">Gender<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male" {{$customer->gender=='Male'?'selected':''}}>Male</option>
                                            <option value="Female" {{$customer->gender=='Female'?'selected':''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-3 lb">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$customer->email}}" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="control-label col-sm-3 lb">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$customer->phone}}" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="control-label col-sm-3 lb">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$customer->address}}" name="address" id="address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company_name" class="control-label col-sm-3 lb">Company Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="company_name" name="company_name" class="form-control" value="{{$customer->company_name}}">
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
            $("#customer").addClass("current");
            
        })
    </script>

@endsection