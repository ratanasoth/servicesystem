@extends('layouts.customer')
@section('content')

<<<<<<< HEAD
<script src="{{asset('js/jssor.slider.min.js')}}"></script>
<script type="text/javascript">
jssor_1_slider_init = function () {

    var jssor_1_SlideshowTransitions = [
        {$Duration: 1200, $Opacity: 2}
    ];

    var jssor_1_options = {
        $AutoPlay: 1,
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
        }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*#region responsive code begin*/



    var MAX_WIDTH = 3000;

    function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {

            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

            jssor_1_slider.$ScaleWidth(expectedWidth);
        } else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/

    /*#endregion responsive code end*/
};
</script>




<div class="row">
    <div class="col-lg-3">
        <div class="list_category_div">

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item list_category"><strong>Category</strong></li>

                @foreach($categories as $category)
                <li class="list-group-item list_category "><a href="{{url('customer/product/category/'.$category->id)}}" >{{$category->name}}</a></li>
                @endforeach

            </ul>
        </div>

    </div>

    <div class="col-lg-9">


        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1920px;height:800px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('uploads/slides/spin.svg')}}" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1920px;height:800px;overflow:hidden;">
                @foreach($slides as $slide)
                <div>
                    <img data-u="image" src="{{asset('uploads/slides/'.$slide->photo)}}" />
                </div>

                @endforeach

            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
        <!-- #endregion Jssor Slider End -->


    </div>

</div>



<div class="row">
    <div class="col-lg-12">
        <br/><h4 class="title_head"><strong>Feature Products</strong></h4><br/>
    </div>

    <!-- BEGIN PRODUCTS -->
    <?php
    $i = 0;
    ?>
    @foreach($products as $p)
    <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
            <img src="http://placehold.it/500x400" alt="..." class="img-responsive">
            <h5>{{$p->name}}</h5>
            <hr class="line">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p class="price">${{$p->price}}</p>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                    <a href="{{url('/customer/product/detail/'.$p->id)}}" class="btn btn-bg">View</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $i++;
    if ($i % 4 == 0) {
        echo '<br/><br/>';
    }
    ?>

    @endforeach
</div>

<!-- END PRODUCTS -->


<div class="row">
    <div class="col-lg-12">
        <br/><h4 class="title_head"><strong>Latest News</strong></h4><br/>
    </div>

    <!-- BEGIN News -->
    <?php
    $i = 0;
    ?>
    @foreach($news as $n)
    <div class="col-md-4 col-sm-6">
        <div class="thumbnail">
            <img src="http://placehold.it/500x400" alt="..." class="img-responsive">
            <h5>{{$n->title}}</h5>
            <hr class="line">
            {{$n->short_description}}
             <div class="text-right"> <a href="{{url('/customer/news/detail/'.$n->id)}}" class="btn btn-bg">View</a></div>
             
        </div>
    </div>
    <?php
    $i++;
    if ($i % 3 == 0) {
        echo '<br/><br/>';
    }
    ?>

    @endforeach

    <div class="col-lg-12">
        <br/><br/>
    </div>

</div>

<!-- end latest news -->



@endsection
@section('js')

<script>
    $(document).ready(function () {
=======
<h1>hi</h1>
@endsection
@section('js')
<script>
    $(document).ready(function(){
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
        $(".mn .nav-item").removeClass('active');
        $("#menu_home").addClass("active");
    });
</script>
<<<<<<< HEAD


=======
>>>>>>> 46fbb6bf19d865f35befeb202f51462307c8d3b4
@endsection