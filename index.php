<?php include 'inc/header.php'; ?>
<link rel="stylesheet" href="<?php if ($router != "../php/errors/404/") echo "view/".$router."/style.css"; ?>">
<?php if ($router != "../php/errors/404/") include "controller/".$router."/index.php"; ?>
<div class="content">
	<section class="view">
		<?php include "view/".$router."/index.php"; ?>
	</section>
</div>
<?php include 'inc/footer.php'; ?>
