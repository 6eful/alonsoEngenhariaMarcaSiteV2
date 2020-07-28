<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
    <style>
      header {
        background-color: white;
        width: 100%;
      }
      .form-group:nth-child(3) {
        width: 100%;
        display: block;
        margin-left: 0.35rem;
        margin-top: 26px;
      }

      .form-group:nth-child(3) > div {
        letter-spacing: 1.5rem;
        width: 50%;
        margin: 0 auto;
      }

      input[type="email"], [type="password"] {
        padding: 20px 0px;
        background: transparent;
        border: 0;
        border-bottom: 1px solid #435160;
        outline: none;
        color: #fff;
        font-size: 16px;
      }

      input[type="email"]:focus, [type="password"]:focus {
        background: transparent;
        outline: none;
        color: #fff;
      }

      label {
        margin-right: 10px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: transparent;
        font-size: 1.28rem;
        color: #fff;
      }

      .section-background{
        background-image:radial-gradient(#48c6ef , #6f86d6);
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <header class="row">
        <div class="col-12 brand">
          <h1>Alonso Engenharia</h1>
        </div>
      </header>
      <div class="row section-background">
        <div class="col"></div>
        <main class="col-md-5 col-12">
          <section>
            <h3>Sign in</h3>
            <h5>Bem Vindo! loga-se em Alonso Engenharia e comece a gerenciar sua empresa</h5>
            <form method="post" action="{{ route('user.login.Signin') }}">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="email" class="">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                  </div>
                </div>
              </div>
            </form>
          </section>
        </main>
        <div class="col"></div>
      </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  </body>
</html>
