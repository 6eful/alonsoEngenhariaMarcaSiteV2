@extends('restricted.layout.site')
@section('title', 'Dados do Clientes')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customer.all') }}">Cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $DadosCustomer->CustomerNomeFantasia }}</a></li>
  </ol>
</div>
<h3 class="TitleSection">Contratos</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Endereço</th>
      <th scope="col">Valor</th>
      <th scope="col">Sinal</th>
      <th scope="col">Parcelas</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Contracts as $contract)
    <tr>
      <th>{{ $contract['id'] }}</th>
      <td>{{ $contract['ContractAddress'] }}</td>
      <td>{{ $contract['ContractAmount'] }}</td>
      <td>{{ $contract['ContractSign'] }}</td>
      <td>{{ $contract['ContractQtPayment'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
