@extends("layouts.front")
@section("content")
    <style>
        .text-center{
            text-align: left!important;
        }
    </style>
    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h3 class="text-uppercase">
                        <strong>CUSTOMER REGISTER</strong>
                    </h3>
                    <br><br>
                    <form action="{{url('/customer/register/save')}}" method="post">
                        {{csrf_field()}}
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
                        <div class="form-group row">
                            <label for="first_name" class="control-label col-sm-4">First Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" required value="{{old('first_name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="control-label col-sm-4">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                            </div>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="gender" class="control-label col-sm-4">Gender <span class="text-danger">*</span></label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<select name="gender" id="gender" class="form-control">--}}
                                    {{--<option value="Male">Male</option>--}}
                                    {{--<option value="Female">Female</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row">
                            <label for="phone" class="control-label col-sm-4">Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone" name="phone" required value="{{old('phone')}}">
                            </div>
                        </div>

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="control-label col-sm-4">Email</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<input type="text" class="form-control" id="email" name="email"  value="{{old('email')}}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row">
                            <label for="username" class="control-label col-sm-4">Username <spane class="text-danger">*</spane></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username"  value="{{old('username')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="control-label col-sm-4">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpassword" class="control-label col-sm-4">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4"></label>
                            <div class="col-sm-8">
                                <br>
                                <button class="btn btn-success" type="submit">Register Now</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </header>

@endsection