@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Product List</strong>&nbsp;&nbsp;
                    <a href="{{url('/product/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                            <th>Tax(%)</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 12 * ($pagex - 1) + 1;
                        ?>
                         @foreach($product_list as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->productname}}</td>
                                <td>{{$product->categoryname}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->cost}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->tax}} %</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <a href="{{url('/product/detail/'.$product->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/product/edit/'.$product->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/product/delete/'.$product->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$product_list->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#product").addClass("current");
        })
    </script>
@endsection