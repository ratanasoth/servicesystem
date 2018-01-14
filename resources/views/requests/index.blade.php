@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Customer Request</strong>&nbsp;&nbsp;
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Subject</th>
                            <th>Requester</th>
                            <th>Date</th>
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
                        @foreach($requests as $f)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$f->subject}}</td>
                                <td>{{$f->first_name}} {{$f->last_name}}</td>
                                <td>{{$f->request_date}}</td>
                                <td>
                                    <a href="{{url('/request/detail/'.$f->id)}}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$requests->links()}}
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
            $("#menu_request").addClass("current");
        })
    </script>
@endsection