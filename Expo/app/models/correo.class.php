<?php 
class Correo extends Validator{
    //Declaro las variables que utilizare
    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $codigo = null;
    private $count = null;
    private $contrasenia = null;

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

    public function getCount(){
		return $this->count;
    }

    public function setNombre($value){
        if($this->validateAlphabetic($value, 1, 17)){
            $this->nombre = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setContra($value){
        if($this->validar_clave($value)){
            $this->contrasenia = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getContra(){
        return $this->contrasenia;
    }

    public function setCodigo($value){
        if($this->validateAlphanumeric($value, 1, 300)){
            $this->codigo = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCorreo($value){
        if($this->validateEmail($value, 1, 300)){
            $this->correo = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function readCorreoUsuarios($value){
		$sql = "SELECT COUNT(*)AS count FROM alumnos WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['count']; 
			return true;
		}else{
			return null;
		}
    }

    public function readCodigoUsuarios($value){
		$sql = "SELECT codigo, nombre, id FROM alumnos WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
            $this->codigo= $correos['codigo']; 
            $this->nombre= $correos['nombre']; 
            $this->id= $correos['id']; 
			return true;
		}else{
			return null;
		}
    }
    
    public function updateCodigo(){
		$sql = "UPDATE `alumnos` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	}

    public function updateContra(){
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = "UPDATE alumnos SET contrasenia = ? WHERE id = ?";
		$params = array($hash,$this->id);
		return Database::executeRow($sql, $params);
    } 
    
    public function estadoPublico(){
		$sql = "UPDATE alumnos SET estado = 0 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
    } 
    



















    public function readCorreoUsuariosPublic($value){
		$sql = "SELECT COUNT(*)AS count FROM alumnos WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['count']; 
			return true;
		}else{
			return null;
		}
    }

    public function readCodigoUsuariosPublic($value){
		$sql = "SELECT codigo, nombre, id FROM alumnos WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
            $this->codigo= $correos['codigo']; 
            $this->nombre= $correos['nombre']; 
            $this->id= $correos['id']; 
			return true;
		}else{
			return null;
		}   
    }
    
    public function updateCodigoPublic(){
		$sql = "UPDATE `alumnos` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	}

    public function updateContraPublic(){
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = "UPDATE alumnos SET contrasenia = ? WHERE id = ?";
		$params = array($hash,$this->id);
		return Database::executeRow($sql, $params);
    } 
    













































    public function readCorreoMaestro($value){
		$sql = "SELECT COUNT(*)AS count FROM maestros WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['count']; 
			return true;
		}else{
			return null;
		}
    }

    public function readCodigoMaestro($value){
		$sql = "SELECT codigo, nombre, id FROM maestros WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
            $this->codigo= $correos['codigo']; 
            $this->nombre= $correos['nombre']; 
            $this->id= $correos['id']; 
			return true;
		}else{
			return null;
		}   
    }
    
    public function updateCodigoMaestro(){
		$sql = "UPDATE `maestros` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	}

    public function updateContraMaestro(){
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = "UPDATE maestros SET contrasenia = ? WHERE id = ?";
		$params = array($hash,$this->id);
		return Database::executeRow($sql, $params);
	} 
	public function estadoMaster(){
		$sql = "UPDATE maestros SET  bloqueo = 0 WHERE id = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}








	public function readCorreoAdmin($value){
		$sql = "SELECT COUNT(*)AS count FROM usuarios WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['count']; 
			return true;
		}else{
			return null;
		}
	}
	public function readCorreoAdminfff($value){
		$sql = "SELECT correo from alumnos where id = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['correo']; 
			return true;
		}else{
			return null;
		}
    }
    	public function readCorreoAdminff($value){
		$sql = "SELECT correo from maestros where id = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['correo']; 
			return true;
		}else{
			return null;
		}
    }
    	public function readCorreoAdminf($value){
		$sql = "SELECT correo from usuarios where id = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['correo']; 
			return true;
		}else{
			return null;
		}
    }
    public function readCorreoAdmin1($value,$idenviado){
		$sql = "SELECT COUNT(*)AS count FROM usuarios WHERE correo = ? AND id=? ";
		$params = array($value,$idenviado);
		$correos = Database::getRow($sql, $params);
		if($correos){
			$this->count= $correos['count']; 
			return true;
		}else{
			return null;
		}
    }

    public function readCodigoAdmin($value){
		$sql = "SELECT codigo, nombre, id FROM usuarios WHERE correo = ? ";
		$params = array($value);
		$correos = Database::getRow($sql, $params);
		if($correos){
            $this->codigo= $correos['codigo']; 
            $this->nombre= $correos['nombre']; 
            $this->id= $correos['id']; 
			return true;
		}else{
			return null;
		}   
    }
        public function updateCodigoAdmin1(){
		$sql = "UPDATE `maestros` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	}   
	public function updateCodigoAdmin2(){
		$sql = "UPDATE `alumnos` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	} 
    public function updateCodigoAdmin(){
		$sql = "UPDATE `usuarios` SET codigo = ? WHERE correo = ?";
		$params = array($this->codigo, $this->correo);
		return Database::executeRow($sql, $params);
	}
	
	public function estadoAdmin($value){
		$sql = "UPDATE `usuarios` SET  bloqueo= ? WHERE id = ?";
		$params = array(0,$value);
		return Database::executeRow($sql, $params);
	}

    public function updateContraAdmin(){
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = "UPDATE usuarios SET contrasenia = ? WHERE id = ?";
		$params = array($hash,$this->id);
		return Database::executeRow($sql, $params);
	} 
}