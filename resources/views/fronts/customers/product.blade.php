@extends('layouts.customer')
@section('content')
<div class="row">
<<<<<<< HEAD
    <div class="col-lg-3">
        <div class="list_category_div">
              
              <!-- List group -->
              <ul class="list-group">
                <li class="list-group-item list_category"><strong>Category</strong></li>
                <li class="list-group-item list_category "><a href="{{url('customer/product')}}" >All Categories</a></li>
                 @foreach($categories as $category)
                    <li class="list-group-item list_category "><a href="{{url('customer/product/category/'.$category->id)}}" >{{$category->name}}</a></li>
                  @endforeach
                
              </ul>
            </div>
         
    </div>
        <div class="col-lg-9">
            <div class="" >
                <div class="">
                   <div class="row">
                       
                       <div class="col-sm-5">
                            <br/>
                            <h5 class="title_head"><strong>Feature Products</strong></h5>
                       </div>
                       <div class="col-sm-6">
                            <br/>
=======
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                   <div class="row">
                       <div class="col-sm-4">
                            <strong>Product List</strong>
                  
                       </div>
                       <div class="col-sm-5">
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
                            <form action="{{url('/customer/product')}}" class="form-horizontal" method="get">
                                    <div class="input-group"  style="margin-top: -9px;margin-bottom:3px">
                                        <input type="text" class="form-control" placeholder="Search for..." name="q" value="{{$q}}">
                                        <span class="input-group-btn">
<<<<<<< HEAD
                                            <button class="btn btn-bg" type="submit"><i class="fa fa-search"></i></button>
=======
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
                                        </span>
                                    </div>
                            </form>
                       </div>
                   </div>
               
                </div>
<<<<<<< HEAD
                <div class="">
                    <br/>
=======
                <div class="card-block">
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 22 * ($pagex - 1) + 1;
                        ?>
                         @foreach($products as $p)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->type}}</td>
<<<<<<< HEAD
                                <td>${{$p->price}}</td>
                                <td>
                                    <a href="{{url('/customer/product/detail/'.$p->id)}}" class="btn btn-bg">View</a>
=======
                                <td>{{$p->price}}</td>
                                <td>
                                    <a href="{{url('/customer/product/detail/'.$p->id)}}" class="btn btn-success">View</a>
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$products->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

=======
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_product").addClass("active");
    });
</script>
@endsection