<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta6
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in | {{config('app.name')}}</title>
    <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.min.css')}}" rel="stylesheet"/>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body  class="d-flex flex-column">
  <!-- <header id="header" class="fixed-top bg-dark">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">SahamGeek</a></h1>
    </div>
  </header> -->
    <div class="page page-center">
      <div class="container-tight pb-4">
        <div class="text-center mb-4">
          <h1 class="navbar-brand navbar-brand-autodark">LOGIN</h1>
        </div>
        <form class="card card-md" action="{{route ('do-login') }}" method="POST" autocomplete="off">
          @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name='email' placeholder="Enter email">
            </div>
            <div class="mb-2">
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password"  placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" name="remember" class="form-check-input"/>
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
      </div>
      <div class="text-center text-muted mt-4">
          Copyright &copy; Sahamgeek | 2022
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('dist/js/tabler.min.js')}}"></script>
    <script src="{{asset('dist/js/demo.min.js')}}"></script>
  </body>
</html>