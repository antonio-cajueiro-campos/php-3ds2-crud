<h1 class="title">Cadastrar Profissional</h1>
<form method="POST">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="nome">Nome do profissional</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="salario">Salário</label>
      <input type="text" class="form-control" id="salario" name="salario" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="categoria">Categoria</label>
      <select class="custom-select" id="categoria" name="categoria" required>
        <?= $printCategories; ?>
      </select>
    </div>    
  </div>
  <button class="btn btn-primary" name="cadastrar" type="submit">Cadastrar</button>
</form>