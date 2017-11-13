@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Schedules List</strong>&nbsp;&nbsp;
                    <a href="{{url('/schedule/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <!-- <th>Create By</th> -->
                            <th>Schedule Date</th>
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
                         @foreach($schedule_list as $schedule)
                             <?php
                                if($schedule->schedule_date==""){
                                    $date ="";
                                }else{
                                    $date = date("m/d/Y",strtotime($schedule->schedule_date));
                                }
                             ?>
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$schedule->title}}</td>
                                <!-- <td>{{$schedule->create_by}}</td> -->
                                <td>{{$date}}</td>
                                <td>{{$schedule->description}}</td>
                                <td>
                                    <a href="{{url('/schedule/detail/'.$schedule->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/schedule/edit/'.$schedule->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/schedule/delete/'.$schedule->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$schedule_list->links()}}
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
            $("#schedule").addClass("current");
        })
    </script>
@endsection