@extends("layouts.asset")
@section("content")
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Asset Management</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Reference Code</th>
                            <th>Type</th>
                            <th>Warehouse</th>
                            <th>Balance Qty</th>
                            <th>Total Qty</th>
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
                         @foreach($assets as $asset)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$asset->name}}</td>
                                <td>{{$asset->reference_code}}</td>
                                <td>{{$asset->type_name}}</td>
                                <td>{{$asset->warehouse_name}}</td>
                                <td>{{$asset->onhand}}</td>
                                <td>{{$asset->total}}</td>
                                <td>{{$asset->description}}</td>
                                <td>
                                    <a href="{{url('/asset/edit/'.$asset->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/asset/delete/'.$asset->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$assets->links()}}
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
            $("#menu_asset").addClass("current");
        })
    </script>
@endsection