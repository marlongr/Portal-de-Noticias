<?php
    $client = new SoapClient(null, array(
		'location' => 'http://localhost/Portal-de-Noticias/webservice/webserviceserver.php',  // ex.: http://localhost/soap/server.php
		'uri' => 'http://localhost/Portal-de-Noticias/webservice/',  				// ex.: http://localhost/soap/
		'trace' => 1));

	// chamada do servico SOAP
	$result = $client->getAllPortais();

	// verifica erros na execucao do servico e exibe o resultado
	if (is_soap_fault($result)){
		trigger_error("SOAP Fault: (faultcode: {$result->faultcode},
		faultstring: {$result->faulstring})", E_ERROR);
	}else{
		print_r($result);
	}


?>
