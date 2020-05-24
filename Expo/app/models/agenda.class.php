<?php 
    class Agenda extends Validator{
        //Declarar variables 
        private $id = null;
        private $id_maestro = null;
        private $id_curso = null;
        private $titulo = null;
        private $cuerpo = null;
        private $fecha = null;
        private $estado = null;
        private $idEstudiante = null;
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
        public function setIdEstudiante($value){
            if($this->validateId($value)){
                $this->idEstudiante = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdEstudiante(){
            return $this->idEstudiante;
        }

        //Elementos del id para ingresar
        public function setIdMaestro($value){
            if($this->validateId($value)){
                $this->id_maestro = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdMaestro(){
            return $this->id_maestro;
        }
        //Elementos del id para ingresar
        public function setIdCurso($value){
            if($this->validateId($value)){
                $this->id_curso = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdCurso(){
            return $this->id_curso;
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
        public function setTitulo($value){
            if($this->validateAlphabetic($value, 1, 30)){
                $this->titulo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getTitulo(){
            return $this->titulo;
        }
        //funcion para enviar la discapacidad
        public function setCuerpo($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->cuerpo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getCuerpo(){
            return $this->cuerpo;
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

    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function getCursos(){
            $sql = "SELECT C.id,  G.grado, M.materia FROM curso C, materias M,  maestros U, grados G 
                    WHERE M.id = C.id_materia AND C.id_maestro = U.id AND C.id_grado = G.id  AND  U.id = ? AND C.estado =0";
            $params = array($this->id_maestro);
            return Database::getRows($sql, $params);
        }
        public function getCursosEstudiante(){
            $sql = "SELECT C.id,  G.grado, M.materia FROM curso C, materias M,  maestros U, grados G, alumnos A, secciones S
                    WHERE M.id = C.id_materia AND C.id_maestro = U.id AND C.id_grado = G.id AND A.id = S.id_alumno AND S.id_grado = G.id
                    AND  A.id = ? AND C.estado =0";
            $params = array($this->idEstudiante);
            return Database::getRows($sql, $params);
        }

        public function searchAgenda($value){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A, curso C, maestros U WHERE A.id_maestro = U.id AND A.id_curso = C.id AND A.estado = 0 AND U.estado=0 and A.id_curso=? and A.titulo like ?  group by A.id";
            $params = array($this->id_curso,"%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchAgendaNula($value){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 1 AND U.estado=0 
                    AND A.titulo LIKE ? OR A.cuerpo LIKE ?";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createAgenda(){
            $sql ="INSERT INTO `recordatorios`(`titulo`, `cuerpo`, `fecha`, `id_maestro`, `id_curso`, `estado`) VALUES (?,?,?,?,?,?)";
            $params = array($this->titulo, $this->cuerpo, $this->fecha , $this->id_maestro, $this->id_curso,
                             $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateAgenda(){
            $sql ="UPDATE `recordatorios` SET `titulo`=?,`cuerpo`=?,`fecha`=?,`id_maestro`=? WHERE id = ?";
            $params = array($this->titulo, $this->cuerpo, $this->fecha , $this->id_maestro,$this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteAgenda(){
            $sql ="UPDATE recordatorios SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarAgenda(){
            $sql ="UPDATE recordatorios SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

       
        
        public function getAgenda(){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 0 AND U.estado=0 AND C.id = ?";
            $params = array($this->id_curso);
            return Database::getRows($sql, $params);
        }
        public function getAgendaEstudiante(){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 0 AND U.estado=0 AND A.id = ?";
            $params = array($this->idEstudiante);
            return Database::getRows($sql, $params);
        }

        public function getAgendasNulas(){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 1 AND U.estado=0 AND C.id = ?";
            $params = array($this->id_curso);
            return Database::getRows($sql, $params);
        }
        
        

        public function readAgenda(){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 0 AND U.estado=0 AND A.id = ?";
            $params = array($this->id);
            $agendas = Database::getRow($sql, $params);
            if($agendas){
                $this->id = $agendas['id'];
                $this->titulo = $agendas['titulo'];
                $this->cuerpo = $agendas['cuerpo'];
                $this->fecha = $agendas['fecha'];
                $this->nombre = $agendas['nombre'];
                return true;
            }else{
                return null;
            }
        }

        public function readAgendaNulas(){
            $sql = "SELECT A.id , A.titulo, A.cuerpo, A.fecha, U.nombre FROM recordatorios A,  curso C, maestros U
                    WHERE A.id_maestro = U.id AND A.id_curso = 	C.id AND A.estado = 1 AND U.estado=0 AND A.id = ?";
            $params = array($this->id);
            $agendas = Database::getRow($sql, $params);
            if($agendas){
                $this->id = $agendas['id'];
                $this->titulo = $agendas['titulo'];
                $this->cuerpo = $agendas['cuerpo'];
                $this->fecha = $agendas['fecha'];
                $this->nombre = $agendas['nombre'];
                return true;
            }else{
                return null;
            }return null;
        }

        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/



    }

?>