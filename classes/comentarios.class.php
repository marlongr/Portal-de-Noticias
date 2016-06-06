<?php 

include_once 'database.class.php';

class Comentarios{
	private $idComentario = "";
	public $idNoticia = "";
	public $comentario = "";
	public $email = "";

	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM comentarios");
		$comentarios = array();
		while($resultado = $consulta->fetch()){
			$comentarios[] = $resultado;
		}			
		return $comentarios;
	}

	public static function getByNoticiaIdAll($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM comentarios WHERE id_noticia=? ORDER BY id_comentario");
		$consulta->execute(array($id));
		$comentarios = array();
		while($resultado = $consulta->fetch()){
			$comentarios[] = $resultado;
		}			
		return $comentarios;	
	}

	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO comentarios (id_noticia, comentario, email) VALUES (?,?,?)");
		$consulta->execute(array($this->idNoticia, $this->comentario, $this->email));

		return $resultado = $consulta->fetch();	
	}

	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();	

		$this->idComentario = $resultado['id_comentario'];
		$this->idNoticia = $resultado['id_noticia'];
		$this->comentario = $resultado['comentario'];
		$this->email = $resultado['email'];
	}

	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE comentarios SET id_noticia=?, comentario=?, email=? WHERE id_comentario=?");
		$consulta->execute(array($this->idNoticia, $this->comentario, $this->email, $this->idComentario));

		return $resultado = $consulta->fetch();	
	}




}

?>