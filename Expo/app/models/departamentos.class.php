<?php
class Departamento extends Validator{
	//Declaración de propiedades
	private $id = null;
    private $departamento = null;
    private $estado = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->id;
	}
	
	public function setDepartamento($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->departamento = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDepartamento(){
		return $this->departamento;
    }
    public function setEstado($value){
		if($this->validateVisibilidad($value)){
			$this->estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getEstado(){
		return $this->estado;
	}

	//Metodos para el manejo del CRUD
	public function searchDepartamentos($value){
		$sql = "SELECT id, departamento, estado FROM departamentos , estado WHERE departamento LIKE ?  AND estado = 0 ORDER BY departamento";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function getDepartamentos(){
		$sql = "SELECT id, departamento, estado  FROM departamentos WHERE estado = 0 ORDER BY departamento";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getDepartamentosNulas(){
		$sql = "SELECT id, departamento, estado  FROM departamentos WHERE estado = 1 ORDER BY departamento";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createDepartamentos(){
		$sql = "INSERT INTO departamentos(departamento, estado) VALUES(?, ?)";
		$params = array($this->departamento, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readDepartamentos(){
		$sql = "SELECT id, departamento, estado FROM departamentos WHERE id = ? AND estado = 0";
		$params = array($this->id);
		$departamentos = Database::getRow($sql, $params);
		if($departamentos){
			$this->id = $departamentos['id'];
			$this->departamento = $departamentos['departamento'];
			$this->estado = $departamentos['estado'];
			return true;
		}else{
			return null;
		}
	}
	public function readDepartamentosNulas(){
		$sql = "SELECT id, departamento, estado FROM departamentos WHERE id = ?  AND estado = 1";
		$params = array($this->id);
		$departamentos = Database::getRow($sql, $params);
		if($departamentos){
			$this->id = $departamentos['id'];
			$this->departamento = $departamentos['departamento'];
			$this->estado = $departamentos['estado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateDepartamentos(){
		$sql = "UPDATE departamentos SET departamento = ? WHERE id = ?";
		$params = array($this->departamento, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteDepartamentos(){
		$sql = "UPDATE departamentos SET estado = 1 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarDepartamentos(){
		$sql = "UPDATE departamentos SET estado = 0 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>