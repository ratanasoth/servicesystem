@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Technician List</strong>&nbsp;&nbsp;
                    <a href="{{url('/technician/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Branch</th>
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
                         @foreach($technicians as $tech)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tech->first_name}}</td>
                                <td>{{$tech->last_name}}</td>
                                <td>{{$tech->gender}}</td>
                                <td>{{$tech->dob}}</td>
                                <td>{{$tech->position}}</td>
                                <td>{{$tech->email}}</td>
                                <td>{{$tech->phone}}</td>
                                <td>{{$tech->name}}</td>
                                <td>
                                    <a href="{{url('/technician/edit/'.$tech->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/technician/delete/'.$tech->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$technicians->links()}}
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
            $("#technician").addClass("current");
        })
    </script>
@endsection