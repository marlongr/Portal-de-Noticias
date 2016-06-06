<?php 

include_once 'database.class.php';

class Portal{
	private $idPortal = "";
	public $nmPortal = "";
	public $site = "";
	public $email = "";


	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM portal ORDER BY nm_portal");
		$portais = array();
		while($resultado = $consulta->fetch()){
			$portais[] = $resultado;
		}			
		return $portais;
	}

	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}

	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO portal (nm_portal, site, email) VALUES (?, ?, ?)");
		$consulta->execute(array($this->nmPortal, $this->site, $this->email));

		return $resultado = $consulta->fetch();

		}

	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();

		$this->idPortal = $resultado['id_portal'];
		$this->nmPortal = $resultado['nm_portal'];
		$this->site = $resultado['site'];
		$this->email = $resultado['email'];	
	}

	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE portal SET nm_portal=?, site=?, email=? WHERE id_portal=?");
		$consulta->execute(array($this->nmPortal, $this->site, $this->email, $this->idPortal));

		return $resultado = $consulta->fetch();
		
		
	}

	public function delete($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("DELETE FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));

		return true;		
	}

	public static function getName($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT nm_portal FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();

		return $resultado[0];
	}
}

?>