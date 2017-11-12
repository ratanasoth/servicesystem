@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Task List</strong>&nbsp;&nbsp;
                    <a href="{{url('/task/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Security</th>
                            <th>Handler</th>
                            <th>Deadline</th>
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
                         @foreach($task_list as $tasks)
                             <?php
                                if($tasks->deadline==""){
                                    $date ="";
                                }else{
                                    $date = date("m/d/Y",strtotime($tasks->deadline));
                                }
                             ?>
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tasks->title}}</td>
                                <td>{{$tasks->severity}}</td>
                                <td>{{$tasks->handler}}</td>
                                <td>{{$date}}</td>
                                <td>{{$tasks->description}}</td>
                                <td>
                                    <a href="{{url('/task/detail/'.$tasks->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/task/edit/'.$tasks->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/task/delete/'.$tasks->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$task_list->links()}}
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
            $("#task").addClass("current");
        })
    </script>
@endsection