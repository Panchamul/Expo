<?php
class Zona extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
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
	
	public function setZona($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getZona(){
		return $this->nombre;
	}

	//ingresar el estado
        public function setEstado($value){
            if($this->validateVisibilidad($value)){
                $this->estado = $value;
                return true;
            }else{
                return false;
            }
        }
        //recibir el estado
        public function getEstado(){
            return $this->estado;
        }

	//Metodos para el manejo del CRUD
	public function getZonas(){
		$sql = "SELECT id, nombre  FROM zona WHERE estado = 0 ORDER BY nombre ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getZonasNulas(){
		$sql = "SELECT id, nombre  FROM zona WHERE estado = 1 ORDER BY nombre ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchZonas($value){
		$sql = "SELECT  id, nombre FROM zona WHERE  estado = 0 AND nombre LIKE ? ORDER BY nombre";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createZonas(){
		$sql = "INSERT INTO zona(nombre, estado) VALUES(?,?)";
		$params = array($this->nombre, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readZonas(){
		$sql = "SELECT id, nombre  FROM zona WHERE id = ? AND estado = 0";
		$params = array($this->id);
		$zonas = Database::getRow($sql, $params);
		if($zonas){
			$this->id = $zonas['id'];
			$this->nombre = $zonas['nombre'];
			return true;
		}else{
			return null;
		}
	}
	public function readZonasNulas(){
		$sql = "SELECT id, nombre  FROM zona WHERE id = ? AND estado = 1";
		$params = array($this->id);
		$zonas = Database::getRow($sql, $params);
		if($zonas){
			$this->id = $zonas['id'];
			$this->nombre = $zonas['nombre'];
			return true;
		}else{
			return null;
		}
	}
	public function updateZonas(){
		$sql = "UPDATE zona SET nombre = ? WHERE id = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteZonas(){
		$sql = "UPDATE zona SET estado = 1 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
	public function habilitarZonas(){
		$sql = "UPDATE zona SET estado = 0 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>