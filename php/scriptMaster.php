<?php
// Definindo o tempo limite da aplicação
set_time_limit(0);
// Variável que guarda o endereço do servidor FTP
$endServidorFtp = "172.26.100.180";

// Efetuando conexão
$idConexao = ftp_connect($endServidorFtp);
// Verificação de conexão
	if(!$idConexao)
		{
		 $dh = date("d:m:Y");
		 $dh .= " ".date("G:i:s"); 
		 $logerror = fopen("/var/www/sismet/logerror.txt","a");
		 fwrite($logerror,"Erro de FTP ".$dh."\r\n");
		 fclose($logerror);
		 exit;
		}
	else
	{
	 // Autenticação de usuário FTP
	 $loginFtp = "diasalexandre";
	 $senhaFtp = "sismet";
	 $resultadoConexao = ftp_login($idConexao,$loginFtp,$senhaFtp);
	 if(!$resultadoConexao)
		 {
			 $dh = date("d:m:Y");
			 $dh .= " ".date("G:i:s"); 
			 $logerror = fopen("/var/www/sismet/logerror.txt","a");
			 fwrite($logerror,"Não conseguimos conectar ao servidor FTP :( ".$dh."\r\n");
			 fclose($logerror);
			 exit;
		 }
	 else
		 {
		   /* 
			$arquivoLocal -> caminho de conexão estático do servidor Local
			$bridge -> Ponte de conexão
			$arquivoServidor -> Guarda o nome do arquivo do servidor FTP
			$downloadArquivo ->Copia o conteúdo do arquivo remoto para ambiente local
		   */
		   $arquivoLocal = "/var/www/sismet/arquivosResgate/dados.dat";
		   $bridge = fopen($arquivoLocal, 'w');
		   $arquivoServidor ="CR3000_Baixa.dat";
		   $downloadArquivo = ftp_fget($idConexao,$bridge,$arquivoServidor, FTP_ASCII, 0);
		 }
	}
	//Inserindo o nome da Estação no banco de dados
	switch($endServidorFtp)
	{
		case "172.26.100.180":
			$remetente = "Estação EST";
			break;
	}
// Fecha conexão FTP
ftp_close($idConexao);
include('../define.php');

//Trazer o maior número de leitura do banco de dados
$maxBanco  = mysql_query("SELECT MAX(num_leitura) AS MAX_BD FROM informacao_meteorologica",$conexao);
$resultadoMaxBanco = mysql_fetch_array($maxBanco);

	if ($resultadoMaxBanco['MAX_BD']=='')
	{
		$maxRodada=0; 
	}
	else
	{
		$maxRodada= $resultadoMaxBanco['MAX_BD']; 
	}

	if (!$arquivoOpen = fopen($arquivoLocal, "r"))
		{
			 $dh = date("d:m:Y");
			 $dh .= " ".date("G:i:s"); 
			 $logerror = fopen("/var/www/sismet/logerror.txt","a");
			 fwrite($logerror,":( Problema na abertura do arquivo, por favor contate o administrador do sistema ".$dh."\r\n");
			 fclose($logerror);
			 exit;
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
		$contaExplode = (count($arrayDados));		
		//Guarda dados numa variável final para inserção
		for($i=0;$i<$contaExplode;$i++)
		{
			$arrayDadosFinal[] = explode(",",$arrayDados[$i]);
		}
		fclose($arquivoLocal);//Fecha o arquivo

		$contFinal = (count($arrayDadosFinal)-1);
		//Verifica se os valores já foram lidos
		for ($ini=$contFinal;$ini>0;$ini--)
		{
			if ($maxRodada==$arrayDadosFinal[$ini][1])
			{
				break;
			}
		}

			for ($i=($ini+1);$i<=$contFinal;$i++)
			{	
				$datahora[$i] = explode(" ",$arrayDadosFinal[$i][0]);
					if (($arrayDadosFinal[$i][1]!='') and ($arrayDadosFinal[$i][0]!='') and ($arrayDadosFinal[$i][3]!='') and ($arrayDadosFinal[$i][4]!='') and ($arrayDadosFinal[$i][5]!='') and ($arrayDadosFinal[$i][6]!='') and ($arrayDadosFinal[$i][7]!='') and ($arrayDadosFinal[$i][8]!='') and ($arrayDadosFinal[$i][9]!='') and ($arrayDadosFinal[$i][10]!='') and ($arrayDadosFinal[$i][11]!='') and ($arrayDadosFinal[$i][12]!='') and ($arrayDadosFinal[$i][13]!='') and ($arrayDadosFinal[$i][14]!='') and ($arrayDadosFinal[$i][15]!='') and ($arrayDadosFinal[$i][16]!='') and ($arrayDadosFinal[$i][17]!='') and ($arrayDadosFinal[$i][18]!='') and ($arrayDadosFinal[$i][19]!='') and ($arrayDadosFinal[$i][20]!='') and ($arrayDadosFinal[$i][21]!='') and ($arrayDadosFinal[$i][22]!='') and ($arrayDadosFinal[$i][23]!='') and ($arrayDadosFinal[$i][24]!='') and ($arrayDadosFinal[$i][25]!=''))
					{
						/*Variavel guardando a query para inserção no banco de dados*/
						$queryExec="INSERT INTO informacao_meteorologica VALUES ('".$arrayDadosFinal[$i][1]."','".$arrayDadosFinal[$i][2]."','".$arrayDadosFinal[$i][3]."','".$arrayDadosFinal[$i][4]."','".$arrayDadosFinal[$i][5]."','".$arrayDadosFinal[$i][6]."','".$arrayDadosFinal[$i][7]."','".$arrayDadosFinal[$i][8]."','".$arrayDadosFinal[$i][9]."','".$arrayDadosFinal[$i][10]."','".$arrayDadosFinal[$i][11]."','".$arrayDadosFinal[$i][12]."','".$arrayDadosFinal[$i][13]."','".$arrayDadosFinal[$i][14]."','".$arrayDadosFinal[$i][15]."','".$arrayDadosFinal[$i][16]."','".$arrayDadosFinal[$i][17]."','".$arrayDadosFinal[$i][18]."','".$arrayDadosFinal[$i][19]."','".$arrayDadosFinal[$i][20]."','".$arrayDadosFinal[$i][21]."','".$arrayDadosFinal[$i][22]."','".$arrayDadosFinal[$i][23]."','".$arrayDadosFinal[$i][24]."','".$arrayDadosFinal[$i][25]."',".$datahora[$i][0].'"'.",".'"'.$datahora[$i][1].",".$remetente.",NOW(), 'NULL')";

						/* Bloco de inserção no banco de dados */
						if (!mysql_query($queryExec,$conexao))
						  {
							 $dh = date("d:m:Y");
							 $dh .= " ".date("G:i:s"); 
							 $logerror = fopen("/var/www/sismet/logerror.txt","a");
							 fwrite($logerror,"Erro na gravacao do banco de dados ".$dh."\r\n");
							 fclose($logerror);
							 die('Error: ' . mysql_error()); //Se houver algum erro a conexão é paralisada
						  }

					}
					else
					{
						 $dh = date("d:m:Y");
						 $dh .= " ".date("G:i:s"); 
						 $logerror = fopen("/var/www/sismet/logerror.txt","a");
						 fwrite($logerror,"Erro em algum dado ".$dh."\r\n");
						 fclose($logerror);
						 exit;
					}	
			}
		


	}

?>





