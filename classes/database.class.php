<?php

class Database{
	private $database = "portalnoticias";
	private $user = "postgres";
	private $pass = "postgres";
	public  $db = '';
	
	function __construct(){
		try {
		    return $this->db = new PDO("pgsql:host=127.0.0.1 dbname={$this->database} user={$this->user} password={$this->pass}");
		} catch (PDOException $e) {
		    print $e->getMessage();
		}
	}

}