@extends('layouts.setting')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Edit User</strong>&nbsp;&nbsp;
                    <a href="{{url('/user')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12">
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
                    <form action="{{url('/user/update')}}" class="form-horizontal" enctype="multipart/form-data"
                          onsubmit="return confirm('You want to save changes?')" method="post" id="frm">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="first_name" class="control-label col-sm-4 lb">First Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                               required value="{{$user->first_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="last_name" class="control-label col-sm-4 lb">Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{$user->last_name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4 lb">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$user->username}}" required name="name" id="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="gender" class="control-label col-sm-4 lb">Gender</label>
                                    <div class="col-sm-8">
                                        <select name="gender" id="gender" class="form-control sl">
                                            <option value="Male" {{$user->gender=='Male'?'selected':''}}>Male</option>
                                            <option value="Female" {{$user->gender=='Female'?'selected':''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-4 lb">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="role" class="control-label col-sm-4 lb">Role</label>
                                    <div class="col-sm-8">
                                        <select name="role" id="role" class="form-control sl">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{$role->id==$user->role_id?'selected':''}}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="phone" class="control-label col-sm-4 lb">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="position" class="control-label col-sm-4 lb">Position </label>
                                    <div class="col-sm-8">
                                        <select name="position" id="position" class="form-control sl">
                                            @foreach($positions as $p)
                                                <option value="{{$p->name}}" {{$user->position==$p->name?'selected':''}}>{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="photo" class="control-label col-sm-4 lb">Photo</label>
                                    <div class="col-sm-8">
                                        <input type="file" value="" name="photo" id="photo" class="form-control" onchange="loadFile(event)">
                                        <br>
                                        <img src="{{asset('profile/'.$user->photo)}}" alt="" width="72" id="preview">
                                    </div>

                                </div>
                            </div>
                            <div class="col">

                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="control-label col-sm-2">&nbsp;</label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary btn-flat" type="submit">Save Changes</button>
                                <a href="{{url('/user')}}" class="btn btn-danger btn-flat" id="btnCancel">Cancel</a>
                            </div>
                        </div>
                    </form>
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
            $("#user").addClass("current");
        })
    </script>
@endsection
