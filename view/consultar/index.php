
<h1 class="title">Consultar Categoria</h1>
<div class="row">
	<div class="col-md-12 mb-3 text-center">
		<form method="get">
			<input type="hidden" name="p" value="<?= $router; ?>" />
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<select class="custom-select" name="category" required>
						<?= $printCategories; ?>
					</select>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-outline-primary">Pesquisar</button>
				</div>
				<div class="col-md-3"></div>
			</div>
		</form>
	</div>
</div>

<?php if (isset($_GET['category'])) { ?>
	<div class="row">
		<div class="col text-center"><?=$categoryName?> - Media: <?=$categoryMedia?></div>
	</div>
	<?php if ($printList != "") { ?>
		<div class="row category-header">
			<div class="col-6">Profissionais:</div>
			<div class="col-6">Salários:</div>
		</div>
		<div class="row">
			<div class="col">
				<ul class="list-group list-group-flush">
					<?= $printList; ?>
				</ul>
			</div>
		</div>
	<?php } else { ?>
	<div class="warning text-center">Nenhum profissional encontrado nesta área</div>
<?php }} ?>