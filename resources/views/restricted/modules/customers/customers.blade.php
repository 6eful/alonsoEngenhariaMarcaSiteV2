@extends('restricted.layout.site')
@section('title', 'Clientes')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Clientes</a></li>
  </ol>
</div>
<h3 class="TitleSection">Lista de Clientes</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Razão Social</th>
      <th scope="col">Nome Fantasia</th>
      <th scope="col">Email</th>
      <th scope="col">Nome Responsável</th>
      <th scope="col">Deletar</th>
      <th scope="col">Visualizar</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $costumer)
    <tr>
      <th scope="row">{{ $costumer->id }}</th>
      <td>{{ $costumer->CustomerRazaoSocial }}</td>
      <td>{{ $costumer->CustomerNomeFantasia }}</td>
      <td>{{ $costumer->CustomerEmail }}</td>
      <td>{{ $costumer->CustomerNome }}</td>
      <td><a href="{{ route('customer.delete', $costumer->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      <td><a href="{{ route('customer.data', $costumer->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
      <td><a href="{{ route('customer.edit', $costumer->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row btn-add">
  <div class="col-md-12">
    <button type="button" class="btn btn-outline-primary btn-lg"><a href="{{ route('customer.create.index') }}">Adicionar usuário</a></button>
  </div>
</div>

@endsection
