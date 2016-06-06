<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini
include '../classes/noticia.class.php';
include '../classes/portal.class.php';

//criacao de uma instancia do servidor (coloque o endereco na sua maquina local)
$server = new SoapServer(null, array('uri' => 'http://localhost/Portal-de-Noticias/webservice/'));  // ex.: http://localhost/soap/



//definicao dos métodos disponíveis para uso do servico ( vai retornar apenas a frase Hello World + parametro que receber + ! )

	  		function getSearch($palavraChave){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->search($palavraChave);

	  			return $noticias;
	  		}
	  		function getByPortalId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getByPortalId($id);
	  			
	  			return $resultado;
	  		}
	  		function getByNoticiaId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getById($id);

	  			return $resultado;
	  		}
	  		function getAllNoticias(){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->getAll();

	  			return $noticias;
	  		}
	  		function getAllPortais(){
	  			$portal = new Portal();
	  			$portais = $portal->getAll();
	  			return $portais;
	  		}

	  		

//registro do servico na instania
$server->addFunction("getSearch");
$server->addFunction("getByPortalId");
$server->addFunction("getByNoticiaId");
$server->addFunction("getAllNoticias");
$server->addFunction("getAllPortais");



// chamada do metodo para atender as requisicoes do servico
// se a chamada for um POST executa o método, caso contrario, apenas mostra a lista das funcoes disponiveis
if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$server->handle();

} else {
	$functions = $server->getFunctions();
	print "Métodos disponíveis no serviço:";
	print "<hr />";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
	
}
?>
