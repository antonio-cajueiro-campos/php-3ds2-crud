
<h1 class="title">Consultar Categoria</h1>
<div class="row">
	<div class="col-md-6 mb-3">
		<form method="get">
			<input type="hidden" name="p" value="<?= $router; ?>" />
			<label>Selecione a categoria</label>
			<select class="custom-select" name="category" required>
				<?= $printCategories; ?>
			</select>
			<button type="submit" class="btn btn-outline-primary">Pesquisar</button>
		</form>
	</div>
</div>

<div class="col-6">Categorias: <?=$categoryName?> - Media: <?=$categoryMedia?></div>
<div class="row category-header">
	<div class="col-6">Nomes</div>
	<div class="col-6">Salários</div>
</div>

<ul class="list-group list-group-flush">
  <?= $printList; ?>
</ul>
