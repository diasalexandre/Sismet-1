{include file="../templates/default/topo.tpl"}
	<div id="formulario">
		<form action="{$url}login.php" method="post" id="formulario-login">
			<h1>Área restrita</h1>
				<div class="form-txt">
					Email:
				</div>
				<div class="inputtxt">
					<input type="text" name="login" />
				</div>
				<div class="form-txt">
					Senha:
				</div>
				<div class="inputtxt">
					<input type="password" name="senha" />
				</div>
				<div class="form-txt"></div>
				<div class="inputtxt">
					<input type="submit" name="enviar" class="botao" value="Logar!"/>
					</div>
			</form>
</div>
<br style="clear:both;" />
{include file="../templates/default/rodape.tpl"}

