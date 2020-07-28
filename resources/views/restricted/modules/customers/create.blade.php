@extends('restricted.layout.site')
@section('title', 'Criar Cliente')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customer.all') }}">Cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Criando Cliente</a></li>
  </ol>
</div>
<h3 class="TitleSection">Adicionando Cliente</h3>
<div class="row formUsers">
  <form class="col-md-12" method="post" action="{{ route('customer.save') }}">
    {{ csrf_field() }}
    @include('restricted.modules.customers._form')
    <button type="submit" class="btn btn-outline-primary btn-lg">Salvar</button>
  </form>
</div>
@endsection
