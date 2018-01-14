@extends('layouts.customer')
@section('content')
<div class="row">
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
                            <form action="{{url('/customer/product')}}" class="form-horizontal" method="get">
                                    <div class="input-group"  style="margin-top: -9px;margin-bottom:3px">
                                        <input type="text" class="form-control" placeholder="Search for..." name="q" value="{{$q}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-bg" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                            </form>
                       </div>
                   </div>
               
                </div>
                <div class="">
                    <br/>
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
                                <td>${{$p->price}}</td>
                                <td>
                                    <a href="{{url('/customer/product/detail/'.$p->id)}}" class="btn btn-bg">View</a>
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

@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_product").addClass("active");
    });
</script>
@endsection