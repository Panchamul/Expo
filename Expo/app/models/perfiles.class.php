<?php

class Perfiles extends Validator{

	//Declaracion de las variables a utilizar

	private $id= null; 

    private $nombre=null;

	private $apellido=null; 

	private $correo=null;

	private $fecha=null;

	private $usuario=null; 

	private $foto=null;

	private $telefono=null;

	private $genero=null;
	private $estado=null;
	private $clave=null;
	private $dui=null;
	private $direccion=null;
	private $nit=null;
	private $escalafon=null; 
	private $fecha_cambio = null;
	private $bloqueo = null;
	private $autenticacion = null;
	private $id_tipo=null;
public function setBloqueo($value){
	$this->bloqueo = $value;
	return true;
}
public function getFechaCambio(){
	return $this->fecha_cambio;
}
	public function setFechaCambio($value){
		$this->fecha_cambio = $value;
		return true;
}

public function getBloqueo(){
	return $this->bloqueo;
}
public function getAutenticacion(){
	return $this->autenticacion;
}
public function setEstado($value){ 

	$this->estado=$value;

	return true;   

}	
public function getEstado(){

return $this->estado;

}
	//Elementos del id para ingresar
	public function setNit($value){ 

		$this->nit=$value;

		return true;   

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
	public function setDui($value){ 

		$this->dui=$value;

		return true; 

}

public function getDui(){

	return $this->dui;

}
public function setId_tipo($value){ 
	if($this->validateId($value)){
		$this->id_tipo = $value;
		return true; 
	}
	else{
		return false;
	}
}
public function getId_tipo(){
	return $this->id_tipo;
}
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

	public function setClave($value){

		if($this->validatePassword($value)){

			$this->clave = $value;

			return true;

		}else{

			return false;

		}

	}

	public function getClave(){

		return $this->clave;

	}

	public function setNombre($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->nombre = $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el id

	public function getNombre(){

		return $this->nombre;

	}

	public function setApellido($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->apellido = $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el id

	public function getApellido(){

		return $this->apellido;

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

	public function setImagen($file){

		if($this->validateImage($file, $this->foto, "../../../web/img/usuarios/", 500, 500)){

			$this->foto = $this->getImageName();

			return true;

		}else{

			return false;

		}

	}

	public function setImagen1($file){

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

	public function unsetImagen1(){

		if(unlink("../../../web/img/maestros/".$this->foto)){

			$this->foto = null;

			return true;

		}else{

			return false;

		}

	}

	public function unsetImagen(){

		if(unlink("../../web/img/alumnos/".$this->foto)){

			$this->foto = null;

			return true;

		}else{

			return false;

		}

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

	//Funcion para recolectar el nombre de la materia

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

	public function getGeneros(){

		$sql = "SELECT id,genero FROM generos where estado=0  ";

		$params = array(null);

		return Database::getRows($sql, $params);

	}
    public function getTipo(){
        $sql = "SELECT  id_tipo,tipo

		  FROM tipo_usuario  ";

		$params = array(null);

		return Database::getRows($sql, $params);
    }
	public function getFotoAlumno(){

		$sql = "SELECT  `foto`

		  FROM `alumnos`  WHERE alumnos.estado=0 and id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getFotoAdmin(){

		$sql = "SELECT  `foto`

		  FROM `usuarios`  WHERE usuarios.estado=0 and id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getPermisos(){

		$sql = "SELECT id_permiso FROM detalle_permisos WHERE id_tipo=(select tipo_usuario from usuarios where 

		usuarios.id=?)";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function comprobarpermisos($valor,$data){ 

		$variable1=0;

		foreach($data as $row){

			$variable=$row['id_permiso'];

			if($variable==$valor){

				$variable1=$valor;

			} 

		}

		if($variable1!=$valor){

			print("<script>window.open('/Expo/web/accesorestringido.html','_self')</script>"); 

		}

	}

	public function getFotoMaestro(){

		$sql = "SELECT  `foto`

		  FROM `maestros`  WHERE  estado=0 and id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}
	public function deleteAdmins(){

		$sql = "UPDATE usuarios SET estado=? WHERE id  = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	} 
	public function getAdmins(){
		$sql = "SELECT id,usuario, nombre,apellido,foto,correo,genero,tipo  FROM usuarios,tipo_usuario where  usuarios.tipo_usuario=tipo_usuario.id_tipo and usuarios.estado=0 ORDER BY nombre";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getAdmins1(){
		$sql = "SELECT id,usuario, nombre,apellido,foto,correo,genero,tipo  FROM usuarios,tipo_usuario where  usuarios.tipo_usuario=tipo_usuario.id_tipo and usuarios.estado=1 ORDER BY nombre";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchAdmins1($value){

		$sql = "SELECT id,usuario, nombre,apellido,foto,correo,genero,tipo  FROM usuarios,tipo_usuario where 
		 usuarios.tipo_usuario=tipo_usuario.id_tipo and usuarios.estado=1 and nombre like ? ORDER BY nombre"; 

		$params = array("%$value%");

		return Database::getRows($sql, $params);

	}
	public function searchAdmins($value){

		$sql = "SELECT id,usuario, nombre,apellido,foto,correo,genero,tipo  FROM usuarios,tipo_usuario where 
		 usuarios.tipo_usuario=tipo_usuario.id_tipo and usuarios.estado=0 and nombre like ? ORDER BY nombre"; 

		$params = array("%$value%");

		return Database::getRows($sql, $params);

	}
	public function readAlumnos(){

		$sql = "SELECT alumnos.id as id , `nombre`, `apellido`, `usuario`,  `correo`, `telefono`,  `genero`, `fecha_nacimiento`, 

		 `foto`

		FROM `alumnos`  WHERE alumnos.estado=0  and alumnos.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->id = $album['id']; 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido'];  

			$this->usuario= $album['usuario']; 

			$this->correo = $album['correo']; 

			$this->telefono = $album['telefono'];  

			$this->genero = $album['genero']; 

			$this->fecha = $album['fecha_nacimiento'];  

			$this->foto= $album['foto']; 

			return true;

		}else{

			return null;

		}

	}
	public function createAdminsPermisos(){ 
		$sql = "INSERT INTO detalle_permisos(id_permiso,id_tipo) VALUES(?,(select (usuarios.tipo_usuario) from usuarios where usuarios.id=(select max(usuarios.id) from usuarios)))";
		$params = array($this->id_tipo);
		return Database::executeRow($sql, $params);
	} 
	public function createAdmins(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql ="INSERT INTO usuarios (`nombre`, `apellido`, `DUI`, `usuario`, `contrasenia`, `correo`,

		`telefono`, `direccion`, `genero`, `fecha_nacimiento`, `NIT`, `escalafon`, `foto`, `estado`,`fecha_ingreso`,`tipo_usuario`) VALUES (?,?,?,?,?,?,

		?,?,?,?,?,?,?,?,?,?)";

		$params = array($this->nombre,$this->apellido,$this->dui,$this->usuario,$hash,$this->correo,

		$this->telefono,$this->direccion,$this->genero,$this->fecha,$this->nit,$this->escalafon,$this->foto,$this->estado,$this->fecha_cambio,$this->id_tipo);

		return Database::executeRow($sql, $params);

	}

	public function createTipos(){ 
		$sql = "INSERT INTO tipo_usuario (tipo) values (?)";
		$params = array($this->bloqueo);
		return Database::executeRow($sql, $params);
	} 
	public function readUsuario(){
		$sql = "SELECT usuario,contrasenia From maestros WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->usuario = $categoria['usuario'];
			
			return true;
		}else{
			return null;
		}
	}
	public function habilitarUsuarios(){

		$sql = "UPDATE usuarios SET estado=? WHERE id = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	}
	public function readUsuarios1(){
		$sql = "SELECT nombre,apellido,usuario,contrasenia From usuarios WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->usuario = $categoria['usuario']; 
			$this->nombre = $categoria['nombre']; 
			$this->apellido = $categoria['apellido'];  
			return true;
		}else{
			return null;
		}
	}
		public function readUsuario1(){
		$sql = "SELECT usuario,contrasenia From usuarios WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->usuario = $categoria['usuario']; 
			return true;
		}else{
			return null;
		}
	}
		public function readUsuario2(){
		$sql = "SELECT usuario,contrasenia From alumnos WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->usuario = $categoria['usuario']; 
			return true;
		}else{
			return null;
		}
	}
	public function readAdmins(){

		$sql = "SELECT usuarios.id as id , `nombre`, `apellido`, `usuario`,  `correo`, `telefono`,  `genero`, `fecha_nacimiento`, 

		 `foto`

		FROM `usuarios`  WHERE usuarios.estado=0  and usuarios.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->id = $album['id']; 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido'];  

			$this->usuario= $album['usuario']; 

			$this->correo = $album['correo']; 

			$this->telefono = $album['telefono'];  

			$this->genero = $album['genero']; 

			$this->fecha = $album['fecha_nacimiento'];  

			$this->foto= $album['foto']; 

			return true;

		}else{

			return null;

		}

	}

	public function readMaestros(){

		$sql = "SELECT maestros.id as id , `nombre`, `apellido`, `usuario`,  `correo`, `telefono`,  `id_genero`, `fecha_nacimiento`, 

		 `foto`

		FROM `maestros`  WHERE maestros.estado=0  and maestros.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->id = $album['id']; 

			$this->nombre = $album['nombre']; 

			$this->apellido = $album['apellido'];  

			$this->usuario= $album['usuario']; 

			$this->correo = $album['correo']; 

			$this->telefono = $album['telefono'];  

			$this->genero = $album['id_genero']; 

			$this->fecha = $album['fecha_nacimiento'];  

			$this->foto= $album['foto']; 

			return true;

		}else{

			return null;

		}

	}

	public function checkPassword(){

		$sql = "SELECT contrasenia FROM alumnos WHERE id  = ?";

		$params = array($this->id);

		$data = Database::getRow($sql, $params);

		if(password_verify($this->clave, $data['contrasenia'])){

			return true;

		}else{

			return false;

		}

	}

	public function checkPassword1(){

		$sql = "SELECT contrasenia FROM usuarios WHERE id  = ?";

		$params = array($this->id);

		$data = Database::getRow($sql, $params);

		if(password_verify($this->clave, $data['contrasenia'])){

			return true;

		}else{

			return false;

		}

	}

	public function checkPassword2(){

		$sql = "SELECT contrasenia FROM maestros WHERE id  = ?";

		$params = array($this->id);

		$data = Database::getRow($sql, $params);

		if(password_verify($this->clave, $data['contrasenia'])){

			return true;

		}else{

			return false;

		}

	}

	public function changePassword(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = "UPDATE alumnos SET contrasenia = ?,fecha_ingreso=? WHERE id  = ?";

		$params = array($hash,$this->fecha_cambio, $this->id);

		return Database::executeRow($sql, $params);

	}

	public function changePassword1(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = "UPDATE usuarios SET contrasenia = ?,fecha_ingreso=? WHERE id  = ?";

		$params = array($hash,$this->fecha_cambio, $this->id);

		return Database::executeRow($sql, $params);

	}

	public function changePassword2(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = "UPDATE maestros SET contrasenia = ?,fecha_ingreso=? WHERE id  = ?";

		$params = array($hash, $this->fecha_cambio,$this->id);

		return Database::executeRow($sql, $params);

	}

	public function editarPerfil(){

		$sql = "UPDATE alumnos set nombre=?,apellido=?,usuario=?,correo=?,telefono=?,genero=?,

		fecha_nacimiento=?,foto=? 

		where  id=?";

		$params = array($this->nombre,$this->apellido,$this->usuario,$this->correo,$this->telefono,

		$this->genero,$this->fecha,$this->foto,$this->id);

		return Database::executeRow($sql, $params);

	}
	public function getAdmin1(){

		$sql = "SELECT  `foto`

		  FROM `usuarios`  WHERE estado=0 and id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}
	public function readAdmins1(){

		$sql = "SELECT usuarios.id as id , `nombre`, `apellido`,  `dui`, `usuario`,  `correo`, `telefono`, `direccion`, `genero`, `fecha_nacimiento`, 

		 `NIT`,  `escalafon`,`foto`,`tipo_usuario`

		FROM `usuarios`  WHERE estado=0  and id=?";

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

			$this->genero = $album['genero']; 

			$this->fecha = $album['fecha_nacimiento']; 

			$this->nit = $album['NIT'];

			$this->escalafon = $album['escalafon'];

			$this->foto= $album['foto']; 
			$this->id_tipo=$album['tipo_usuario'];
			return true;

		}else{

			return null;

		}

	}
	public function UpdateAdmins(){

		$sql = "UPDATE `usuarios` SET  `nombre`=?,`apellido`=?,`DUI`=?,

		`usuario`=?,`correo`=?,`telefono`=?,`direccion`=?,

		`genero`=?,`fecha_nacimiento`=?,`NIT`=?,

		`escalafon`=?,`foto`=?,`tipo_usuario`=? WHERE id=?";

		$params = array($this->nombre, $this->apellido,$this->dui,$this->usuario,$this->correo,$this->telefono,

		$this->direccion,$this->genero,$this->fecha,$this->nit,$this->escalafon,$this->foto,$this->id_tipo, $this->id);

		return Database::executeRow($sql, $params);

	}
	public function editarPerfil1(){

		$sql = "UPDATE usuarios set nombre=?,apellido=?,usuario=?,correo=?,telefono=?,genero=?,

		fecha_nacimiento=?,foto=? 

		where  id=?";

		$params = array($this->nombre,$this->apellido,$this->usuario,$this->correo,$this->telefono,

		$this->genero,$this->fecha,$this->foto,$this->id);

		return Database::executeRow($sql, $params);

	}

	public function editarPerfil2(){

		$sql = "UPDATE maestros set nombre=?,apellido=?,usuario=?,correo=?,telefono=?,id_genero=?,

		fecha_nacimiento=?,foto=? 

		where  id=?";

		$params = array($this->nombre,$this->apellido,$this->usuario,$this->correo,$this->telefono,

		$this->genero,$this->fecha,$this->foto,$this->id);

		return Database::executeRow($sql, $params);

	}
	public function readMaxTipo(){
		$sql = "SELECT id_tipo,tipo as tipo from tipo_usuario where id_tipo=(SELECT max(id_tipo) from tipo_usuario) ";
		$params = array(null);
		$categoria = Database::getRow($sql, $params);
		if($categoria){ 
            $this->id_tipo=$categoria['id_tipo'];
			return true;
		}else{
			return null;
		}
	}

}

?>