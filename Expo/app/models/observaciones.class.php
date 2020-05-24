<?php 
    class Observacion extends Validator{
        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/

        /*===========================================================================
        COMIENZO DE LA SECCION PARA INGRESAR CODIGOS A LOS ALUMNOS
        ============================================================================*/
        //Aca esta la parte del alumno para agregar codigosd
        private $id = null;
        private $observacion = null;
        private $idAlumno = null;
        private $idMaestro = null;
        private $fecha = null;
        private $estado = null;
        private $maestro = null;
        private $alumno = null;

        //Funcion para recolectar el id
        public function getAlumno(){
            return $this->alumno;
        }
        //Funcion para recolectar el id
        public function getMestro(){
            return $this->maestro;
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

        //Elementos del id para ingresar
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
        public function setIdMaestro($value){
            if($this->validateId($value)){
                $this->idMaestro = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdMaestro(){
            return $this->idMaestro;
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
        public function setObservacion($value){
            if($this->validateAlphabetic($value, 1, 300)){
                $this->observacion = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getObservacion(){
            return $this->observacion;
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
        /*===============================================================================
        Comienzo de los SCRUD de la seccion de agregar codigos a los alumnos
        ===============================================================================?*/
        public function getObservaciones(){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado ,A.carnet , A.id AS idAlumno , U.id AS idMaestro
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 0 
                    AND A.estado = 0 AND U.estado = 0 AND A.id =? AND U.id = ?";
            $params = array($this->idAlumno, $this->idMaestro);
            return Database::getRows($sql, $params);
        }
         public function getObservacionesVistosPorEstudiantes(){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado ,A.carnet , A.id AS idAlumno , U.id AS idMaestro
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 0 
                    AND A.estado = 0 AND U.estado = 0 AND A.id =?";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }
        

        public function getObservacionesNulas(){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado , carnet, A.id AS idAlumno , U.id AS idMaestro
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 1
                    AND A.estado = 0 AND U.estado = 0 AND A.id =?";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }


        public function SearchObservaciones($value){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado , carnet
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 0 
                    AND A.estado = 0 AND U.estado = 0
                    AND A.id =? AND U.id =?
                    AND A.nombre LIKE ? ";
            $params = array($this->idAlumno, $this->idMaestro,"%$value%");
            return Database::getRows($sql, $params);
        }


        public function readObservacionesAlumno(){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado 
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 0 
                    AND A.estado = 0 AND U.estado = 0 AND A.id = ? AND U.id = ? AND O.id = ?";
            $params = array($this->idAlumno, $this->idMaestro, $this->id);
            $observaciones = Database::getRow($sql, $params);
            if($observaciones){
                $this->id = $observaciones['id'];
                $this->observacion = $observaciones['observacion'];
                $this->alumno = $observaciones['alumno'];
                $this->maestro = $observaciones['maestro'];
                $this->fecha = $observaciones['fecha'];
                $this->estado = $observaciones['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readObservacionesAlumnoNulas(){
            $sql = "SELECT O.id, O.observacion, A.nombre 
                    AS alumno, U.nombre as maestro, O.fecha, O.estado 
                    FROM observaciones O, alumnos A, maestros U 
                    WHERE O.id_alumno = A.id AND O.id_maestro = U.id AND O.estado = 1 
                    AND A.estado = 0 AND U.estado = 0  AND A.id = ? AND U.id = ?  AND O.id = ?";
            $params = array($this->idAlumno, $this->idMaestro, $this->id);
            $observaciones = Database::getRow($sql, $params);
            if($observaciones){
                $this->id = $observaciones['id'];
                $this->observacion = $observaciones['observacion'];
                $this->alumno = $observaciones['alumno'];
                $this->maestro = $observaciones['maestro'];
                $this->fecha = $observaciones['fecha'];
                $this->estado = $observaciones['estado'];
                return true;
            }else{
                return null;
            }
        }

        public function CreateObservaciones(){
            $sql ="INSERT INTO observaciones(observacion, id_alumno, id_maestro, fecha, estado) VALUES (?,?,?,?,?)";
            $params = array($this->observacion, $this->idAlumno, $this->idMaestro, $this->fecha, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function UpdateObservaciones(){
            $sql ="UPDATE observaciones SET observacion=?,id_alumno=?,id_maestro=?,fecha=?,estado=? WHERE id = ?";
            $params = array($this->observacion, $this->idAlumno, $this->idMaestro, $this->fecha, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function DeleteObservaciones(){
            $sql ="UPDATE observaciones SET estado=1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        public function HabilitarObservaciones(){
            $sql ="UPDATE observaciones SET estado=0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function ColorCodigos($gravedad){
            if($gravedad == 'Grave' || $gravedad =='grave'){
                return "red darken-4";
            }else if($gravedad == 'Leve' || $gravedad =='leve'){
                return "amber darken-3";
            }else if($gravedad == 'Positivo' || $gravedad =='positivo'){
                return "teal";
            }else{
                return "blue";
            }
        }
        /*===============================================================================
        Comienzo de los SCRUD de la seccion de agregar codigos a los alumnos
        ===============================================================================?*/
        /*===========================================================================
        FIN DE LA SECCION PARA INGRESAR CODIGOS A LOS ALUMNOS
        ============================================================================*/
    }