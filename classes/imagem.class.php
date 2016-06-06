<?php

include_once 'database.class.php';

class Imagem{
	private $idImage = "";
	public $idNoticia = "";
	public $imagem = "";
	public $destaque = "";

	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO imagens (id_noticia, imagem, destaque) VALUES (?, ?, ?)");
		$consulta->execute(array($this->idNoticia, $this->imagem, $this->destaque));

		return $resultado = $consulta->fetch();
	}

	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM imagens WHERE id_imagem=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();
	}

	public function update(){

	}

	public function getAll($idNoticia){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM imagens WHERE id_noticia=?");
		$consulta->execute(array($idNoticia));
		$imagens = array();
		while ($resultado = $consulta->fetch()) {
			$imagens[] = $resultado;
		}
		return $imagens;

	}


}

?>