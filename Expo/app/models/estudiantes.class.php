<?php 
    class Estudiante extends Validator{
        //Declarar variables 
        private $id = null;
        private $nombre = null;
        private $apellido = null;
        private $fecha = null;
        private $idMunicipio = null;
        private $idZona = null;
        private $idDiscapacidad = null;
        private $idEstado = null;
        private $idReligion = null;
        private $idGrado = null;
        private $Nie = null;
        private $genero = null;
        private $anioIngreso = null;
        private $telefono = null;
        private $repiteGrado = null;
        private $tarjetaVacunas = null;
        private $descripcion = null;
        private $partida = null;
        private $certificado = null;
        private $fechaRegistro = null;
        private $usuarios = null;
        private $contrasenia = null;
        private $correo = null;
        private $estado = null;
        private $carnet = null;
        private $foto = null;
        private $idSeccion = null;
        private $idEstudiante = null;
        private $fecha_cambio=null;
        //Elementos del id para ingresar
        public function getFechaCambio(){
	return $this->fecha_cambio;
}
	public function setFechaCambio($value){
		$this->fecha_cambio = $value;
		return true;
}
        public function setIdAlumnor($value){
            if($this->validateId($value)){
                $this->idEstudiante = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdAlumno(){
            return $this->idEstudiante;
        }
        public function setIdSeccion($value){
            if($this->validateId($value)){
                $this->idSeccion = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdSeccion(){
            return $this->idSeccion;
        }

    /*========================================================================
    COMIENZO DE SENTENCIAS GET Y SET
    ==========================================================================*/
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
        public function setNombre($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->nombre = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getNombre(){
            return $this->nombre;
        }
        //funcion para enviar la discapacidad
        public function setApellido($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->apellido = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getApellido(){
            return $this->apellido;
        }
        //funcion para enviar la discapacidad
        public function setFecha($value){
            $this->fecha = $value;
            return true;
            
        }
        //funcion para recolectar la discapacidad
        public function getFecha(){
            return $this->fecha;
        }
        
        //Elementos del id para ingresar
        public function setIdMunicipio($value){
            if($this->validateId($value)){
                $this->idMunicipio = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdMunicipio(){
            return $this->idMunicipio;
        }
        
        //Elementos del id para ingresar
        public function setIdZona($value){
            if($this->validateId($value)){
                $this->idZona = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdZona(){
            return $this->idZona;
        }
        
        //Elementos del id para ingresar
        public function setIdDiscapacidad($value){
            if($this->validateId($value)){
                $this->idDiscapacidad = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdDiscapacidad(){
            return $this->idDiscapacidad;
        }
        
        //Elementos del id para ingresar
        public function setIdReligion($value){
            if($this->validateId($value)){
                $this->idReligion = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdReligion(){
            return $this->idReligion;
        }
        
        //Elementos del id para ingresar
        public function setIdEstadoF($value){
            if($this->validateId($value)){
                $this->idEstado = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdEstadoF(){
            return $this->idEstado;
        }
        //Elementos del id para ingresar
        public function setIdGrado($value){
            if($this->validateId($value)){
                $this->idGrado = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdGrado(){
            return $this->idGrado;
        }
        //funcion para enviar la discapacidad
        public function setNie($value){
            $this->Nie = $value;
            return true;    
        }
        //funcion para recolectar la discapacidad
        public function getNie(){
            return $this->Nie;
        }
        //funcion para enviar la discapacidad
        public function setGenero($value){
            if($this->validateAlphabetic($value, 1, 15)){
                $this->genero = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getGenero(){
            return $this->genero;
        }
        
        //funcion para enviar la discapacidad
        public function setAnioIngreso($value){
                $this->anioIngreso = $value;
                return true;
        }
        //funcion para recolectar la discapacidad
        public function getAnioIngreso(){
            return $this->anioIngreso;
        }
        
         //funcion para enviar la discapacidad
        public function setTelefono($value){
            if($this->validatePhone($value, 1, 15)){
                $this->telefono = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getTelefono(){
            return $this->telefono;
        }
        
         //funcion para enviar la discapacidad
        public function setRepiteGrado($value){
            if($this->validateAlphabetic($value, 1, 15)){
                $this->repiteGrado = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getRepiteGrado(){
            return $this->repiteGrado;
        }
        
         //funcion para enviar la discapacidad
        public function setTarjetaVacunas($value){
                $this->tarjetaVacunas = $value;
                return true;
        }
        //funcion para recolectar la discapacidad
        public function getTarjetaVacunas(){
            return $this->tarjetaVacunas;
        }

         //funcion para enviar la discapacidad
        public function setDescripcion($value){
            if($this->validateAlphabetic($value, 1, 15)){
                $this->descripcion = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getDescripcion(){
            return $this->descripcion;
        }
        
         //funcion para enviar la discapacidad
        public function setPartida($value){
            $this->partida = $value;
            return true;
        }
        //funcion para recolectar la discapacidad
        public function getPartida(){
            return $this->partida;
        }
        
         //funcion para enviar la discapacidad
        public function setCertificado($value){
            $this->certificado = $value;
            return true;
        }
        //funcion para recolectar la discapacidad
        public function getCertificado(){
            return $this->certificado;
        }
        
         //funcion para enviar la discapacidad
        public function setFechaRegistro($value){
            $this->fechaRegistro = $value;
            return true;
        }
        //funcion para recolectar la discapacidad
        public function getFechaRegistro(){
            return $this->fechaRegistro;
        }
        
         //funcion para enviar la discapacidad
        public function setUsuarios($value){
            if($this->validateAlphanumeric($value, 1, 55)){
                $this->usuarios = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getUsuarios(){
            return $this->usuarios;
        }

         //funcion para enviar la discapacidad
        public function setContraseania($value){
            if($this->validatePassword($value)){
                $this->contrasenia = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getContraseania(){
            return $this->contrasenia;
        }

         //funcion para enviar la discapacidad
        public function setCorreo($value){
            if($this->validateEmail($value)){
                $this->correo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getCorreo(){
            return $this->correo;
        }
        
         //funcion para enviar la discapacidad
        public function setEstado($value){
            if($this->validateEstado($value)){
                $this->estado = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getEstado(){
            return $this->estado;
        }
        
         //funcion para enviar la discapacidad
        public function setCarnet($value){
            if($this->validateAlphanumeric($value, 1, 15)){
                $this->carnet = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getCarnet(){
            return $this->carnet;
        }
        public function setFoto($file){
            if($this->validateImage($file, $this->foto, "../../../web/img/estudiantes/", 1500, 1500)){
                $this->foto = $this->getImageName();
                return true;
            }else{
                return false;
            }
        }
        public function getFoto(){
            return $this->foto;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchEstudiantes($value){
            $sql = "SELECT A.id, A.nombre, A.apellido, A.fecha_nacimiento, M.municipio,  
                            A.telefono, Z.nombre AS Zona , A.NIE, A.genero, E.estado_familiar, R.religion, 
                            A.anio_ingreso, A.repite_grado, A.tarjeta_vacuna, D.discapacidad,  
                            A.prescripcion, A.partida, A.certificado, A.fecha_registro, A.usuario, 
                            A.contrasenia, A.correo, A.estado, A.carnet, A.foto , G.grado
                            FROM alumnos A, estado_familiar E, religiones R, municipios M, 
                            zona Z, discapacidades D, grados G, secciones Se
                            WHERE A.id_municipio = M.id AND A.id_zona = Z.id 
                            AND A.id_estado = E.id AND A.id_religion = R.id  
                            AND Se.id_alumno = A.id AND G.id = Se.id_grado
                            AND A.id_discapacidad = D.id AND A.estado = 0
                            AND A.nombre LIKE ? OR A.carnet LIKE ?";
            $params = array("%$value%","%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchEstudiantesNula($value){
            $sql = "SELECT A.id, A.nombre, A.apellido, A.fecha_nacimiento, M.municipio,  
                            A.telefono, Z.nombre AS Zona , A.NIE, A.genero, E.estado_familiar, R.religion, 
                            A.anio_ingreso, A.repite_grado, A.tarjeta_vacuna, D.discapacidad,  
                            A.prescripcion, A.partida, A.certificado, A.fecha_registro, A.usuario, 
                            A.contrasenia, A.correo, A.estado, A.carnet, A.foto , G.grado
                            FROM alumnos A, estado_familiar E, religiones R, municipios M, 
                            zona Z, discapacidades D, grados G, secciones Se
                            WHERE A.id_municipio = M.id AND A.id_zona = Z.id 
                            AND A.id_estado = E.id AND A.id_religion = R.id  
                            AND Se.id_alumno = A.id AND G.id = Se.id_grado
                            AND A.id_discapacidad = D.id AND A.estado = 1
                            AND A.nombre LIKE ? OR A.carnet LIKE ?";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createEstudiantes(){
            $hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
            $sql ="INSERT INTO alumnos(nombre, apellido, fecha_nacimiento, id_municipio, telefono, 
                    id_zona, NIE, genero, id_estado, id_religion, anio_ingreso, repite_grado, 
                    tarjeta_vacuna, id_discapacidad, prescripcion, partida, certificado, fecha_registro, 
                    usuario, contrasenia, correo, estado, carnet, foto,fecha_ingreso) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = array($this->nombre, $this->apellido, $this->fecha , $this->idMunicipio, $this->telefono,
                             $this->idZona, $this->Nie, $this->genero, $this->idEstado, $this->idReligion, 
                            $this->anioIngreso, $this->repiteGrado, $this->tarjetaVacunas, $this->idDiscapacidad, 
                            $this->descripcion, $this->partida, $this->certificado, $this->fechaRegistro, 
                            $this->usuarios, $hash, $this->correo, $this->estado, $this->carnet, $this->foto,$this->fecha_cambio);
            return Database::executeRow($sql, $params);
        }

        public function createSecciones(){
            $sql ="INSERT INTO `secciones`(`id_grado`, `id_alumno`) VALUES (?,?)";
            $params = array($this->idGrado, $this->idEstudiante);
            return Database::executeRow($sql, $params);
        }

        public function UpdateSecciones(){
            $sql ="UPDATE `secciones` SET `id_grado`=?,`id_alumno`=? WHERE id_alumno = ?";
            $params = array($this->idGrado, $this->idEstudiante, $this->idEstudiante);
            return Database::executeRow($sql, $params);
        }
        public function updateEstudiantes(){
            $sql ="UPDATE alumnos SET nombre=?,apellido=?,fecha_nacimiento=?,id_municipio=?,telefono=?, 
                    id_zona=?,NIE=?,genero=?,id_estado=?,id_religion=?,anio_ingreso=?,repite_grado=?, 
                    tarjeta_vacuna=?,id_discapacidad=?,prescripcion=?,partida=?,certificado=?, 
                    fecha_registro=?,correo=?,carnet=?,foto=? WHERE id= ?";
            $params = array($this->nombre, $this->apellido, $this->fecha , $this->idMunicipio, $this->telefono,
                             $this->idZona, $this->Nie, $this->genero, $this->idEstado, $this->idReligion, 
                            $this->anioIngreso, $this->repiteGrado, $this->tarjetaVacunas, $this->idDiscapacidad, 
                            $this->descripcion, $this->partida, $this->certificado, $this->fechaRegistro, 
                            $this->correo, $this->carnet, $this->foto, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteEstudiantes(){
            $sql ="UPDATE alumnos SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarEstudiantes(){
            $sql ="UPDATE alumnos SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

       
        
        public function getEstudiantes(){
            $sql = "SELECT A.id, A.nombre, A.apellido, A.fecha_nacimiento, M.municipio,  
                            A.telefono, Z.nombre AS Zona , A.NIE, A.genero, E.estado_familiar, R.religion, 
                            A.anio_ingreso, A.repite_grado, A.tarjeta_vacuna,  
                            A.prescripcion, A.partida, A.certificado, A.fecha_registro, A.usuario, 
                            A.contrasenia, A.correo, A.estado, A.carnet, A.foto , G.grado
                            FROM alumnos A, estado_familiar E, religiones R, municipios M, 
                            zona Z, grados G, secciones Se
                            WHERE A.id_municipio = M.id AND A.id_zona = Z.id 
                            AND A.id_estado = E.id AND A.id_religion = R.id  
                            AND Se.id_alumno = A.id AND G.id = Se.id_grado
                            AND A.estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getEstudiantesId(){
            $sql = "SELECT MAX(id) as id FROM alumnos WHERE estado = 0";
            $params = array($this->idEstudiante);
            $estudiantes = Database::getRow($sql, $params);
            if($estudiantes){
                $this->idEstudiante = $estudiantes['id'];
                return true;
            }else{
                return null;
            }
        }

        public function getEstudiantesNulas(){
            $sql = "SELECT A.id, A.nombre, A.apellido, A.fecha_nacimiento, M.municipio,  
                            A.telefono, Z.nombre AS Zona , A.NIE, A.genero, E.estado_familiar, R.religion, 
                            A.anio_ingreso, A.repite_grado, A.tarjeta_vacuna,  
                            A.prescripcion, A.partida, A.certificado, A.fecha_registro, A.usuario, 
                            A.contrasenia, A.correo, A.estado, A.carnet, A.foto , G.grado
                            FROM alumnos A, estado_familiar E, religiones R, municipios M, 
                            zona Z, grados G, secciones Se
                            WHERE A.id_municipio = M.id AND A.id_zona = Z.id 
                            AND A.id_estado = E.id AND A.id_religion = R.id  
                            AND Se.id_alumno = A.id AND G.id = Se.id_grado
                            AND A.estado = 1";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        

        public function readSecciones(){
            $sql = "SELECT id , id_grado, id_alumno FROM secciones WHERE id_alumno = ?";
            $params = array($this->idSeccion);
            $estudiantes = Database::getRow($sql, $params);
            if($estudiantes){
                $this->idSeccion = $estudiantes['id'];
                $this->idGrado = $estudiantes['id_grado'];
                $this->idEstudiante = $estudiantes['id_alumno'];
                return true;
            }else{
                return null;
            }
        }

        

        public function readFamiliares(){
            $sql = "SELECT `id`, `nombre`, `apellido`, `fecha_nacimiento`, `id_municipio`, `telefono`, 
                    `id_zona`, `NIE`, `genero`, `id_estado`, `id_religion`, `anio_ingreso`, 
                    `repite_grado`, `tarjeta_vacuna`, `id_discapacidad`, `prescripcion`, `partida`, 
                    `certificado`, `fecha_registro`, `usuario`, `correo`, `estado`, `carnet`, 
                    `foto` FROM `alumnos` WHERE estado = 0 AND id = ?";
            $params = array($this->id);
            $estudiantes = Database::getRow($sql, $params);
            if($estudiantes){
                $this->id = $estudiantes['id'];
                $this->nombre = $estudiantes['nombre'];
                $this->apellido = $estudiantes['apellido'];
                $this->fecha = $estudiantes['fecha_nacimiento'];
                $this->idMunicipio = $estudiantes['id_municipio'];
                $this->telefono = $estudiantes['telefono'];
                $this->idZona = $estudiantes['id_zona'];
                $this->Nie = $estudiantes['NIE'];
                $this->genero = $estudiantes['genero'];
                $this->idEstado = $estudiantes['id_estado'];
                $this->idReligion = $estudiantes['id_religion'];
                $this->anioIngreso = $estudiantes['anio_ingreso'];
                $this->repiteGrado = $estudiantes['repite_grado'];
                $this->tarjetaVacunas = $estudiantes['tarjeta_vacuna'];
                $this->idDiscapacidad = $estudiantes['id_discapacidad'];
                $this->descripcion = $estudiantes['prescripcion'];
                $this->partida = $estudiantes['partida'];
                $this->certificado = $estudiantes['certificado'];
                $this->fechaRegistro = $estudiantes['fecha_registro'];
                $this->usuarios = $estudiantes['usuario'];
                $this->correo = $estudiantes['correo'];
                $this->estado = $estudiantes['estado'];
                $this->carnet = $estudiantes['carnet'];
                $this->foto = $estudiantes['foto'];
                return true;
            }else{
                return null;
            }
        }

        public function readFamiliaresNulas(){
            $sql = "SELECT `id`, `nombre`, `apellido`, `fecha_nacimiento`, `id_municipio`, `telefono`, 
                    `id_zona`, `NIE`, `genero`, `id_estado`, `id_religion`, `anio_ingreso`, 
                    `repite_grado`, `tarjeta_vacuna`, `id_discapacidad`, `prescripcion`, `partida`, 
                    `certificado`, `fecha_registro`, `usuario`, `correo`, `estado`, `carnet`, 
                    `foto` FROM `alumnos` WHERE estado = 1 AND id = ?";
            $params = array($this->id);
            $estudiantes = Database::getRow($sql, $params);
            if($estudiantes){
                $this->id = $estudiantes['id'];
                $this->nombre = $estudiantes['nombre'];
                $this->apellido = $estudiantes['apellido'];
                $this->fecha = $estudiantes['fecha_nacimiento'];
                $this->idMunicipio = $estudiantes['id_municipio'];
                $this->telefono = $estudiantes['telefono'];
                $this->idZona = $estudiantes['id_zona'];
                $this->Nie = $estudiantes['NIE'];
                $this->genero = $estudiantes['genero'];
                $this->idEstado = $estudiantes['id_estado'];
                $this->idReligion = $estudiantes['id_religion'];
                $this->anioIngreso = $estudiantes['anio_ingreso'];
                $this->repiteGrado = $estudiantes['repite_grado'];
                $this->tarjetaVacunas = $estudiantes['tarjeta_vacuna'];
                $this->idDiscapacidad = $estudiantes['id_discapacidad'];
                $this->descripcion = $estudiantes['prescripcion'];
                $this->partida = $estudiantes['partida'];
                $this->certificado = $estudiantes['certificado'];
                $this->fechaRegistro = $estudiantes['fecha_registro'];
                $this->usuarios = $estudiantes['usuario'];
                $this->correo = $estudiantes['correo'];
                $this->estado = $estudiantes['estado'];
                $this->carnet = $estudiantes['carnet'];
                $this->foto = $estudiantes['foto'];
                return true;
            }else{
                return null;
            }
        }




        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/

        /**==========================================================================
         * SECCIONES DE SQL PARA COMBOBOX
         ============================================================================*/
        public function getMunicipios(){
            $sql = "SELECT `id`, `municipio`FROM `municipios` WHERE `estado` = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getZona(){
            $sql = "SELECT id, nombre FROM zona WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getEstadoFamiliar(){
            $sql = "SELECT id, estado_familiar FROM estado_familiar WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getReligion(){
            $sql = "SELECT `id`, `religion` FROM `religiones` WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getDiscapacidades(){
            $sql = "SELECT `id`, `discapacidad` FROM `discapacidades` WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getGrados(){
            $sql = "SELECT `id`, `grado` FROM `grados` WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        
        
        
        
        	public function readAlumno(){

		$sql = "SELECT id,nombre,apellido,correo  FROM alumnos WHERE usuario= ?";

		$params = array($this->usuarios);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->idEstudiante = $data['id'];

			$this->nombre=$data['nombre'];

			$this->apellido=$data['apellido'];
			
			$this->correo=$data['correo'];

			return true;

		}else{

			return false;

		}

	}
        /**==========================================================================
         * SECCIONES DE SQL PARA COMBOBOX
         ============================================================================*/

    }

?>