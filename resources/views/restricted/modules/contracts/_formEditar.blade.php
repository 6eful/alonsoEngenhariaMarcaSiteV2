<div class="form-group">
    <label for="exampleFormControlSelect1">Clientes</label>
    <select class="form-control" id="CustomerID" name="CustomerID">
      <option value="" disabled selected>Selecione o cliente</option>
      @foreach($CustomersList as $customer)
      <option value="{{ $customer['id'] }}" {{ isset($contracts->CustomerID) == $customer['id'] ? 'selected' : '' }}>{{ $customer['CustomerNome'] }}</option>
      @endforeach
    </select>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="ContractAddress">Endereço</label>
      <input type="text" class="form-control" id="ContractAddress" name="ContractAddress" placeholder="endereço" value="{{ isset($contracts->ContractAddress) ? $contracts->ContractAddress : '' }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="ContractAmount">Valor Total R$</label>
      <input type="number" class="form-control" id="ContractAmount" placeholder="valor" name="ContractAmount" value="{{ isset($contracts->ContractAmount) ? $contracts->ContractAmount : '' }}" required min="1">
    </div>
    <div class="form-group col-md-2">
      <label for="ContractSign">Sinal R$</label>
      <input type="number" class="form-control" id="ContractSign" placeholder="Sinal" name="ContractSign" value="{{ isset($contracts->ContractSign) ? $contracts->ContractSign : '' }}" required min="1">
    </div>
    <div class="form-group col-md-2">
      <label for="ContractQtPayment">Quantidade de Parcelas</label>
      <input type="number" class="form-control" id="ContractQtPayment" placeholder="Qts de parcela" name="ContractQtPayment" value="{{ isset($contracts->ContractQtPayment) ? $contracts->ContractQtPayment : 0 }}" required min="1" readonly>
    </div>
</div>
<div id="Payment">
      @php $a = 0 @endphp
      @foreach($listPayment as $listaparcelas)
        <div class="form-row">
          <div class="form-group col-md-6">
            <input id="PaymentAmount{{$a}}" name="PaymentAmount{{$a}}" type="number" class="validate" readonly value="{{$listaparcelas['PaymentAmount']}}">
          </div>
          <div class="form-group col-md-6">
            <label for="DataPayment{{$a}}">Data da parcela R$</label>
            <input id="DataPayment{{$a}}" name="DataPayment{{$a}}" type="date" class="validate" required value="{{$listaparcelas['PaymentDate']}}">
          </div>
        </div>
        @php $a++ @endphp
      @endforeach
</div>
<div class="form-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="ContractFile" name="ContractFile">
    <label class="custom-file-label" for="ContractFile">Selecione o arquivo</label>
  </div>
</div>
<div class="form-group">
  <label for="ContractStatus">Status</label>
  <select class="custom-select custom-select-lg" name="ContractStatus" id="ContractStatus">
    <option value="" disabled selected>Selecione o status</option>
    <option value="aberto" selected>Aberto</option>
    <option value="fechado">Fechado</option>
  </select>
</div>
