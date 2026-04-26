<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | SIEKSTRA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
  <style>
    body {
      background: #8b9994;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .login-container {
      display: flex;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border-radius: 20px;
      overflow: hidden;
      width: 1000px;
      margin: 4% auto;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(4px);
    }
    .login-left {
      background: #f5f5f5;
      padding: 60px 40px 30px 40px;
      border-radius: 20px 0 0 20px;
      min-width: 400px;
      min-height: 500px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .login-right {
      background: rgba(255,255,255,0.85);
      padding: 60px 40px;
      border-radius: 0 20px 20px 0;
      min-width: 400px;
      min-height: 500px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    .login-right-content {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .logo-img {
      width: 120px;
      margin-bottom: 10px;
      border-radius: 10px;
      box-shadow: 0 4px 16px #0002;
    }
    .login-left .form-control {
      font-size: 1.3em;
      padding: 18px 16px;
      border-radius: 8px;
      margin-bottom: 18px;
    }
    .login-left .btn-primary {
      font-size: 1.2em;
      padding: 14px 0;
      border-radius: 8px;
      background: #0073b7;
      border: none;
      transition: background 0.2s;
    }
    .login-left .btn-primary:hover {
      background: #005fa3;
    }
    .login-left label, .login-left p {
      font-size: 1.1em;
    }
    .login-right h4 {
      font-size: 2.2em;
      margin-bottom: 10px;
      color: #0073b7;
      font-weight: bold;
    }
    .login-right b {
      font-size: 1.3em;
      color: #222;
    }
    .login-right p {
      font-size: 1.1em;
      color: #444;
      margin-top: 18px;
    }
    @media (max-width: 900px) {
      .login-container {
        flex-direction: column;
        width: 98vw;
        min-width: unset;
      }
      .login-left, .login-right {
        border-radius: 0;
        min-width: unset;
        min-height: 300px;
        padding: 30px 10vw;
      }
      .login-right {
        border-radius: 0 0 20px 20px;
      }
      .login-left {
        border-radius: 20px 20px 0 0;
      }
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-container">
  <div class="login-left">
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ url('login') }}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" style="position:relative;">
        <input type="password" class="form-control" name="password" placeholder="Password" required id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span style="position:absolute;right:20px;top:12px;cursor:pointer;font-size:1em;" onclick="togglePassword()"> </span>
      </div>
      <div class="checkbox icheck" style="margin-bottom:18px;">
        <label>
          <input type="checkbox" name="remember"> Remember password
        </label>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      <p style="margin-top:18px;">Belum punya akun? <a href="{{ url('register') }}">Daftar</a></p>
    </form>
  </div>
  <div class="login-right">
    <div class="login-right-content">
      <img src="{{ url('logo.png') }}" class="logo-img" alt="Logo">
      <h4>SIEKSTRA</h4>
      <b>Sistem Informasi Ekstrakulikuler<br>MTsN 2 Bondowoso</b>
      <p>Jl. MT. Haryono No. 44. Telp. (0332) 429648</p>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</body>
</html>
