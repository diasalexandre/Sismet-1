<?php
include('libs/Smarty.class.php');

$conexao = mysql_pconnect('localhost', 'root', 'senhamaster');
	if (!$conexao)
	{
		echo "Infelizmente não conseguimos conectar ao Banco de dados, volte mais tarde";
		exit;
	}

$banco = mysql_select_db('sismet', $conexao);
	if(!$banco)
	{
		echo "Há algum problema no banco de dados escolhido";
		exit;
	}

$smarty = new Smarty;

if (ereg("localhost",$_SERVER['SERVER_NAME']))
	{
		$url = 'http://localhost/sismet/';
	}
	else
	{	
		$url = 'http://www.sismet.org.br/';
	}
$smarty->assign('url',$url);


?>
