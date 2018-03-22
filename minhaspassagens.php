<?php
  include "visao/cabec.php";
?>
<section class="introducao_passagens">
	<div class="container">

		<div class="grid-4 intro_start">
						
		</div>

		
		
		<form class="table grid-8" method="POST" action="#" id="ListaPassagens">
		<h2 class="subtitulo">Passagens</h2>
		  
		   <br/>
		   <input type="hidden" name="id" />
			<br/>
			<table class="table-responsive" >
			 <tbody>
			    <?php
					//var_dump ($ret);
						if (count($ret) > 0)
						{
							foreach($ret as $cont)
							{
								echo "<tr>";
							echo "<td><a id='a1' href='index.php?controle=relatorioControle&metodo=passagem&id={$cont->idpassagem}'>Data: {$cont->data} Rota: {$cont->origem_destino}</a></td>";
								echo "</tr>";
							}
						}
						else
							echo "<script> alert('Você ainda não comprou nenhuma passagem.');</script>";
					?>
		  </tbody>
	    </table>
	</form>
	    <div class="grid-4 intro_end">
				<h3></h3>
		</div>
	</div>

	</section> 
<?php
  include "visao/rodape.html";
?>
  