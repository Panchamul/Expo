<?php 
    class Familiar extends Validator{
        //Declarar variables 
        private $id = null;
        private $nombre = null;
        private $apellido = null;
        private $fecha = null;
        private $ocupacion = null;
        private $nombreTrabajo = null;
        private $direccionTrabajo = null;
        private $telefonoTrabajo = null;
        private $telefono = null;
        private $nivelEstudio = null;
        private $dui = null;
        private $estado = null;
        private $id_alumno = null;

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

        //Elementos del id para ingresar
        public function setIdAlumno($value){
            if($this->validateId($value)){
                $this->id_alumno = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdAlumno(){
            return $this->id_alumno;
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
        //funcion para enviar la discapacidad
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
        //funcion para enviar la discapacidad
        public function setOcupacion($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->ocupacion = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getOcupacion(){
            return $this->ocupacion;
        }
        //funcion para enviar la discapacidad
        public function setTrabajo($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->nombreTrabajo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getTrabajo(){
            return $this->nombreTrabajo;
        }
        //funcion para enviar la discapacidad
        public function setDireccionTrabajo($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->direccionTrabajo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getDireccionTrabajo(){
            return $this->direccionTrabajo;
        }
        //funcion para enviar la discapacidad
        public function setTelefonoTrabajo($value){
            $this->telefonoTrabajo = $value;
            return true;
            
        }
        //funcion para recolectar la discapacidad
        public function getTelefonoTrabajo(){
            return $this->telefonoTrabajo;
        }
        //funcion para enviar la discapacidad
        public function setTelefono($value){
            $this->telefono = $value;
            return true;
            
        }
        //funcion para recolectar la discapacidad
        public function getTelefono(){
            return $this->telefono;
        }
        //funcion para enviar la discapacidad
        public function setNivelEstudio($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->nivelEstudio = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getNivelEstudio(){
            return $this->nivelEstudio;
        }
        //funcion para enviar la discapacidad
        public function setDui($value){
            $this->dui = $value;
            return true;
            
        }
        //funcion para recolectar la discapacidad
        public function getDui(){
            return $this->dui;
        }

    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchFamiliares($value){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares 
                    WHERE nombre LIKE ?  AND estado = 0
                    ";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searcFamiliaressNula($value){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE  nombre LIKE ? or apellido LIKE ? AND estado = 1";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createFamiliares(){
            $sql ="INSERT INTO familiares(nombre, apellido, fecha_nacimiento, ocupacion, nombre_trabajo, 
                    direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado, id_alumno) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = array($this->nombre, $this->apellido, $this->fecha , $this->ocupacion, $this->nombreTrabajo,
                             $this->direccionTrabajo, $this->telefonoTrabajo, $this->telefono, $this->nivelEstudio,
                            $this->dui, $this->estado , $this->id_alumno);
            return Database::executeRow($sql, $params);
        }

        public function updateFamiliares(){
            $sql ="UPDATE familiares SET nombre=?,apellido=?,fecha_nacimiento=?,ocupacion=?,nombre_trabajo=?,
                    direccion_trabajo=?,telefono_trabajo=?,telefono=?,nivel_estudio=?,dui=?,estado=? WHERE id= ?";
            $params = array($this->nombre, $this->apellido, $this->fecha , $this->ocupacion, $this->nombreTrabajo,
                             $this->direccionTrabajo, $this->telefonoTrabajo, $this->telefono, $this->nivelEstudio,
                            $this->dui, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteFamiliares(){
            $sql ="UPDATE familiares SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarFamiliares(){
            $sql ="UPDATE familiares SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

       
        
        public function getFamiliares(){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function getIdFamiliarAlumno(){
            $sql = "SELECT MAX(id) AS id_alumno FROM familiares WHERE id_alumno = ?";
            $params = array($this->id_alumno);
            $familiares = Database::getRow($sql, $params);
            if($familiares){
                $this->id_alumno = $familiares['id_alumno'];
                return true;
            }else{
                return null;
            }
        }


        public function getFamiliaresNulas(){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE estado = 1";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readFamiliares(){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE estado = 0 AND id = ?";
            $params = array($this->id);
            $familiares = Database::getRow($sql, $params);
            if($familiares){
                $this->id = $familiares['id'];
                $this->nombre = $familiares['nombre'];
                $this->apellido = $familiares['apellido'];
                $this->fecha = $familiares['fecha_nacimiento'];
                $this->ocupacion = $familiares['ocupacion'];
                $this->nombreTrabajo = $familiares['nombre_trabajo'];
                $this->direccionTrabajo = $familiares['direccion_trabajo'];
                $this->telefonoTrabajo = $familiares['telefono_trabajo'];
                $this->telefono = $familiares['telefono'];
                $this->nivelEstudio = $familiares['nivel_estudio'];
                $this->dui = $familiares['dui'];
                $this->estado = $familiares['estado'];
                return true;
            }else{
                return null;
            }
        }

        public function readFamiliaresNulas(){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE estado = 1 AND id = ?";
            $params = array($this->id);
            $familiares = Database::getRow($sql, $params);
            if($familiares){
                $this->id = $familiares['id'];
                $this->nombre = $familiares['nombre'];
                $this->apellido = $familiares['apellido'];
                $this->fecha = $familiares['fecha_nacimiento'];
                $this->ocupacion = $familiares['ocupacion'];
                $this->nombreTrabajo = $familiares['nombre_trabajo'];
                $this->direccionTrabajo = $familiares['direccion_trabajo'];
                $this->telefonoTrabajo = $familiares['telefono_trabajo'];
                $this->telefono = $familiares['telefono'];
                $this->nivelEstudio = $familiares['nivel_estudio'];
                $this->dui = $familiares['dui'];
                $this->estado = $familiares['estado'];
                return true;
            }else{
                return null;
            }
        }

        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/



    }

?>