@extends('layouts.customer')
@section('content')

<h1>hi</h1>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_home").addClass("active");
    });
</script>
@endsection