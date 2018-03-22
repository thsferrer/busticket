<?php
	include "cabec.php";
?>
<script type="text/javascript">
function valida(){
		var nome = document.getElementById("nome");
		var email = document.getElementById("email");
		var senha = document.getElementById("senha");
		if(nome.value == ""){
			alert("Campo nome não preenchido!");
			return false;
		} 
		else if(email.value == ""){
			alert("Campo email não preenchido!");
			return false;
		} 
		else if(senha.value == ""){
			alert("Campo senha não preenchido!");
			return false;
		} 
		return true;
}
</script>
<section class="introducao_cadastro">
	<div class="container">

		<div class="grid-4 intro_start">
				<h3></h3>			
		</div>

		
		<form class="contato_form  grid-8" method="POST" action="#" id="CadastrarUsuario" onsubmit="return valida()">
		   <h2 class="subtitulo">Cadastro</h2>
		   <input type="hidden" name="id"/>
		 
			
				<label for="nome">Nome completo:</label>
				<input type="text" name="nome" id="nome"/>
			
			
				<label for="email">E-mail:</label>
				<input type="text" name="email" id="email"/>
			
			
				<label for="senha">Escolha uma senha:</label>
				<input type="password" name="senha" id="senha"/>
			
				<label for="cidade">Cidade:</label>
				<input type="text" name="cidade"/>
			
				<label for="endereco">Endereço (Rua número bairro):</label>
				<input type="text" name="logradouro"/>
			
				<label for="celular">Celular:</label>
				<input type="text" name="celular"/>
				<br>
				<input type="submit" name="cadastrar" value="Cadastrar-se"/> 
			
		</form>
		<div class="grid-4 intro_end">
				<h3></h3>
		</div>

	</div>
</section> 
<?php
	include "rodape.html";
?>