  <div class="form-group">
    <label for="CustomerRazaoSocial">Razão Social</label>
    <input type="text" class="form-control" id="CustomerRazaoSocial" name="CustomerRazaoSocial" placeholder="Enter Razão Social" value="{{ isset($customer->CustomerRazaoSocial) ? $customer->CustomerRazaoSocial : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerNomeFantasia">Nome Fantasia</label>
    <input type="text" class="form-control" id="CustomerNomeFantasia" name="CustomerNomeFantasia" placeholder="Enter Nome Fantasia" value="{{ isset($customer->CustomerNomeFantasia) ? $customer->CustomerNomeFantasia : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerCNPJ">CNPJ</label>
    <input type="text" class="form-control" id="CustomerCNPJ" name="CustomerCNPJ" placeholder="Enter CNPJ" value="{{ isset($customer->CustomerCNPJ) ? $customer->CustomerCNPJ : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerAddress">Endereço</label>
    <input type="text" class="form-control" id="CustomerAddress" name="CustomerAddress" placeholder="Enter Endereço" value="{{ isset($customer->CustomerAddress) ? $customer->CustomerAddress : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerEmail">Email</label>
    <input type="email" class="form-control" id="CustomerEmail" name="CustomerEmail" placeholder="Enter email" value="{{ isset($customer->CustomerEmail) ? $customer->CustomerEmail : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerTelefone">Telefone</label>
    <input type="text" class="form-control" id="CustomerTelefone" name="CustomerTelefone" placeholder="Enter telefone" value="{{ isset($customer->CustomerTelefone) ? $customer->CustomerTelefone : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerNome">Nome</label>
    <input type="text" class="form-control" id="CustomerNome" name="CustomerNome" placeholder="Enter name" value="{{ isset($customer->CustomerNome) ? $customer->CustomerNome : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerCPF">CPF</label>
    <input type="text" class="form-control" id="CustomerCPF" name="CustomerCPF" placeholder="Enter CPF" value="{{ isset($customer->CustomerCPF) ? $customer->CustomerCPF : '' }}">
  </div>
  <div class="form-group">
    <label for="CustomerCelular">Celular</label>
    <input type="text" class="form-control" id="CustomerCelular" name="CustomerCelular" placeholder="Enter celular" value="{{ isset($customer->CustomerCelular) ? $customer->CustomerCelular : '' }}">
  </div>
