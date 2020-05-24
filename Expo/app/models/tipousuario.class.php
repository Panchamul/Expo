<?php
class Tipousuario extends Validator{
	//Declaración de propiedades
    private $id = null;
    private $id_permiso = null; 
	private $id_tipo=null;
    private $tipo=null;
	private $permiso=null;
	private $usuario=null;
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
		public function setUsuario($value){
			if($this->validateId($value)){
				$this->usuario = $value;
				return true;
			}else{
				return false;
			}
		}
		public function getUsuario(){
			return $this->usuario;
			}
		public function setPermiso($value){
			if($this->validateAlphanumeric($value, 1, 50)){
				$this->tipo = $value;
				return true;
			}else{
				return false;
			}
			}
			public function getPermiso(){
			return $this->tipo;
			}
    public function setTipo($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->tipo = $value;
			return true;
		}else{
			return false;
		}
    }
    public function getTipo(){
		return $this->tipo;
    }
    public function setIdPermiso($value){
		if($this->validateId($value)){
			$this->id_permiso = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getIdPermiso(){
		return $this->id_permiso;
    }
    public function setIdTipo($value){
		if($this->validateId($value)){
			$this->id_tipo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getIdTipo(){
		return $this->id_tipo;
    }
    public function getTipousuarios(){
		$sql = "SELECT id_tipo,tipo from tipo_usuario ORDER BY tipo";
		$params = array(null);
		return Database::getRows($sql, $params);
	}


	public function getTipos(){
		$sql = "SELECT detalle_permisos.id_permiso as permis, permisos.permiso FROM permisos, detalle_permisos, tipo_usuario WHERE tipo_usuario.id_tipo= detalle_permisos.id_tipo
		AND permisos.id_permiso = detalle_permisos.id_permiso
		AND tipo_usuario.id_tipo = ? 
		GROUP BY permis, permiso";
		$params = array($this->id_tipo);
		return Database::getRows($sql, $params);
	}
	public function getTipos1(){
		$sql = "SELECT detalle_permisos.id_permiso as permis,detalle_permisos.id_detalle as detalle FROM permisos, detalle_permisos, tipo_usuario WHERE tipo_usuario.id_tipo= detalle_permisos.id_tipo
		AND permisos.id_permiso = detalle_permisos.id_permiso
		AND tipo_usuario.id_tipo = ? 
		GROUP BY permis";
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}
	public function getTipor(){
		$sql = "SELECT id_permiso,permiso FROM permisos";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
		
		public function readTipo(){
			$sql = "SELECT  tipo from tipo_usuario where id_tipo=? ";
			$params = array($this->id);
			$categoria = Database::getRow($sql, $params);
			if($categoria){ 
				$this->tipo = $categoria['tipo']; 
				return true;
			}else{
				return null;
			}
		}
		public function searchTipos($value){
			$sql = "SELECT id_tipo,tipo From tipo_usuario WHERE tipo LIKE ?   ORDER BY tipo";
			$params = array("$value%");
			return Database::getRows($sql, $params);
		}
		public function searchMaxTipos(){
			$sql = "SELECT MAX(id_tipo) as maximo  From tipo_usuario "; 
			$params=array(null);
			$data= Database::getRow($sql,$params);
			if($data)
			{
				$this->id_tipo=$data['maximo'];
				return true;
			}
			else{
				return null;
			}
		}
		public function deletePermisos1(){
			$sql = "DELETE FROM detalle_permisos WHERE id_detalle=?";
			$params = array($this->tipo);
			return Database::executeRow($sql, $params);
		}
		public function deletePermisos(){
			$sql = "DELETE FROM detalle_permisos WHERE id_tipo = ?";
			$params = array($this->id);
			return Database::executeRow($sql, $params);
		}
		public function deleteTipo(){
			$sql = "DELETE FROM tipo_usuario WHERE id_tipo = ?";
			$params = array($this->id);
			return Database::executeRow($sql, $params);
		}
		public function updateDetallepermisos(){
			$sql = "UPDATE detalle_permisos SET id_permiso= ?  WHERE id_tipo=? and id_detalle=?";
			$params = array($this->id_permiso,$this->id_tipo, $this->id);
			return Database::executeRow($sql, $params);
		} 
		public function updateTipo(){
			$sql = "UPDATE tipo_usuario SET tipo=?  WHERE id_tipo=?  ";
			$params = array($this->tipo,$this->id_tipo);
			return Database::executeRow($sql, $params);
		} 
		public function getPermisosAsignados(){
			$sql = "SELECT detalle_permisos.id_permiso from detalle_permisos inner join administrador on administrador.id_tipo=detalle_permisos.id_tipo and administrador.id_admin=?";
			$params = array($this->usuario);
			return Database::executeRow($sql, $params);
		}
		public function createDetallepermisos(){ 
			$sql = "INSERT INTO detalle_permisos(id_tipo,id_permiso) VALUES(?,?)";
			$params = array($this->id_tipo,$this->id_permiso);
			return Database::executeRow($sql, $params);
		} 
		public function createTipos(){ 
			$sql = "INSERT INTO tipo_usuario(id_tipo,tipo) VALUES(?,?)";
			$params = array($this->id_tipo,$this->tipo);
			return Database::executeRow($sql, $params);
		} 
		public function checkPermiso(){
			$sql = "SELECT id_detalle from detalle_permisos where id_permiso=? and id_tipo=? ";
			$params = array($this->id_permiso,$this->id_tipo);
			$data = Database::getRow($sql, $params);
			if($data){
				$this->id = $data['id_detalle'];    
				return true;
			}else{
				return false;
			} 
		} 
 
}
    ?>