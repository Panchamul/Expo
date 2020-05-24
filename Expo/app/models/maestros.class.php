<?php

class Maestros extends Validator{

	//Declaracion de las variables a utilizar

	private $id= null;

	private $nombre=null; 

    private $apellido=null;

    private $dui=null;

    private $usuario=null;

	private $contrasenia=null;

	private $estado=null;

    private $correo=null;

    private $telefono=null;

    private $direccion=null;

    private $genero=null;

    private $fecha=null;

    private $nit=null;

	private $escalafon=null; 

	private $fecha_cambio = null; 

	private $foto=null; 

public function getFechaCambio(){

	return $this->fecha_cambio;

}

	public function setFechaCambio($value){

		$this->fecha_cambio = $value;

		return true;

}

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

	public function setNombre($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->nombre=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getNombre(){

		return $this->nombre;

	}

	public function setApellido($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->apellido=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getApellido(){

		return $this->apellido;

	}

	public function setDireccion($value){

		if($this->validateAlphanumeric($value,1,175)){

			$this->direccion=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getDireccion(){

		return $this->direccion;

	}

	public function setTelefono($value){

		if($this->validateAlphanumeric($value,1,8)){

			$this->telefono=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getTelefono(){

		return $this->telefono;

	}

	public function setContrasenia($value){

		if($this->validatePassword($value)){

			$this->contrasenia=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getContrasenia(){

		return $this->contrasenia;

	}

	public function setCorreo($value){

		if($this->validateEmail($value)){

			$this->correo=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getCorreo(){

		return $this->correo;

	}

	public function setFecha($value){ 

			$this->fecha=$value;

			return true; 

	}

	public function getFecha(){

		return $this->fecha;

	}

	public function setNit($value){ 

			$this->nit=$value;

			return true;   

	}

	public function setImagen($file){

		if($this->validateImage($file, $this->foto, "../../../web/img/maestros/", 500, 500)){

			$this->foto = $this->getImageName();

			return true;

		}else{

			return false;

		}

	}

	public function getImagen(){

		return $this->foto;

	}

	public function unsetImagen(){

		if(unlink("../../../web/img/maestros/".$this->foto)){

			$this->foto = null;

			return true;

		}else{

			return false;

		}

	}

	public function getNit(){

		return $this->nit;

	}

	public function setEscalafon($value){ 

			$this->escalafon=$value;

			return true;  

	}

	public function getEscalafon(){

		return $this->escalafon;

	}

	public function setDui($value){ 

			$this->dui=$value;

			return true; 

	}

	public function getDui(){

		return $this->dui;

	}

	public function setUsuario($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->usuario=$value;

			return true;

		}

		else{

			return false;

		}

	}

	public function getUsuario(){

		return $this->usuario;

	}

	//Elementos  para ingresar el nombre de la materia

	public function setGenero($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->genero= $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el nombre de la materia

	public function getGenero(){

		return $this->genero;

	}

	     

    //funciones para ejecutar las consultas 

	public function searchGradosAdmin($value){

		$sql = "SELECT id,grado FROM grados WHERE grado like  ? "; 

		$params = array("$value%");

		return Database::getRows($sql, $params);

	}

	public function searchSeccionesAdmin($value){

		$sql = "SELECT secciones.id as id,alumnos.nombre as nombre ,alumnos.apellido as apellido,grados.grado as grado from 

		alumnos,grados,secciones where secciones.id_grado=grados.id and secciones.id_alumno=alumnos.id and grados.estado=0 and secciones.id_grado=?

		and  alumnos.nombre like  ? "; 

		$params = array($this->id,"$value%");

		return Database::getRows($sql, $params);

	}

	public function searchMaestrosAdmin($value){

		$sql = "SELECT  maestros.id as id , `nombre`, `apellido`,  `usuario`,  `correo`, `telefono`, `id_genero`,  `foto`

		FROM `maestros`  WHERE maestros.estado=0  and maestros.nombre like  ? "; 

		$params = array("$value%");

		return Database::getRows($sql, $params);

	}

	public function searchMaestrosAdmin1($value){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`,  `usuario`,  `correo`, `telefono`, `id_genero`,  `foto`

		FROM `maestros`  WHERE maestros.estado=1 and maestros.nombre like  ? "; 

		$params = array("$value%");

		return Database::getRows($sql, $params);

	}

	public function getGrados(){

		$sql = "SELECT id,grado FROM grados where estado=0  ";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getMaestrosAdmin(){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`,  `usuario`,  `correo`, `telefono`, `id_genero`,  `foto`

		  FROM `maestros`  WHERE maestros.estado=0  ";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getMaestrosAdmin2(){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`,  `usuario`,  `correo`, `telefono`, `id_genero`,  `foto`

		  FROM `maestros`  WHERE maestros.estado=1  ";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getMaestrosAdmin1(){

		$sql = "SELECT  `foto`

		  FROM `maestros`  WHERE maestros.estado=0 and id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getSeccionesAdmin(){

		$sql = "SELECT secciones.id as id,alumnos.nombre as nombre ,alumnos.apellido as apellido,grados.grado as grado from 

		alumnos,grados,secciones where secciones.id_grado=grados.id and secciones.id_alumno=alumnos.id and grados.estado=0 and secciones.id_grado=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}



	public function createMaestros(){

		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);

		$sql ="INSERT INTO maestros (`nombre`, `apellido`, `DUI`, `usuario`, `contrasenia`, `correo`,

		`telefono`, `direccion`, `id_genero`, `fecha_nacimiento`, `NIT`, `escalafon`, `foto`, `estado`,`fecha_ingreso`) VALUES (?,?,?,?,

		?,?,?,?,?,?,?,?,?,?,?)";

		$params = array($this->nombre,$this->apellido,$this->dui,$this->usuario,$hash,$this->correo,

		$this->telefono,$this->direccion,$this->genero,$this->fecha,$this->nit,$this->escalafon,$this->foto,$this->estado,$this->fecha_cambio);

		return Database::executeRow($sql, $params);

	}

	public function readSecciones(){

		$sql = "SELECT alumnos.nombre as nombre ,alumnos.apellido as apellido,grados.grado as grado from 

		alumnos,grados,secciones where secciones.id_grado=grados.id and secciones.id_alumno=alumnos.id and grados.estado=0 

		and  secciones.id =?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){ 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido'];  

			$this->usuario= $album['grado'];  

			return true;

		}else{

			return null;

		}

	}

	public function readMaestros(){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`,  `dui`, `usuario`,  `correo`, `telefono`, `direccion`, `id_genero`, `fecha_nacimiento`, 

		 `NIT`,  `escalafon`,`foto`

		FROM `maestros`  WHERE maestros.estado=0  and maestros.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->id = $album['id']; 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido']; 

			$this->dui=$album['dui'];

			$this->usuario= $album['usuario']; 

			$this->correo = $album['correo']; 

			$this->telefono = $album['telefono'];

			$this->direccion = $album['direccion'];  

			$this->genero = $album['id_genero']; 

			$this->fecha = $album['fecha_nacimiento']; 

			$this->nit = $album['NIT'];

			$this->escalafon = $album['escalafon'];

			$this->foto= $album['foto']; 

			return true;

		}else{

			return null;

		}

	}

	public function readMaestros1(){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`,  `dui`, `usuario`,  `correo`, `telefono`, `direccion`, `id_genero`, `fecha_nacimiento`, 

		 `NIT`,  `escalafon`,`foto`

		FROM `maestros`  WHERE maestros.estado=1  and maestros.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->id = $album['id']; 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido']; 

			$this->dui=$album['dui'];

			$this->usuario= $album['usuario']; 

			$this->correo = $album['correo']; 

			$this->telefono = $album['telefono'];

			$this->direccion = $album['direccion'];  

			$this->genero = $album['id_genero']; 

			$this->fecha = $album['fecha_nacimiento']; 

			$this->nit = $album['NIT'];

			$this->escalafon = $album['escalafon'];

			$this->foto= $album['foto']; 

			return true;

		}else{

			return null;

		}

	}

	public function UpdateMaestros(){

		$sql = "UPDATE `maestros` SET  `nombre`=?,`apellido`=?,`DUI`=?,

		`usuario`=?,`correo`=?,`telefono`=?,`direccion`=?,

		`id_genero`=?,`fecha_nacimiento`=?,`NIT`=?,

		`escalafon`=?,`foto`=? WHERE id=?";

		$params = array($this->nombre, $this->apellido,$this->dui,$this->usuario,$this->correo,$this->telefono,

		$this->direccion,$this->genero,$this->fecha,$this->nit,$this->escalafon,$this->foto, $this->id);

		return Database::executeRow($sql, $params);

	}

	public function UpdateSecciones(){

		$sql = "UPDATE `secciones` SET  `id_grado`=?  WHERE id=?";

		$params = array($this->usuario, $this->id);

		return Database::executeRow($sql, $params);

	}

	public function habilitarMaestros(){

		$sql = "UPDATE maestros SET estado=? WHERE id = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	}





	public function deleteMaestros(){

		$sql = "UPDATE maestros SET estado=? WHERE id  = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	} 

} 

?>