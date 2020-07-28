@extends('restricted.layout.site')
@section('title', 'Contratos')

@section('content')
<div aria-label="breadcrumb" style="margin:30px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.homePanel') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Contratos</a></li>
  </ol>
</div>
<h3 class="TitleSection">Listas de Contratos</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Proposta feita em</th>
      <th scope="col">Inicio do pgto.</th>
      <th scope="col">Quantidade de parcelas</th>
      <th scope="col">Sinal R$</th>
      <th scope="col">Valor Parcela R$</th>
      <th scope="col">Total R$</th>
      <th scope="col">Status</th>
      <th scope="col">Deletar</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($contracts as $contract)
    <tr>
      <th>{{ $contract->CustomerNome }}</th>
      <td>{{ date('d/m/Y', strtotime($contract->created_at)) }}</td>
      <td>{{ date('d/m/Y', strtotime($contract->PaymentDate)) }}</td>
      <td>{{ $contract->ContractQtPayment }}</td>
      <td>{{ $contract->ContractSign }}</td>
      <th>{{ $contract->vPaymentAmount }}</th>
      <td>{{ $contract->ContractAmount }}</td>
      <td id="editavel">{{ $contract->ContractStatus }}</td>
      <p style="display:none;" id="idContract">{{$contract->id}}</p>
      <td><a href="{{ route('contract.delete', $contract->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      <td><a href="{{ route('contract.edit', $contract->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row btn-add">
  <div class="col-md-12">
    <button type="button" class="btn btn-outline-primary btn-lg"><a href="{{ route('contract.create.index') }}">Adicionar contrato</a></button>
    <button type="button" class="btn btn-outline-success btn-lg"><a href="{{ route('contract.export') }}">Exportar to Excel</a></button>
  </div>
</div>

@endsection
