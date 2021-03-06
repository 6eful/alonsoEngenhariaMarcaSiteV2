@extends('restricted.layout.site')
@section('title', 'Novo Cliente')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customer.all') }}">Cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Edição Cliente</a></li>
  </ol>
</div>
<h3 class="TitleSection">Adicionando Cliente</h3>
<div class="row formUsers">
  <form class="col-md-12" method="post" action="{{ route('customer.atualizar', $customer->id) }}">
    @include('restricted.modules.customers._form')
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-outline-primary btn-lg">Salvar alterações</button>
  </form>
</div>
@endsection
