@extends('layouts.customer')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Product Detail</strong>
                    <a href="{{url('/customer/product')}}" class='text-success'><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group row">
                               <label class="control-label col-sm-4">Product ID</label>
                               <div class="col-sm-8">
                                    : <strong>{{$product->id}}</strong>
                               </div>
                           </div>
                           <div class="form-group row">
                                <label class="control-label col-sm-4">Product Name</label>
                                <div class="col-sm-8">
                                     : <strong>{{$product->name}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Price</label>
                                <div class="col-sm-8">
                                        : <strong>$ {{$product->price}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Description</label>
                                <div class="col-sm-8">
                                        : <strong>{{$product->description}}</strong>
                                </div>
                            </div>
                       </div>
                       <div class="col-sm-6">
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Type</label>
                                <div class="col-sm-8">
                                        : <strong>{{$product->type}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Category</label>
                                <div class="col-sm-8">
                                        : <strong>{{$product->category_name}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Tax</label>
                                <div class="col-sm-8">
                                        : <strong>{{$product->tax}} %</strong>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_product").addClass("active");
    });
</script>
@endsection