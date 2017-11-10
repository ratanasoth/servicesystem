@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Product</strong>&nbsp;&nbsp;
                    <a href="{{url('/product/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/product')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
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
                    <form action="{{url('/product/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to change?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$product_list->productname}}" name="name" id="name" required="true">
                                        <input type="hidden" name="id" value="{{$product_list->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-3 lb">Category<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="category" id="category" class="form-control" required="true">
                                            @foreach($categories as $cate)
                                                <?php
                                                    if($cate->id==$product_list->category_id){
                                                        $selected ="selected";
                                                    }else{
                                                        $selected="";
                                                    }
                                                ?>  
                                                <option value="{{$cate->id}}" {{$selected}}>{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="control-label col-sm-3 lb">Price<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$product_list->price}}" name="price" id="price" required="true" step=".001">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cost" class="control-label col-sm-3 lb">Cost<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$product_list->cost}}" name="cost" id="cost" required="true" step=".001">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="control-label col-sm-3 lb">Quantity<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$product_list->quantity}}" name="quantity" id="quantity" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tax" class="control-label col-sm-3 lb">Tax(%)</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$product_list->tax}}" name="tax" id="tax" step=".01">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Description</label>
                                    <div class="col-sm-8">
                                        <textarea id="description" name="description" class="form-control">{{$product_list->description}}</textarea>
                                         <p>
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                            <button class="btn btn-danger btn-flat" type="reset" onclick="location.reload()">Cancel</button>
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
            $("#product").addClass("current");
            
        })
    </script>

@endsection