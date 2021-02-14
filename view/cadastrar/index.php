<h1 class="title">Cadastrar Profissional</h1>
<form method="POST">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationServer01">Nome do profissional</label>
      <input type="text" class="form-control" name="nome" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>CPF</label>
      <input type="text" class="form-control" name="cpf" maxlength="11" required>
    </div>
    <div class="col-md-3 mb-3">
      <label>Salário</label>
      <input type="text" class="form-control" name="salario" required>
    </div>
    <div class="col-md-3 mb-3">
      <label>Categoria</label>
      <select class="custom-select" name="categoria" required>
        <?= $printCategories; ?>
      </select>
    </div>    
  </div>
  <button class="btn btn-primary" name="cadastrar" type="submit">Cadastrar</button>
</form>