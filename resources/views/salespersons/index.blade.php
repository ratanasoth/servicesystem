@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Salesperson List</strong>&nbsp;&nbsp;
                    <a href="{{url('/customer/create')}}"><i class="fa fa-plus"></i> New</a>
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
                         @foreach($salespersons as $sale)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sale->first_name}}</td>
                                <td>{{$sale->last_name}}</td>
                                <td>{{$sale->gender}}</td>
                                <td>{{$sale->dob}}</td>
                                <td>{{$sale->position}}</td>
                                <td>{{$sale->email}}</td>
                                <td>{{$sale->phone}}</td>
                                <td>
                                    <a href="{{url('/salesperson/edit/'.$sale->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/salesperson/delete/'.$sale->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$salespersons->links()}}
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
            $("#customer").addClass("current");
        })
    </script>
@endsection