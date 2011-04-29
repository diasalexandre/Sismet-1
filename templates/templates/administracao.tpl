{include file="../templates/default/topo.tpl"}
	<div id="formulario">

	<table width="98%">
		<tr style="background-color:#ccc; height:30px;">
			<td>Nome</td>	
			<td>Login</td>	
		</tr>
		{section name=valor loop=$nome}
		<tr style="height:30px;">
			<td>{$nome[valor]}</td>	
			<td>{$login[valor]}</td>	
		</tr>
		{/section}
	</table>
        </div>
<br style="clear:both;" />
{include file="../templates/default/rodape.tpl"}
