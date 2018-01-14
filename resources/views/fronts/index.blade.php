@extends("layouts.front")
@section("content")
   
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <h3 class="text-uppercase">
              <strong>CUSTOMER LOGIN</strong>
            </h3>
            <hr>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/customerlogin')}}">LOGIN</a>
            <p>If you don't have an account yet, please create here.</p>
            <a href="{{url('/customer/register')}}" class="btn btn-success">Register</a>
          </div>
          <div class="col-lg-6 mx-auto">
            <h3 class="text-uppercase">
              <strong>STAFF LOGIN</strong>
            </h3>
            <hr>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/stafflogin')}}">LOGIN</a>
          </div>
        </div>
      </div>
    </header>

@endsection
@section('js')


@endsection