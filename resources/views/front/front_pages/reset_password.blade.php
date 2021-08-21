@extends('front/layout.layout')

@section('container')

<!-- login -->
<div class="w3_login">
    <h3>Forgot Password </h3>
    <p style="text-align: center; color:red; margin-top: 15px">{{session('msg')}}</p>
    <div class="w3_login_module">
        <div class="module form-module">

          <div class="form">

          </div>
          <div class="form">
            <h2>Reset Password</h2>
            <form action="{{url('/reset')}}" method="POST">
                @csrf
              <input type="password" name="password" placeholder="New Password" required=" ">
              <input type="hidden" name="old_password" value="{{$result[0]->password}}">
              <input type="submit" name="submit" value="Submit">
            </form>
          </div>

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