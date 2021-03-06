@extends("layouts.management")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>News Detail</strong>&nbsp;&nbsp;
                    <a href="{{url('/promotion/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/promotion/edit/'.$pro_list->id)}}" class="text-danger"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('/promotion')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group row">
                               <label for="id" class="control-label col-sm-4 lb">ID</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$pro_list->id}}" readonly>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="title" class="control-label col-sm-4 lb">Title</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" value="{{$pro_list->title}}" readonly>
                               </div>
                           </div>
                            <div class="form-group row">
                               <label for="expired_date" class="control-label col-sm-4 lb">Expired Date</label>
                               <div class="col-sm-8">
                               <?php
                               if($pro_list->expired_date==""){
                                  $date ="";
                               }else{
                                  $date = date("m/d/Y",strtotime($pro_list->expired_date));
                               }
                               ?>
                                   <input type="text" class="form-control" value="{{$date}}" readonly>
                               </div>
                            </div>
                           <div class="form-group row">
                               <label for="description" class="control-label col-sm-4 lb">Description</label>
                               <div class="col-sm-8">
                                  <textarea name="description" id="description" readonly="true" class="form-control" rows="10">{{$pro_list->description}}</textarea>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#promotion").addClass("current");
        })
    </script>

@endsection