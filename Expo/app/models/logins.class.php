<?php

class Logins extends Validator{

	//Declaracion de las variables a utilizar

	private $id= null;

	private $usuario=null; 

	private $clave=null;
	private $fecha = null;
	private $nombre=null;

	private $apellido=null;
	private $fecha_cambio = null;
	private $bloqueo = null;
	private $autenticacion = null;
	private $estado = null;
	private $correo = null;


	//Elementos del id para ingresar
	
    public function setFecha($value){ 
		$this->fecha = $value;
		return true; 
}

public function getFecha(){
	return $this->fecha;
}
public function getCorreo(){
	return $this->correo;
}
public function getEstado(){
	return $this->estado;
}
	public function setId($value){

		if($this->validateId($value)){

			$this->id = $value;

			return true;

		}else{

			return false;

		}

	}
	public function setFechaCambio($value){
		$this->fecha_cambio = $value;
		return true;
}
public function setBloqueo($value){
	$this->bloqueo = $value;
	return true;
}
public function getFechaCambio(){
	return $this->fecha_cambio;
}

public function getBloqueo(){
	return $this->bloqueo;
}
public function getAutenticacion(){
	return $this->autenticacion;
}

	//Funcion para recolectar el id

	public function getId(){

		return $this->id;

	}

    public function setUsuario($value){

		if($this->validateAlphanumeric($value, 1, 50)){

			$this->usuario = $value;

			return true;

		}else{

			return false;

		}

	}

	public function getUsuario(){

		return $this->usuario;

	}

	public function setApellido($value){

		if($this->validateAlphanumeric($value, 1, 50)){

			$this->apellido= $value;

			return true;

		}else{

			return false;

		}

	}

	public function getApellido(){

		return $this->apellido;

	}

	public function setNombre($value){

		if($this->validateAlphanumeric($value, 1, 50)){

			$this->nombre = $value;

			return true;

		}else{

			return false;

		}

	}

	public function getNombre(){

		return $this->nombre;

	}

	//Elementos  para ingresar el nombre de la materia

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

    public function getUsuarios(){

		$sql = "SELECT id,usuario,nombre, apellido , correo  FROM usuarios where usuarios.estado=0 ORDER BY nombre";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getUsuariosAlumnos(){

		$sql = "SELECT id,usuario,nombre, apellido , correo  FROM alumnos ORDER BY nombre";

		$params = array(null);

		return Database::getRows($sql, $params);

    }

    public function getUsuariosMaestros(){

		$sql = "SELECT id,usuario,nombre, apellido , correo  FROM maestros ORDER BY nombre";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

    //Métodos para manejar la sesión del usuario

	public function checkUsuarioAdmin(){

		$sql = "SELECT id,nombre,apellido,correo  FROM usuarios WHERE usuario= ? and usuarios.estado=0";

		$params = array($this->usuario);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id'];

			$this->nombre=$data['nombre'];

			$this->apellido=$data['apellido'];
			
			$this->correo=$data['correo'];

			return true;

		}else{

			return false;

		}

	}

	public function checkPasswordAdmin(){

		$sql = "SELECT contrasenia FROM usuarios WHERE id = ?";

		$params = array($this->id);

		$data = Database::getRow($sql, $params);

		if(password_verify($this->clave, $data['contrasenia'])){

			return true;

		}else{

			return false;

		}

    }

    public function checkUsuarioMaestro(){

		$sql = "SELECT id,nombre,apellido,correo  FROM maestros WHERE usuario= ?";

		$params = array($this->usuario);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id'];

			$this->nombre=$data['nombre'];

			$this->apellido=$data['apellido'];
			
			$this->correo=$data['correo'];

			return true;

		}else{

			return false;

		}

	}

	public function checkUsuarioAlumno(){

		$sql = "SELECT id,nombre,apellido,correo  FROM alumnos WHERE usuario= ?";

		$params = array($this->usuario);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id'];

			$this->nombre=$data['nombre'];

			$this->apellido=$data['apellido'];
			
			$this->correo=$data['correo'];

			return true;

		}else{

			return false;

		}

	}

	public function checkPasswordMaestro(){

		$sql = "SELECT contrasenia FROM maestros WHERE id = ?";

		$params = array($this->id);

		$data = Database::getRow($sql, $params);

		if(password_verify($this->clave, $data['contrasenia'])){

			return true;

		}else{

			return false;

		}

	}

	public function checkPasswordAlumno(){

		$sql = "SELECT contrasenia FROM alumnos WHERE id = ?";

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

		$sql = "UPDATE usuarios SET contrasenia = ?,fecha_ingreso=? WHERE id = ?";

		$params = array($hash,$this->fecha_cambio, $this->id);

		return Database::executeRow($sql, $params);

	}
	public function changePassword1(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = "UPDATE maestros SET contrasenia = ?,fecha_ingreso=? WHERE id = ?";

		$params = array($hash,$this->fecha_cambio, $this->id);

		return Database::executeRow($sql, $params);

	}
	public function changePassword2(){

		$hash = password_hash($this->clave, PASSWORD_DEFAULT);

		$sql = "UPDATE alumnos SET contrasenia = ?,fecha_ingreso=? WHERE id = ?";

		$params = array($hash,$this->fecha_cambio, $this->id);

		return Database::executeRow($sql, $params);

	}
	public function logOut(){

		return session_destroy();

	}
	
	public function readInhabilitacion(){
		$sql = "SELECT inhabilitacion FROM usuarios where usuarios.id=?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha = $categoria['inhabilitacion']; 
			return true;
		}else{
			return null;
		}
	}
	
	public function readEstadoUsuarios(){
		$sql = "SELECT estado FROM maestros where maestros.id=?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->estado = $categoria['estado']; 
			return true;
		}else{
			return null;
		}
	}
	
	
	public function readInhabilitacion1(){
		$sql = "SELECT inhabilitacion FROM maestros where id=?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha = $categoria['inhabilitacion']; 
			return true;
		}else{
			return null;
		}
	}
	public function readInhabilitacion2(){
		$sql = "SELECT inhabilitacion FROM alumnos where id=?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha = $categoria['inhabilitacion']; 
			return true;
		}else{
			return null;
		}
	}
	public function renovarIntentos(){ 
		$sql = "UPDATE usuarios set inhabilitacion=? where id=?";
		$params = array($this->fecha,$this->id);
		return Database::executeRow($sql, $params);
	} 
	public function renovarIntentos1(){ 
		$sql = "UPDATE maestros set inhabilitacion=? where id=?";
		$params = array($this->fecha,$this->id);
		return Database::executeRow($sql, $params);
	} 
	public function renovarIntentos2(){ 
		$sql = "UPDATE alumnos set inhabilitacion=? where id=?";
		$params = array($this->fecha,$this->id);
		return Database::executeRow($sql, $params);
	} 
	public function readBloqueo($value){
		$sql = "SELECT autenticacion FROM usuarios WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->autenticacion=$admin['autenticacion'];
			return true;
		}else{
			return null;
		}
	}
	public function readBloqueo1($value){
		$sql = "SELECT autenticacion FROM maestros WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->autenticacion=$admin['autenticacion'];
			return true;
		}else{
			return null;
		}
	}
	public function readBloqueo2($value){
		$sql = "SELECT autenticacion FROM alumnos WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->autenticacion=$admin['autenticacion'];
			return true;
		}else{
			return null;
		}
	}
	public function readFecha_contra(){
		$sql = "SELECT fecha_ingreso From usuarios WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha_cambio = $categoria['fecha_ingreso'];
			return true;
		}else{
			return null;
		}
	}
	public function readFecha_contra1(){
		$sql = "SELECT fecha_ingreso From maestros WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha_cambio = $categoria['fecha_ingreso'];
			return true;
		}else{
			return null;
		}
	}
	public function readFecha_contra2(){
		$sql = "SELECT fecha_ingreso From alumnos WHERE id = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
            $this->fecha_cambio = $categoria['fecha_ingreso'];
			return true;
		}else{
			return null;
		}
	}
	public function Bloqueo($value){
		$sql = "UPDATE usuarios SET bloqueo = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function Bloqueo1($value){
		$sql = "UPDATE maestros SET bloqueo = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function Bloqueo2($value){
		$sql = "UPDATE alumnos SET bloqueo = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}

	public function BloqueoCorreo($value,$idm){
		$sql = "UPDATE usuarios SET bloqueo = ? WHERE id = ?";
		$params = array($value,$idm);
		return Database::executeRow($sql, $params);
	}
	public function AutenticacionRandom($value){
		$sql = "UPDATE usuarios SET autenticacion = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function AutenticacionRandom1($value){
		$sql = "UPDATE maestros SET autenticacion = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function AutenticacionRandom2($value){
		$sql = "UPDATE alumnos SET autenticacion = ? WHERE id = ?";
		$params = array($value,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function readBloqueoUsuario($value){
		$sql = "SELECT bloqueo FROM usuarios WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->bloqueo=$admin['bloqueo'];
			return true;
		}else{
			return null;
		}
	}
	public function readBloqueoUsuario1($value){
		$sql = "SELECT bloqueo FROM maestros WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->bloqueo=$admin['bloqueo'];
			return true;
		}else{
			return null;
		}
	}
	public function readBloqueoUsuario2($value){
		$sql = "SELECT bloqueo FROM alumnos WHERE id = ?";
		$params = array($value);
		$admin = Database::getRow($sql, $params);
		if($admin){
            $this->bloqueo=$admin['bloqueo'];
			return true;
		}else{
			return null;
		}
	}
	public function readUsuario(){
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
	public function readUsuario1(){
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

}

?>