<? 
include ("phplot-5.3.1/phplot.php");
include('../../define.php');

//Trazer o maior número de leitura do banco de dados
$maxBanco  = mysql_query("SELECT * FROM informacao_meteorologica",$conexao);

while ($row[] = mysql_fetch_array($maxBanco, MYSQL_NUM)) {
	$cont = $cont+1;
}
$cont--;

$graph = new PHPlot(1203,700);
$graph->SetFileFormat("png");
$graph->SetDataType("linear-linear");

// Specify some data
$data = array(array($row[$cont-7][25],1,$row[$cont-7][2]),array($row[$cont-6][25],2,$row[$cont-6][2]),array($row[$cont-5][25],3,$row[$cont-5][2]),array($row[$cont-4][25],4,$row[$cont-4][2]),array($row[$cont-3][25],5,$row[$cont-3][2]),array($row[$cont-2][25],6,$row[$cont-2][2]),array($row[$cont-1][25],7,$row[$cont-1][2]),array($row[$cont][25],7,$row[$cont][2]));
$graph->SetDataValues($data);

//Specify plotting area details
$graph->SetPlotType("lines");
$graph->SetTitleFontSize("5");
$graph->SetTitle("Dados meteorologicos");
$graph->SetPlotAreaWorld(1,29,8,35);
$graph->SetPlotBgColor("white");
$graph->SetPlotBorderType("left");
$graph->SetBackgroundColor("white");

//Define the X axis
$graph->SetXLabel("Horarios");
$graph->SetHorizTickIncrement("1");

//Define the Y axis
$graph->SetYLabel("Temperatura");
$graph->SetVertTickIncrement("0.5");
$graph->SetPrecisionY("1");
$graph->SetLightGridColor("blue");
$graph->SetDataColors(array("red"),array("black"));

$array = $graph->DrawGraph();
echo "<pre>"; print_r($array); exit;
?>
