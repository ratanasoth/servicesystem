@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Customer Feedback</strong>&nbsp;&nbsp;
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Subject</th>
                            <th>Feedback To</th>
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
                        @foreach($feedbacks as $f)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$f->subject}}</td>
                                <td>{{$f->feedback_to}}</td>
                                <td>{{$f->create_at}}</td>
                                <td>
                                    <a href="{{url('/feedback/detail/'.$f->id)}}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$feedbacks->links()}}
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
            $("#menu_feedback").addClass("current");
        })
    </script>
@endsection