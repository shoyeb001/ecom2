@extends('front/layout.layout')

@section('container')

<!-- login -->
<div class="w3_login">
    <h3>Sign In & Sign Up</h3>
    <p style="text-align: center; color:red; margin-top: 15px">{{session('msg')}}</p>
    <div class="w3_login_module">
        <div class="module form-module">
          <div class="toggle"><i class="fa fa-times fa-pencil"></i>
            <div class="tooltip">Click Me</div>
          </div>
          <div class="form">
            <h2>Login to your account</h2>
            <form action="/login/login" method="POST">
                @csrf
              <input type="email" name="email" placeholder="Email" required="">
              <input type="password" name="password" placeholder="Password" required=" ">
              <input type="submit" value="Login">
            </form>
          </div>
          <div class="form">
            <h2>Create an account</h2>
            <form action="{{url('/login/signup')}}" method="POST">
                @csrf
              <input type="text" name="username" placeholder="Username" required=" ">
              <input type="password" name="password" placeholder="Password" required=" ">
              <input type="email" name="email" placeholder="Email Address" required=" ">
              <input type="text" name="phone" placeholder="Phone Number" required=" ">
              <input type="submit" value="register">
            </form>
          </div>
          <div class="cta"><a href="{{url("/forgot-password")}}">Forgot your password?</a></div>
        </div>
    </div>
    <script>
        $('.toggle').click(function(){
          // Switches the Icon
          $(this).children('i').toggleClass('fa-pencil');
          // Switches the forms  
          $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
          }, "slow");
        });
    </script>
</div>
<!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection
<!-- //banner -->