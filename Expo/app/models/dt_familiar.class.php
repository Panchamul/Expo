<?php 
    class DtFamiliar extends Validator{
        //Declarar variables 
        private $id = null;
        private $idFamiliar = null;
        private $idTipo = null;
        private $encargado = null;
        private $idAlumno = null;
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
         public function setIdAlumno($value){
            if($this->validateId($value)){
                $this->idAlumno = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdAlumno(){
            return $this->idAlumno;
        }

        //Elementos del id para ingresar
        public function setIdFamiliar($value){
            if($this->validateId($value)){
                $this->idFamiliar = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdFamiliar(){
            return $this->idFamiliar;
        }
        //ingresar el estado
        public function setIdTipo($value){
            if($this->validateId($value)){
                $this->idTipo = $value;
                return true;
            }else{
                return false;
            }
        }
        //recibir el estado
        public function getIdTipo(){
            return $this->idTipo;
        }
        //funcion para enviar la discapacidad
        public function setEncargado($value){
            if($this->validateAlphabetic($value, 1, 2)){
                $this->encargado = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getEncargado(){
            return $this->encargado;
        }

    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        
        public function createFamiliares(){
            $sql ="INSERT INTO detalle_familiar(id_familiar, id_tipo, encargado, id_alumno)
                 VALUES (?,?,?,?)";
            $params = array($this->idFamiliar, $this->idTipo, $this->encargado, $this->idAlumno);
            return Database::executeRow($sql, $params);
        }

        public function updateFamiliares(){
            $sql ="UPDATE detalle_familiar SET id_familiar=?,id_tipo=?,encargado=? WHERE id= ?";
            $params = array($this->idFamiliar, $this->idTipo, $this->encargado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function getFamiliares(){
            $sql = "SELECT id, nombre, apellido, fecha_nacimiento, ocupacion, 
                    nombre_trabajo, direccion_trabajo, telefono_trabajo, telefono, nivel_estudio, dui, estado 
                    FROM familiares WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function ReadIdFamiliarAlumno(){
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

        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/



    }

?>