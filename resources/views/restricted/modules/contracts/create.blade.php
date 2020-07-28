@extends('restricted.layout.site')
@section('title', 'Novo Contrato')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('contracts.all') }}">Contrato</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Criando Contrato</a></li>
  </ol>
</div>
<h3 class="TitleSection">Adicionando Contrato</h3>
<div class="row formUsers">
  <form class="col-md-12" method="post" action="{{ route('contract.save') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('restricted.modules.contracts._form')
    <button type="submit" class="btn btn-outline-primary btn-lg">Salvar</button>
  </form>
</div>
@endsection
