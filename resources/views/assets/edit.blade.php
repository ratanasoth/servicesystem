@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Asset</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/asset')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

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
                    <form action="{{url('/asset/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <input type="hidden" value="{{$assets->id}}" name="id">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb"> Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$assets->name}}" name="name" id="name" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reference" class="control-label col-sm-3 lb"> Reference Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$assets->reference_code}}" name="reference" id="reference">
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label for="type" class="control-label col-sm-3 lb">Asset Type<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="type" id="type" class="form-control" required="true">
                                            <option value="">--Please Select--</option>
                                            @foreach($asset_types as $asset_type)
                                                <option {{$assets->type_id==$asset_type->id?'selected':''}} value="{{$asset_type->id}}">{{$asset_type->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="warehouse" class="control-label col-sm-3 lb">Warehouse<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="warehouse" id="warehouse" class="form-control" required="true">
                                            <option value="">--Please Select--</option>
                                            @foreach($warehouses as $warehouse)
                                                <option {{$assets->type_id==$warehouse->id?'selected':''}} value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total" class="control-label col-sm-3 lb">Total Qty</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$assets->total}}" name="total" id="total">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="onhand" class="control-label col-sm-3 lb">On Hand</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$assets->onhand}}" name="onhand" id="onhand">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-3 lb">Description</label>
                                    <div class="col-sm-8">
                                         <textarea class="form-control" name="description" id="description">{{$assets->description}}</textarea>
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
            $("#menu_asset").addClass("current");
        })
    </script>

@endsection