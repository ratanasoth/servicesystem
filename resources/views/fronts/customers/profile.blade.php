@extends('layouts.customer')
@section('content')
<div class="card">
        <div class="card-header">
            <strong>Your Profile</strong>&nbsp;&nbsp;
            <a href="#" class="text-success" onclick="editProfile(event)"><i class="fa fa-pencil"></i> Edit</a>
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
            <form action="{{url('/customer/saveprofile')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="first_name" class="control-label col-sm-4 lb">First Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->first_name}}" name="first_name" id="first_name" required="true" disabled>
                                <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="gender" class="control-label col-sm-4 lb">Gender</label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" class="form-control" disabled>
                                        <option value="Male" {{$customer->gender=='Male'?'selected':''}}>Male</option>
                                        <option value="Female" {{$customer->gender=='Female'?'selected':''}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="username" class="control-label col-sm-4 lb">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->username}}" name="username" id="username" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="control-label col-sm-4 lb">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" value="" name="password" id="password" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="control-label col-sm-4 lb">Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="company" name="company" value="{{$customer->company_name}}" disabled>
                                 <p id="sp" class="hide">
                                    <br>
                                    <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                    <button class="btn btn-danger btn-flat" type="button" onclick="cancelEdit()">Cancel</button>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="last_name" class="control-label col-sm-4 lb">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->last_name}}" name="last_name" id="last_name" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label col-sm-4 lb">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->email}}" name="email" id="email" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-sm-4 lb">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->phone}}" name="phone" id="phone" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-sm-4 lb">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$customer->address}}" name="address" id="address" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function editProfile(evt)
        {
            evt.preventDefault();
            $("input, select").removeAttr("disabled");
            $("#sp").removeClass("hide");
        }
        function cancelEdit()
        {
            $("input, select").attr("disabled", "disabled");
            $("#sp").addClass("hide");
        }
    </script>
@endsection