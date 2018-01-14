@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Asset check out detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset-out')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

                </div>
                <div class="card-block">
                    <form action="#" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$asset_out->id}}" name="id">
                        <div class="row">
                            <div class="col-sm-6">
                                
                                <div class="form-group row">
                                    <label for="asset" class="control-label col-sm-3 lb"> Asset<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="asset" id="asset" class="form-control" disabled>
                                        @foreach($assets as $asset)
                                            <option value="{{$asset->id}}" {{$asset_out->asset_id==$asset->id?'selected':''}}>{{$asset->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="control-label col-sm-3 lb">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$asset_out->quantity}}" name="quantity" id="quantity" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="out_date" class="control-label col-sm-3 lb">Out Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="out_date" id="out_date" value="{{$asset_out->out_date}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="return_date" class="control-label col-sm-3 lb">Return Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="return_date" id="return_date" value="{{$asset_out->return_date}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="out_by" class="control-label col-sm-3 lb">Check Out By</label>
                                    <div class="col-sm-8">
                                        <select name="out_by" id="out_by" class="form-control" disabled>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$asset_out->out_by==$user->id?'selected':''}}>{{$user->username}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reason" class="control-label col-sm-3 lb">Reason</label>
                                    <div class="col-sm-8">
                                         <textarea class="form-control" name="reason" id="reason" readonly>{{$asset_out->reason}}</textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="is_returned" class="control-label col-sm-3 lb">Return Status</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="is_returned" id="is_returned" value="{{$asset_out->is_returned}}" readonly>
                                        <br>
                                        <a href="{{url('/asset-out/checkin/'.$asset_out->id)}}" class="btn btn-primary btn-flat">Check In</a>
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
            $("#menu_asset_out").addClass("current");
            
        })
    </script>

@endsection
