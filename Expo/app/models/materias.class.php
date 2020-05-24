<?php
class Materias extends Validator{
	//Declaracion de las variables a utilizar
	private $id= null;
	private $materia=null; 
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
	public function setMateria($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->materia = $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el nombre de la materia
	public function getMateria(){
		return $this->materia;
    }     
    //funciones para ejecutar las consultas 
	public function searchMateriasAdmin($value){
		$sql = "SELECT id,materia FROM materias WHERE materia like  ? and estado=0 "; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function searchMateriasAdmin1($value){
		$sql = "SELECT id,materia FROM materias WHERE materia like  ? and estado=1 "; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function getMateriasAdmin(){
		$sql = "SELECT id,materia FROM materias where estado=0  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getMateriasAdmin1(){
		$sql = "SELECT id,materia FROM materias where estado=1  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createMateria(){
		$sql ="INSERT INTO materias (materia) VALUES (?)";
		$params = array($this->materia);
		return Database::executeRow($sql, $params);
	}

	public function readMaterias(){
		$sql = "SELECT materia FROM materias WHERE id = ?";
		$params = array($this->id);
		$album = Database::getRow($sql, $params);
		if($album){
			$this->materia = $album['materia']; 
			return true;
		}else{
			return null;
		}
	}

	public function updateMaterias(){
		$sql = "UPDATE materias SET materia=? WHERE id = ?";
		$params = array($this->materia, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarMaterias(){
		$sql = "UPDATE materias SET estado=? WHERE id = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}


	public function deleteMaterias(){
		$sql = "UPDATE materias SET estado= ? WHERE id  = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	} 
} 
?>