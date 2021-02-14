
	</div>
	<footer class="footer">
		<div class="container c-footer">
			<div class="footer-social-media">
				<img src="images/facebook.png" alt="facebook icon">
				<img src="images/twitter.png" alt="twitter icon">
				<img src="images/instagram.png" alt="instagram icon">
				<img src="images/youtube.png" alt="youtube icon">
			</div>
			<div class="footer-info"><p>Antonio & Tiago™ 2021 ℗ All rights reserved</p></div>
		</div>
	</footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="js/functions.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		if ($('#cpf').length && $('#salario').length) {
			$('#cpf').mask('000.000.000-00', {reverse: true});
			$('#salario').mask('R$ 00.000,00', {reverse: true});
		}

		if (document.getElementById('categoria')) {
			document.getElementById('categoria').value = <?= @!isset($categoria) ? 0 : $categoria ;?>;
			$('#categoria').change();
		}

		showAfterMsg();
    });
</script>
</body>
</html>
