<?php 
include '../classes/portal.class.php';

if(isset($_GET['id'])){
	$portal = new Portal();

	$portal->delete($_GET['id']);

	header('Location: cadastro_portais.php');
}else{
	header('Location: cadastro_portais.php');
}

?>