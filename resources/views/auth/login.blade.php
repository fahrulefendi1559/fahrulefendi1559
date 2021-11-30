<!-- login tamplet -->
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jan 2019 10:33:12 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FPB | Login</title>

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">RGS</h1>

            </div>
            <h3>Welcome to Request Goods System</h3>

            <form class="m-t" role="form" action="{{route('login')}}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Please Enter Email"  required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <font color="red"><strong>{{ $errors->first('email') }}</strong></font>
                        </span>
                    @endif
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                    
                <div class="form-group">
                    <input id="password" type="password" class="form-control"  name="password" required="">
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <font color="red"> <strong>{{ $errors->first('password') }}</strong></font>
                           
                        </span>
                    @endif
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
            </form>
            <p class="m-t"> <small>this system uses a framework &copy; 2021</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('asset/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('asset/js/popper.min.js')}}"></script>
    <script src="{{ asset('asset/js/bootstrap.js')}}"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jan 2019 10:33:12 GMT -->
</html>

