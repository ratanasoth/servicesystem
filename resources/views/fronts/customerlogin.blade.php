@extends("layouts.front")
@section("content")
   
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 mx-auto">
           
                <div class="card card-container" style="color: #000;">

                    <img id="profile-img" class="profile-img-card" src="{{asset('img/logo-vdoo.png')}}" />
                    <p id="profile-name" class="profile-name-card"></p>

                     <h3 class="text-uppercase">
                        <strong>CUSTOMER LOGIN</strong>
                      </h3>
                     
                    <form action="{{url('/front/customer/login')}}" class="form-signin" method="post">
                        {{csrf_field()}}
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        
                        <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Sign in</button>
                        <a href="{{url('/customer/register')}}" class="btn btn-success ">Register</a>
                    </form>
                    <a href="#" class="forgot-password">
                        Forgot the password?
                    </a>
                    @if(Session::has('sms1'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms1')}}
                        </div>
                    </div>
                @endif
                </div>
          </div>      
        </div>
      </div>
    </header>

@endsection