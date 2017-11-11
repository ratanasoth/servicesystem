@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Event List</strong>&nbsp;&nbsp;
                    <a href="{{url('/event/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Event Date</th>
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
                         @foreach($event_list as $events)
                         <?php
                            if($events->event_date==""){
                                $date ="";
                            }else{
                                $date = date("m/d/Y",strtotime($events->event_date));
                            }
                         ?>
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$events->name}}</td>
                                <td>{{$events->location}}</td>
                                <td>{{$date}}</td>
                                <td>{{$events->description}}</td>
                                <td>
                                    <a href="{{url('/event/detail/'.$events->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/event/edit/'.$events->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/event/delete/'.$events->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$event_list->links()}}
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
            $("#event").addClass("current");
        })
    </script>
@endsection