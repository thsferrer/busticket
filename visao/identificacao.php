<?php
	include "cabec.php";
	$id="";
?>
<section class="introducao_login">
	<div class="container">

		<div class="grid-4 intro_start">
				<h3></h3>			
		</div>

		<form class="contato_form  grid-8" action="#"  method="POST" id="Identificacao">
			<h2 class="subtitulo">Identifique-se</h2>
			<input type="hidden" name="id"  value="<?php echo $id; ?>" />  
			
			<label for="email">e-Mail</label>
			<input type="text" name="email"/>
			
			
			<label for="senha">Senha</label>
			<input type="password" name="senha"/>			
				<br>
			<input class="botao botao-preto" type="submit" value="Enviar" name="Enviar"/>
			
		</form>

	<div class="grid-4 intro_end">
			<h3></h3>
	</div>

	</div>
</section> 
<?php
	include "rodape.html";
?>