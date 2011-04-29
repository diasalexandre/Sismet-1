<?php
	include "libchart/libchart/classes/libchart.php";

	header("Content-type: image/png");
	
	$chart = new LineChart();

	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("13h50",33.13));
	$serie1->addPoint(new Point("14h00",32.94));
	$serie1->addPoint(new Point("14h10",33.23));
	$serie1->addPoint(new Point("14h20",33.78));
	$serie1->addPoint(new Point("14h30",34.12));
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("Temperatura", $serie1);

	$chart->setDataSet($dataSet);

	$chart->setTitle("Dados Meteorologicos");
	$chart->getPlot()->setGraphCaptionRatio(0.7);
	
	$chart->render();
?>
	
