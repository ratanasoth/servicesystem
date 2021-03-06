@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create Company</strong>&nbsp;&nbsp;
                    <a href="{{url('/company')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

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
                    <form action="{{url('/company/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return confirm('You want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="code" class="control-label col-sm-3 lb">code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('code')}}" name="code" id="code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-3 lb">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('email')}}" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="control-label col-sm-3 lb">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('phone')}}" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="control-label col-sm-3 lb">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('address')}}" id="address" name="address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tax_code" class="control-label col-sm-3 lb">Tax Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('tax_no')}}" id="tax_code" name="tax_code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-3 lb">Description</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="form-group row">
                                        <label for="logo" class="control-label col-sm-3 lb">Logo</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="logo" name="logo" onchange="loadFile(event)">
                                            <br>
                                            <img src="{{asset("uploads/companies/default.png")}}" alt="Logo" width="120" id="preview">
                                            <p>
                                                <br>
                                                <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                                <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                            </p>
                                        </div>
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
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#company").addClass("current");
        })
    </script>

@endsection