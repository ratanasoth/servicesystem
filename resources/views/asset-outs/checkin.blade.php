@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Asset check in</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset-out')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

                </div>
                <div class="card-block">
                    <form action="{{url('/asset-out/savein')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to return?')">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$asset_out->id}}" name="id">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-primary">Asset Checkout Info</p>
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

                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <p>&nbsp;</p>
                                <div class="form-group row">
                                    <label for="rr" class="control-label col-sm-3 lb">Returned Qty</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly value="{{$asset_out->return_qty}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rr" class="control-label col-sm-3 lb">Due Qty</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly value="{{$asset_out->due_qty}}">
                                    </div>
                                </div>
                                <br>
                                <p class="text-primary">Asset Check In</p>
                                <hr>
                                <div class="form-group row">
                                    <label for="return_qty" class="control-label col-sm-3 lb">Return Qty</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="return_qty" name="return_qty">
                                        <input type="hidden" name="checkout_id" value="{{$asset_out->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comment" class="control-label col-sm-3 lb">Comment</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="comment" name="comment">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 lb">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <br>
                                        <button class="btn btn-primary btn-flat" type="submit">Submit Return</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p class="text-primary">Check In History</p>
                        <table class="tbl">
                            <thead>
                                <tr>
                                    <th>&numero;</th>
                                    <th>Check In Date</th>
                                    <th>Check In By</th>
                                    <th>Quantity</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($ins as $in)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$in->in_date}}</td>
                                    <td>{{$in->first_name}} {{$in->last_name}}</td>
                                    <td>{{$in->quantity}}</td>
                                    <td>{{$in->comment}}</td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
