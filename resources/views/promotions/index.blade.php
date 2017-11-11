@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Promotion List</strong>&nbsp;&nbsp;
                    <a href="{{url('/promotion/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Expired Date</th>
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
                         @foreach($pro_list as $pros)
                         <?php
                            if($pros->expired_date==""){
                                $date ="";
                            }else{
                                $date = date("m/d/Y",strtotime($pros->expired_date));
                            }
                         ?>
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$pros->title}}</td>
                                <td>{{$date}}</td>
                                <td>{{$pros->description}}</td>
                                <td>
                                    <a href="{{url('/promotion/detail/'.$pros->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/promotion/edit/'.$pros->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/promotion/delete/'.$pros->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$pro_list->links()}}
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
            $("#promotion").addClass("current");
        })
    </script>
@endsection