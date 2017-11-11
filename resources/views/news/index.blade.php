@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>News List</strong>&nbsp;&nbsp;
                    <a href="{{url('/news/create')}}"><i class="fa fa-plus"></i>New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Short Description</th>
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
                         @foreach($news_list as $news)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$news->title}}</td>
                                <td>{{$news->short_description}}</td>
                                <td>{{$news->description}}</td>
                                <td>
                                    <a href="{{url('/news/detail/'.$news->id)}}"><i class="fa fa-folder text-success" title="View Detail"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/news/edit/'.$news->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/news/delete/'.$news->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Are you sure want to delete?')"
                                       title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$news_list->links()}}
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
            $("#news").addClass("current");
        })
    </script>
@endsection