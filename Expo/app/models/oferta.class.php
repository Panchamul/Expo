<?php
class Oferta extends Validator{
	//Declaracion de las variables a utilizar
	private $id= null;
    private $grado=null; 
    private $matricula=null;
    private $mensualidad=null;
    private $descripcion=null;
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
	public function setMatricula($value){
		if($this->validateAlphanumeric($value,1,10)){
			$this->matricula= $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el nombre de la materia
	public function getMatricula(){
		return $this->matricula;
    }
     //Elementos  para ingresar el nombre de la materia
	public function setMensualidad($value){
		if($this->validateAlphanumeric($value,1,10)){
			$this->mensualidad= $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el nombre de la materia
	public function getMensualidad(){
		return $this->mensualidad;
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
     //Elementos  para ingresar el nombre de la materia
	public function setDescripcion($value){
		if($this->validateAlphanumeric($value,1,250)){
			$this->descripcion= $value;
			return true;
		}else{
			return false;
		}
	}
	//Funcion para recolectar el nombre de la materia
	public function getDescripcion(){
		return $this->descripcion;
    }
    //funciones para ejecutar las consultas 
	public function searchOfertasAdmin($value){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados 
        WHERE oferta_academica.estado=0 and grados.id=oferta_academica.id_grado and grado like ?"; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function searchOfertasAdmin1($value){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados 
        WHERE oferta_academica.estado=1 and grados.id=oferta_academica.id_grado and grado like ?"; 
		$params = array("$value%");
		return Database::getRows($sql, $params);
	}
	public function getGrados(){
		$sql = "SELECT id ,grado FROM grados where not exists(select id_grado from oferta_academica where grados.id=oferta_academica.id_grado and oferta_academica.estado=0)";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getOfertasAdmin(){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados 
        WHERE oferta_academica.estado=0 and grados.id=oferta_academica.id_grado  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	} 
	public function getOfertasAdmin1(){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados WHERE oferta_academica.estado=1 and grados.id=oferta_academica.id_grado and not EXISTS(select
		 id_oferta from oferta_academica where oferta_academica.id_grado=grados.id and oferta_academica.estado=0)  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getGradosAdmin1(){
		$sql = "SELECT id,grado FROM grados where estado=1  ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getGrados1(){
		$sql = "SELECT id,grado FROM grados where id=(select id_grado from oferta_academica where id_oferta=?) ";
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function createOferta(){
		$sql ="INSERT INTO oferta_academica (matricula,mensualidad,id_grado,descripcion,estado) VALUES (?,?,?,?,?)";
		$params = array($this->matricula,$this->mensualidad,$this->grado,$this->descripcion,$this->estado);
		return Database::executeRow($sql, $params);
	}

	public function readOfertas(){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados 
        WHERE oferta_academica.estado=0 and grados.id=oferta_academica.id_grado and oferta_academica.id_oferta=?";
		$params = array($this->id);
		$album = Database::getRow($sql, $params);
		if($album){
			$this->grado = $album['grado']; 
			$this->matricula=$album['matricula'];
			$this->mensualidad=$album['mensualidad'];
			$this->descripcion=$album['descripcion'];
			return true;
		}else{
			return null;
		}
	}
	public function readOfertas1(){
		$sql = "SELECT id_oferta,matricula,mensualidad,grado,descripcion FROM oferta_academica,grados WHERE id_oferta=? and oferta_academica.estado=1 and grados.id=oferta_academica.id_grado
		 and not EXISTS(select id_oferta from oferta_academica where oferta_academica.id_grado=grados.id and oferta_academica.estado=0 )";
		$params = array($this->id);
		$album = Database::getRow($sql, $params);
		if($album){
			$this->grado = $album['grado']; 
			$this->matricula=$album['matricula'];
			$this->mensualidad=$album['mensualidad'];
			$this->descripcion=$album['descripcion'];
			return true;
		}else{
			return null;
		}
	}
	public function updateOfertas(){
		$sql = "UPDATE oferta_academica SET matricula=?,mensualidad=?,id_grado=?,descripcion=? WHERE id_oferta = ?";
		$params = array($this->matricula,$this->mensualidad,$this->grado,$this->descripcion, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarOfertas(){
		$sql = "UPDATE oferta_academica SET estado=? WHERE id_oferta = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}


	public function deleteOfertas(){
		$sql = "UPDATE oferta_academica SET estado=? WHERE id_oferta  = ?";
		$params = array($this->estado, $this->id);
		return Database::executeRow($sql, $params);
	} 
} 
?>