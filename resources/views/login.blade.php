<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sangam Studio | Log in</title>
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/dist/img/favicon.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css') }}">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }
    
    body {
      background-color: #f3f0ec;
    }

    .container {
      display: flex;
      /* height: 80vh; */
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      max-width: 1200px;
      margin: auto;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .left-section {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .illustration {
      width: 90%;
      max-width: 500px;
    }

    .right-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
    }

    .logo-img {
      width: 180px;
      margin-bottom: 10px;
    }

    h2 {
      font-weight: normal;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-size: 0.9rem;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .actions {
      display: flex;
      align-items: center;
      /* justify-content: space-between; */
    }

    button {
      padding: 10px 20px;
      background-color: #071952;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #0a2a80;
    }

    .remember {
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 5px;
      /* margin-right: 180px; */
      margin-left: 3%;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="container">
  <div class="left-section">
    <img src="{{asset('assets/dist/img/login-1.png')}}" alt="Login Illustration" class="illustration">
  </div>
  <div class="right-section">
    <div class="login-box">
      <img src="{{asset('assets/dist/img/login-2.png')}}" alt="SkillTech Logo" class="logo-img">
      <h2>Welcome to SkillTech</h2>

      <!-- alert message start -->
      @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>{{ Session('success') }} </h5>
        </div>
      @endif

      @if(Session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-times"></i>{{ Session('error') }} </h5>
        </div>
      @endif

      @if($errors->any())
        @foreach($errors->all() as $err)
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-times"></i>{{$err}} </h5>
          </div>
        @endforeach
      @endif
      <!-- alert message end -->

      <form action="loginprocess" method="post">
        @csrf
        <label for="email">Login</label>
        <input type="text" id="email" name="unm" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="pwd" placeholder="Enter your password" required>

        <div class="actions">
          <button type="submit">Sign Me In</button>
          <label class="remember" >
            <input type="checkbox"><span>remember me </span>
          </label>
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="adminforgetpwd">I forgot my password</a>
      </p> -->
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
