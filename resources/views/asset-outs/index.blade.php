@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Asset Check Out List</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset-out/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Asset</th>
                            <th>Out Qty</th>
                            <th>Out Date</th>
                            <th>Return Date</th>
                            <th>Out By</th>
                            <th>Reason</th>
                             <th>Return Qty</th>
                            <th>Due Qty</th>
                            <th>Is Returned</th>
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
                         @foreach($asset_outs as $at)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a href="{{url('/asset-out/detail/'.$at->id)}}">{{$at->name}}</a></td>
                                <td>{{$at->quantity}}</td>
                                <td>{{$at->out_date}}</td>
                                <td>{{$at->return_date}}</td>
                                <td>{{$at->user_name}}</td>
                                <td>{{$at->reason}}</td>
                                <td></td>
                                <td></td>
                                <td>{{$at->is_returned}}</td>
                                <td>
                                    <a href="{{url('/asset-out/edit/'.$at->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/asset-out/delete/'.$at->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$asset_outs->links()}}
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
            $("#menu_asset_out").addClass("current");
        })
    </script>
@endsection