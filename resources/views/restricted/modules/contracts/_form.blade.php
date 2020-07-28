<div class="form-group">
    <label for="exampleFormControlSelect1">Cliente</label>
    <select class="form-control" id="CustomerID" name="CustomerID">
      <option value="" disabled selected>Selecione o cliente</option>
      @foreach($CustomersList as $customer)
      <option value="{{ $customer['id'] }}">{{ $customer['CustomerNome'] }}</option>
      @endforeach
    </select>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="ContractAddress">Endereço</label>
      <input type="text" class="form-control" id="ContractAddress" name="ContractAddress" placeholder="endereço" required>
    </div>
    <div class="form-group col-md-4">
      <label for="ContractAmount">Valor Total R$</label>
      <input type="number" class="form-control" id="ContractAmount" placeholder="valor" name="ContractAmount" required min="1">
    </div>
    <div class="form-group col-md-2">
      <label for="ContractSign">Sinal R$</label>
      <input type="number" class="form-control" id="ContractSign" placeholder="Sinal" name="ContractSign" required min="1">
    </div>
    <div class="form-group col-md-2">
      <label for="ContractQtPayment">Quantidade de Parcelas</label>
      <input type="number" class="form-control" id="ContractQtPayment" placeholder="Qts de parcela" name="ContractQtPayment" required min="1">
    </div>
</div>
<div class="row">
</div>
<div id="Payment"></div>
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
