<?php 
include '../classes/noticia.class.php';

if(isset($_GET['id'])){
	$noticia = new Noticia();

	$noticia->delete($_GET['id']);

	header('Location: cadastro_noticias.php');
}else{
	header('Location: cadastro_noticias.php');
}

?>