<?php
class Grados extends Validator{
	//Declaracion de las variables a utilizar
	private $id= null;
	private $grado=null; 
    private $estado=null;
	//Elementos del id para ingresar
	public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el id
	public function getId(){
		return $this->id;
	}
    public function setEstado($value){ 
			$this->estado = $value;
			return true;  
	}
	//Funcion para recolectar el id
	public function getEstado(){
		return $this->estado;
	}
	//Elementos  para ingresar el nombre de la materia
	public function setGrado($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->grado= $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el nombre de la materia
	public function getGrado(){
		return $this->grado;
    }     
    //funciones para ejecutar las consultas 
	public function searchGradosAdmin($value){
		$sql = "SELECT id,grado FROM grados WHERE grado like  ? and estado=0"; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function searchGradosAdmin1($value){
		$sql = "SELECT id,grado FROM grados WHERE grado like  ? and estado=1"; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function getGradosAdmin(){
		$sql = "SELECT id,grado FROM grados where estado=0  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getGradosAdmin1(){
		$sql = "SELECT id,grado FROM grados where estado=1  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createGrados(){
		$sql ="INSERT INTO grados (grado) VALUES (?)";
		$params = array($this->grado);
		return Database::executeRow($sql, $params);
	}

	public function readGrados(){
		$sql = "SELECT grado FROM grados WHERE id = ?";
		$params = array($this->id);
		$album = Database::getRow($sql, $params);
		if($album){
			$this->grado = $album['grado']; 
			return true;
		}else{
			return null;
		}
	}

	public function updateGrados(){
		$sql = "UPDATE grados SET grado=? WHERE id = ?";
		$params = array($this->grado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarGrados(){
		$sql = "UPDATE grados SET estado=? WHERE id = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}


	public function deleteGrados(){
		$sql = "UPDATE grados SET estado=? WHERE id  = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	} 
} 
?>