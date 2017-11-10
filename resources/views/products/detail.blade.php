@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Product Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/product/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/product/edit/'.$product_list->id)}}" class="text-danger"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/product')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group row">
                               <label for="name" class="control-label col-sm-3 lb">ID</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$product_list->id}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="name" class="control-label col-sm-3 lb">Name</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$product_list->productname}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="Category" class="control-label col-sm-3 lb">Category</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$product_list->categoryname}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="price" class="control-label col-sm-3 lb">Price</label>
                               <div class="col-sm-8">
                                   <input type="number" class="form-control" value="{{$product_list->price}}" readonly step=".001">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="cost" class="control-label col-sm-3 lb">Cost</label>
                               <div class="col-sm-8">
                                   <input type="number" class="form-control" value="{{$product_list->cost}}" readonly step=".001">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="quantity" class="control-label col-sm-3 lb">Quantity</label>
                               <div class="col-sm-8">
                                   <input type="number" class="form-control" value="{{$product_list->quantity}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="tax" class="control-label col-sm-3 lb">Tax</label>
                               <div class="col-sm-8">
                                   <input type="number" class="form-control" value="{{$product_list->tax}}" readonly step=".001">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="name" class="control-label col-sm-3 lb">Description</label>
                               <div class="col-sm-8">
                                  <textarea name="description" id="description" readonly="true" class="form-control">{{$product_list->description}}</textarea>
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
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#product").addClass("current");
        })
    </script>

@endsection