<?php include 'inc/header.php'; ?>
<link rel="stylesheet" href="<?="view/".$router."/style.css"; ?>">
<?php include "controller/".$router."/index.php"; ?>
<div class="content">
	<section class="view">
		<?php include "view/".$router."/index.php"; ?>
	</section>
</div>
<?php include 'inc/footer.php'; ?>
