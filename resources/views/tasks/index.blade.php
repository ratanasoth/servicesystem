@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Task List</strong>&nbsp;&nbsp;
                    <a href="{{url('/task/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Severity</th>
                            <th>Handle Person</th>
                            <th>Deadline</th>
                            <th>Progression</th>
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
                         @foreach($tasks as $t)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$t->title}}</td>
                                <td>{{$t->severity}}</td>
                                <td>{{$t->first_name}} {{$t->last_name}}</td>
                                <td>{{$t->deadline}}</td>
                                <td>{{$t->progression}}%</td>
                                <td>
                                    <a href="{{url('/task/detail/'.$t->id)}}"><i class="fa fa-eye text-primary" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/task/edit/'.$t->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/task/delete/'.$t->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$tasks->links()}}
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