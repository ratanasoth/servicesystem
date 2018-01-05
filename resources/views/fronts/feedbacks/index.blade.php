@extends('layouts.customer')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Feedback List</strong>
                            &nbsp;&nbsp;
                            <a href="{{url('/customer/feedback/create')}}" class="text-primary"><i class="fa fa-plus"></i> New</a>
                        </div>
                        <div class="col-sm-5">
                            <form action="{{url('/customer/feedback')}}" class="form-horizontal" method="get">
                                <div class="input-group"  style="margin-top: -9px;margin-bottom:3px">
                                    <input type="text" class="form-control" placeholder="Search for..." name="q" value="{{$q}}">
                                    <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Subject</th>
                            <th>Feedback To</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pagex = @$_GET['page'];
                        if(!$pagex)
                            $pagex = 1;
                        $i = 22 * ($pagex - 1) + 1;
                        ?>
                        @foreach($feedbacks as $f)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$f->subject}}</td>
                                <td>{{$f->feedback_to}}</td>
                                <td>
                                    <a href="{{url('/customer/feedback/detail/'.$f->id)}}" class="btn btn-success">View</a>
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
        $(document).ready(function(){
            $(".mn .nav-item").removeClass('active');
            $("#menu_feedback").addClass("active");
        });
    </script>
@endsection