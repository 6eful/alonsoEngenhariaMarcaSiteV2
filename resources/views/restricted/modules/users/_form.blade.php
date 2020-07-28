  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ isset($dado->UserName) ? $dado->UserName : '' }}">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ isset($dado->email) ? $dado->email : '' }}">
  </div>
  <div class="form-group">
    <label for="password">Senha</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
  </div>
