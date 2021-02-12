<?php include 'inc/header.php'; ?>
<?php include "controller/".$router; ?>
<div class="content">
	<section class="view">
		<?php include "view/".$router; ?>
	</section>	
</div>
<?php include 'inc/footer.php'; ?>
