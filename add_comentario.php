<?php 
include 'classes/comentarios.class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$comentario = new Comentarios();
	$comentario->idNoticia = $_POST['id_noticia'];
	$comentario->email = $_POST['email'];
	$comentario->comentario = $_POST['comentario'];
	$comentario->save();

	$url = "Location: noticia.php?id=".$_POST['id_noticia'];
	header($url);

}else{
	header('Location: index.php');
}

?>