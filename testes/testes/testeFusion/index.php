<?php
include("PHPClass/Includes/FusionCharts_Gen.php");
include('../../define.php');
$maxBanco  = mysql_query("SELECT * FROM informacao_meteorologica ORDER BY id DESC LIMIT 140",$conexao);
while ($row[] = mysql_fetch_array($maxBanco, MYSQL_NUM)) 
	{
		$cont = $cont+1;
	}
$cont--;
for ($i=$cont;$i>=($cont-135);$i--)
	{
	
		$dadosdata[] = $row[$i][25];
		$dadostemp[] = $row[$i][2];
		$hora=	str_replace("00:00","",$row[$i][26]);
		$hora=	str_replace(":00","",$hora);
		$hora= str_replace(":","h",$hora);
		$datahora[] = $hora;
		
	}

?>

<html>
<head>
  <title>
    
  </title>

  <script language="Javascript" src="FusionCharts/FusionCharts.js"></script>
</head>

<body>

  <?php
  $FC = new FusionCharts("Line","1003","350");
  $FC->setSwfPath("FusionCharts/");
  $strParam="caption=Gráfico de Temperaturas;xAxisName=Horários;yAxisName=Temperatura;decimalPrecision=2;formatNumberScale=0;showValues=0;yaxisminvalue=24;numDivLines=3;";
  $FC->addColors("FF0000");
  $FC->setChartParams($strParam);
  for ($valor=0;$valor<=135;$valor++)
	{
		$FC->addChartData($dadostemp[$valor],"hoverText=Temperatura;y=2;");
	}

  $FC->renderChart();

  ?>

</body>
</html>
