<?php
include('../define.php');


//Trazer o maior número de leitura do banco de dados
$maxBanco  = mysql_query("SELECT MAX(num_leitura) AS MAX_BD FROM informacao_meteorologica",$conexao);
$resultadoMaxBanco = mysql_fetch_array($maxBanco);
$maxRodada= $resultadoMaxBanco['MAX_BD']; 

//Verificação de extensão de arquivo e executar a mudança para arquivo txt
	if ($_FILES['arquivo']['type']== "application/ontec-stream")
	{
		rename($_FILES['arquivo']['name'], "arquivo.txt");
	}	

$ponteiroArquivo = $_FILES['arquivo'];

define(ARQUIVOS_UPADOS, "/var/www/sismet/arquivos"); //variavel que guarda localmente o arquivo para trabalho
	//transferindo para uma base local (lado sistema) o arquivo para trabalho do mesmo
	if (isset($ponteiroArquivo['name']))
	{
		$temp_name = $ponteiroArquivo['tmp_name'];
		$arquivoLocal = ARQUIVOS_UPADOS.$ponteiroArquivo['name'];
		if (!is_uploaded_file($temp_name) || !move_uploaded_file($temp_name, $arquivoLocal))
			{
				echo "Falha no upload de arquivo, por favor tente novamente, se o problema persistir contate o administrador do sistema";
				$dh = date("d:m:Y");
				$dh .= " ".date("G:H:s"); 
				$logerror = fopen("/var/www/sismet/logerror.txt","w");
				fwrite($logerror,"Erro de FTP".$dh."");
				fclose($logerror);
			}
	}
	
	if (!$arquivoOpen = fopen($arquivoLocal, "r"))
		{
			echo ":( Problema na abertura do arquivo, por favor contate o administrador do sistema"; exit;
		}
	else 
	{
		//Divide o arquivo em um array simplificado e deixa de trabalhar com o arquivo de fato
		while(!feof($arquivoOpen))
		{
			$linhaArquivo = (fgets($arquivoOpen,255));		
			$arrayLinhas[]=$linhaArquivo;
		}
		$contadorTotal = (count($linhaArquivo)-2);
		$arrayDados = array_slice($arrayLinhas,5,$contadorTotal);
		$contaExplode = (count($arrayDados)-1);		
		//Guarda dados numa variável final para inserção
		for($i=0;$i<$contaExplode;$i++)
		{
			$arrayDadosFinal[] = explode(",",$arrayDados[$i]);
		}
		fclose($arquivoLocal);//Fecha o arquivo

		$contFinal = (count($arrayDadosFinal)-1);

		//Verifica se os valores já foram lidos
			for ($i=0;$i<=$contFinal;$i++)
			{	$datahora[$i]=explode(" ",$arrayDadosFinal[$i][0]);

					if (($arrayDadosFinal[$i][1]!='') and ($arrayDadosFinal[$i][0]!='') and ($arrayDadosFinal[$i][3]!='') and ($arrayDadosFinal[$i][4]!='') and ($arrayDadosFinal[$i][5]!='') and ($arrayDadosFinal[$i][6]!='') and ($arrayDadosFinal[$i][7]!='') and ($arrayDadosFinal[$i][8]!='') and ($arrayDadosFinal[$i][9]!='') and ($arrayDadosFinal[$i][10]!='') and ($arrayDadosFinal[$i][11]!='') and ($arrayDadosFinal[$i][12]!='') and ($arrayDadosFinal[$i][13]!='') and ($arrayDadosFinal[$i][14]!='') and ($arrayDadosFinal[$i][15]!='') and ($arrayDadosFinal[$i][16]!='') and ($arrayDadosFinal[$i][17]!='') and ($arrayDadosFinal[$i][18]!='') and ($arrayDadosFinal[$i][19]!='') and ($arrayDadosFinal[$i][20]!='') and ($arrayDadosFinal[$i][21]!='') and ($arrayDadosFinal[$i][22]!='') and ($arrayDadosFinal[$i][23]!='') and ($arrayDadosFinal[$i][24]!='') and ($arrayDadosFinal[$i][25]!=''))
					{
						/*Variavel guardando a query para inserção no banco de dados*/
						$queryExec="INSERT INTO informacao_meteorologica VALUES ('".$arrayDadosFinal[$i][1]."','".$arrayDadosFinal[$i][2]."','".$arrayDadosFinal[$i][3]."','".$arrayDadosFinal[$i][4]."','".$arrayDadosFinal[$i][5]."','".$arrayDadosFinal[$i][6]."','".$arrayDadosFinal[$i][7]."','".$arrayDadosFinal[$i][8]."','".$arrayDadosFinal[$i][9]."','".$arrayDadosFinal[$i][10]."','".$arrayDadosFinal[$i][11]."','".$arrayDadosFinal[$i][12]."','".$arrayDadosFinal[$i][13]."','".$arrayDadosFinal[$i][14]."','".$arrayDadosFinal[$i][15]."','".$arrayDadosFinal[$i][16]."','".$arrayDadosFinal[$i][17]."','".$arrayDadosFinal[$i][18]."','".$arrayDadosFinal[$i][19]."','".$arrayDadosFinal[$i][20]."','".$arrayDadosFinal[$i][21]."','".$arrayDadosFinal[$i][22]."','".$arrayDadosFinal[$i][23]."','".$arrayDadosFinal[$i][24]."','".$arrayDadosFinal[$i][25]."',".$datahora[$i][0].'"'.",".'"'.$datahora[$i][1].",'EST',NOW(), 'NULL')";
echo "<pre>"; print_r($queryExec);
						/* Bloco de inserção no banco de dados */
						if (!mysql_query($queryExec,$conexao))
						  {
						  	die('Error: ' . mysql_error()); //Se houver algum erro a conexão é paralisada
						  }

					}	
			}
		


}
	
?>
