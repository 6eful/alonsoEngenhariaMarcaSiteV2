@extends('restricted.layout.site')
@section('title', 'Usuarios')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Usuários</a></li>
  </ol>
</div>
<h3 class="TitleSection">Lista de Usuarios</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nome</th>
      <th scope="col">Email</th>
      <th scope="col">Deletar</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $dados)
    <tr>
      <th scope="row">{{ $dados->id }}</th>
      <td>{{ $dados->UserName }}</td>
      <td>{{ $dados->email }}</td>
      <td><a href="{{ route('user.delete', $dados->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      <td><a href="{{ route('user.edit', $dados->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row btn-add">
  <div class="col-md-12">
    <button type="submit" class="btn btn-outline-primary btn-lg"><a href="{{ route('user.create.index') }}">Adicionar usuário</a></button>
  </div>
</div>

@endsection
