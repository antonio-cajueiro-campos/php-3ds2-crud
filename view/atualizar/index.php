
<h1 class="title">Atualizar Profissional</h1>

<?php if (isset($_GET['id']) && $_GET['id'] != "" && $isValid) { ?>

<form method="POST">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="nome">Nome do profissional</label>
      <input type="text" class="form-control" id="nome" name="nome" required value="<?= $nome ;?>">
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" required value="<?= $cpf ;?>">
    </div>
    <div class="col-md-3 mb-3">
      <label for="salario">Salário</label>
      <input type="text" class="form-control" id="salario" name="salario" required value="<?= $salario ;?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="categoria">Categoria</label>
      <select class="custom-select" id="categoria" name="categoria" required>
        <?= $printCategories; ?>
      </select>
    </div>    
  </div>
  <button class="btn btn-warning" name="atualizar" type="submit">Atualizar</button>
</form>

<?php } else { ?>
	<div class="error text-center">ID do profissional não encontrado</div>
<?php } ?>