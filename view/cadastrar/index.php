<h1 class="title">Cadastrar Profissional</h1>
<form>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control" id="validationServer01" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">CPF</label>
      <input type="text" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Salário</label>
      <input type="number" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">Categoria</label>
      <select class="custom-select" id="validationServer04" aria-describedby="validationServer04Feedback" required>
        <?= $printCategories; ?>
      </select>
    </div>    
  </div>
  <button class="btn btn-primary" type="submit">Cadastrar</button>
</form>