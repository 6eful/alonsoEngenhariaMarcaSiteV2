<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/alonso.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .col-2, .col-10 {
        float: left;
        width: 66%!important;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <header class"row">
        <div class="col-2">
            <nav>
              <picture>
                <img src="{{ asset('img/perfil_Adm.jpg') }}" alt="" class="rounded-circle mx-auto d-block img-thumbnail">
              </picture>
              <h4>{{Auth::user()->UserName}}</h4>
              <ul id="links">
                @if(Auth::user()->admin)
                <a href="{{ route('user.all') }}"><li><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Usuarios</li></a>
                @endif
                <a href="{{ route('customer.all') }}"><li><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Cliente</li></a>
                <a href="{{ route('contracts.all') }}"><li><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Contratos</li></a>
              </ul>
              <button type="button" class="btn btn-large"><a href="{{ route('login.logout') }}" class="fa fa-power-off fa-2x" aria-hidden="true"></a></button>
            </nav>
          </div>
          <main class="col-10">
            <div>
