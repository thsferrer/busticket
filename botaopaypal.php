<?php
	include "visao/cabec.php";
?>
<section class="introducao_botao">
	<div class="container">
			<div class="grid-4 intro_start">
				<h3></h3>			
			</div>
<form class="botao grid-8" action="https://www.paypal.com/cgi-bin/webscr" method="post">


	<h2 class="subtitulo">Compre com o PayPal!</h2>
				<p>Para finalizar a compra, clique no botão para fazer o pagamento.</p>
				<br>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="3ESE44UJKFE72">
<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
</form>

	
	<div class="grid-4 intro_end">
					<h3></h3>
		</div>
	</div>
</section>



</html>
<?php
	include "visao/rodape.html";
?>