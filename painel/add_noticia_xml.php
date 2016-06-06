<?php 

include '../classes/noticia.class.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");

	$doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  $doc->load('xml/noticias.xml');

  $noticias = $doc->getElementsByTagName( "noticia" );
  foreach( $noticias as $noticia )
  {
    $not = new Noticia();

    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;

    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;

    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;

    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;

    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 50);

    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;

    $not->save();

  }

  header('Location: importa_xml.php');
  
}else{
  header('Location: importa_xml.php');
}

 ?>