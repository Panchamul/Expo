<?php
class Municipio extends Validator{
	//Declaración de propiedades
	private $id = null;
    private $municipio = null;
    private $estado = null;
    private $departamento = null;

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
	
	public function setMunicipio($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->municipio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getMunicipio(){
		return $this->municipio;
    }
    public function setEstado($value){
		$this->estado = $value;
			return true;
		
	}
	public function getEstado(){
		return $this->estado;
	}
    public function setDepartamento($value){
		if($this->validateId($value)){
			$this->departamento = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDepartamento(){
		return $this->departamento;
	}

	//Metodos para el manejo del CRUD
	public function getMunicipios(){
		$sql = "SELECT  municipios.id, departamentos.id AS idDep, municipio, municipios.estado, departamento FROM municipios, departamentos  WHERE municipios.estado= 0 AND municipios.id_departamento= ? AND departamentos.id = municipios.id_departamento ORDER BY municipio";
		$params = array($this->departamento);
		return Database::getRows($sql, $params);
	}
	public function getMunicipiosNulas(){
		$sql = "SELECT  municipios.id, municipio, municipios.estado, departamento FROM municipios, departamentos  WHERE municipios.estado= 1 AND municipios.id_departamento= ? AND departamentos.id = municipios.id_departamento ORDER BY municipio";
		$params = array($this->departamento);
		return Database::getRows($sql, $params);
	}
	public function searchMunicipios($value){
		$sql = "SELECT  municipios.id, municipio, municipios.estado, departamento FROM municipios, departamentos  WHERE municipios.estado= 0 AND municipios.id_departamento= ? AND municipios LIKE ? AND departamentos.id = municipios.id_departamento ORDER BY municipio ";
		$params = array($this->departamento,"%$value%");
		return Database::getRows($sql, $params);
	}
	public function createMunicipios(){
		$sql = "INSERT INTO municipios(municipio, estado, id_departamento) VALUES(?, ?, ?)";
		$params = array($this->municipio, $this->estado, $this->departamento);
		return Database::executeRow($sql, $params);
	}
	public function readMunicipios(){
		$sql = "SELECT  municipios.id, municipio, municipios.estado, departamento FROM municipios, departamentos  WHERE municipios.estado= 0 AND departamentos.id = municipios.id_departamento AND municipios.id = ? ORDER BY municipio";
		$params = array($this->id);
		$municipios = Database::getRow($sql, $params);
		if($municipios){
			$this->municipio = $municipios['municipio'];
			$this->estado = $municipios['estado'];
			$this->departamento = $municipios['departamento'];
			return true;
		}else{
			return null;
		}
	}
	public function readMunicipiosNulas(){
		$sql = "SELECT  municipios.id, departamentos.id AS idDep, municipio, municipios.estado, departamento FROM municipios, departamentos  WHERE municipios.estado= 1 AND departamentos.id = municipios.id_departamento AND municipios.id = ? ORDER BY municipio";
		$params = array($this->id);
		$municipios = Database::getRow($sql, $params);
		if($municipios){
			$this->municipio = $municipios['municipio'];
			$this->estado = $municipios['estado'];
			$this->departamento = $municipios['idDep'];
			return true;
		}else{
			return null;
		}
	}
	public function updateMunicipios(){
		$sql = "UPDATE municipios SET municipio = ?, id_departamento = ? WHERE id = ?";
		$params = array($this->municipio, $this->departamento, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteMunicipios(){
		$sql = "UPDATE municipios SET estado = 1 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarMunicipios(){
		$sql = "UPDATE municipios SET estado = 0 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>