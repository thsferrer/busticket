<?php
	include "visao/cabec.php";
?>
<script type="text/javascript">
function valida(){
		var rota = document.getElementById("rota");
		var data = document.getElementById("data");
		var horario = document.getElementById("horario");
		var quantidade = document.getElementById("quantidade");
		if(rota.value == ""){
			alert("Campo rota não preenchido!");
			return false;
		} 
		else if(data.value == ""){
			alert("Campo data não preenchido!");
			return false;
		} 
		else if(horario.value == ""){
			alert("Campo hora não preenchido!");
			return false;
		} 
		else if(quantidade.value == "") {
			alert("Campo quantidade não preenchido!");
			return false;
		} 
		return true;
}
</script>
<section class="introducao_compra">
	<div class="container">

		<div class="grid-4 intro_start">
				<h3></h3>			
		</div>
		<form class="contato_form  grid-8" action="index.php?controle=relatorioControle&metodo=inserirpassagem"  method="POST" id="passagem" onsubmit="return valida()">
			<h2 class="subtitulo">Compra</h2>
			<p>
			<label>Rota</label>
			<input type="hidden" name="idpassagem" id="idpassagem" value="<?php echo $id; ?>" />
			<br/><select name="rota" id="rota">
			<option value="">Escolha a Rota</option>
			<?php
				if(count($retorno) > 0)
				{
					foreach($retorno as $cont)
					{
						echo "<option value='{$cont->idrota}'>{$cont->origem_destino}</option>";
					}
				}
			?>
			</select>
			</p>

			<p>
			<label>Data</label>
			<span class="carregando">Aguarde, carregando...</span>
			<br/><select name="data" id="data">
				<option value="">Escolha a Data</option>
			</select>			
			</p>

			<p>
			<label>Horário</label>
			<span class="carregando">Aguarde, carregando...</span>
			<br/><select name="horario" id="horario">
				<option value="">Escolha o Horário</option>
			</select>		
			</p>
			
			<p>			
			<label>Quantidade</label>
			<br/><input type="number" name="quantidade" id="quantidade" min="1"  onblur="calculartotal()"/>
			</p>					
			
			<p>
			<label>Valor de cada passagem:</label>
			<span class="carregando">Aguarde, carregando...</span>
			<br/><p name="valor" id="valor"></p>
			</p>
			
			<p>			
			<label>Total</label>
			<br/><input type="textarea" id="total" name="total" style="width:80px" disabled='disabled'/>
			</p>
			<br>
			<p>
			<input class = "botao" type="submit" value="Confirmar" name="confirmar"/>
			</p>

		</form>
	
	<div class="grid-4 intro_end">
			<h3></h3>
	</div>

	</div>
</section> 
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#rota').change(function(){
				if( $(this).val() ) {
					$('#data').hide();
					$('.carregando').show();
					$.getJSON('buscarData.php?search=',{idrota: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Data</option>';	
						for (var i = 0; i < j.length; i++) {
							data = j[i].datap.split("-");
							data = data[2] + "/" + data[1] + "/" + data[0];
							options += '<option value="' + j[i].iddata + '">' + data + '</option>';
						}	
						$('#data').html(options).show();
						$('.carregando').hide();
						console:j;
					});
				} else {
					$('#data').html('<option value="">Escolha Data</option>');
				}
			});
		});
		$(function horario(){
			$('#data').change(function(){
				if( $(this).val() ) {
					$('#horario').hide();
					$('.carregando').show();
					$.getJSON('buscarHora.php?search=',{iddata: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Horário</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].idhora + '">' + j[i].horario + '</option>';
						}	
						$('#horario').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#horario').html('<option value="">Escolha o Horário</option>');
				}
			});
		});
		
		/*options += '<input type="text" value="' + j[i].valor + '" onchange="multi();" readonly="readonly"/>';*/
		
		$(function valor(){
			$('#rota').change(function(){
				if( $(this).val() ) {
					$('#valor').hide();
					$('.carregando').show();
					$.getJSON('buscarValor.php?search=',{idrota: $(this).val(), ajax: 'true'}, function(j){
						var options = '';
						var total = 0;
						for (var i = 0; i < j.length; i++) {							
							options += "<input  id='valor1' value='" + j[i].valor + "' name='valor1' />";
						}
						$('#valor').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#valor').html('<p value="">Valor</p>');
				}
			});
		});
		
		function calculartotal(){
			var total = document.getElementById("quantidade").value * document.getElementById("valor1").value;
			document.getElementById("total").value = total.toFixed(2).replace(".",",");
		}
	</script>


<?php
	include "visao/rodape.html";
?>