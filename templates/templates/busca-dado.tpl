{include file="../templates/default/topo.tpl"}
{literal}
<script type="text/javascript" src="{/literal}{$url}{literal}js/jquery.click-calendario-1.0-min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   Hoje = new Date();
    Data = Hoje.getDate();
    Dia = Hoje.getDay();
    Mes = Hoje.getMonth();
    Ano = Hoje.getFullYear();
    
    if(Data < 10) {
        Data = "0" + Data;
    }
    NomeDia = new Array(7)
    NomeDia[0] = "domingo"
    NomeDia[1] = "segunda-feira"
    NomeDia[2] = "terça-feira"
    NomeDia[3] = "quarta-feira"
    NomeDia[4] = "quinta-feira"
    NomeDia[5] = "sexta-feMesira"
    NomeDia[6] = "sábado"

    NomeMes = new Array(12)
    NomeMes[0] = "Janeiro"
    NomeMes[1] = "Fevereiro"
    NomeMes[2] = "Março"
    NomeMes[3] = "Abril"
    NomeMes[4] = "Maio"
    NomeMes[5] = "Junho"
    NomeMes[6] = "Julho"
    NomeMes[7] = "Agosto"
    NomeMes[8] = "Setembro"
    NomeMes[9] = "Outubro"
    NomeMes[10] = "Novembro"
    NomeMes[11] = "Dezembro"
    $("input#output").val(Data+" "+NomeMes[Mes]);
  });
  $('#data_1').focus(function(){
	$(this).calendario({
		target:'#data_1'
	});
});
</script>

{/literal}
	<input type="hidden" value="" id="output"/>
	<div id="formulario">
		<input type="text" name="data_1" id="data_1" size="10" maxlength="10"/>

        </div>

<br style="clear:both;" />
{include file="../templates/default/rodape.tpl"}
