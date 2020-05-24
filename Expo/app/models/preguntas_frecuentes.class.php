<?php 
    class Pregunta extends Validator{
        //Declarar variables 
        private $id = null;
        private $pregunta = null;
        private $respuesta = null;
        private $estado = null;
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
        public function setPregunta($value){
            if($this->validateAlphabetic($value, 1, 100)){
                $this->pregunta = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getPregunta(){
            return $this->pregunta;
        }

        //funcion para enviar la discapacidad
        public function setRespuesta($value){
            if($this->validateAlphabetic($value, 1, 300)){
                $this->respuesta = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getRespuesta(){
            return $this->respuesta;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchPreguntas($value){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas WHERE estado = 0
                    AND pregunta LIKE ? ORDER BY pregunta
                    ";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchPreguntasNula($value){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas estado = 1
                    AND pregunta LIKE ? ORDER BY pregunta";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createPreguntas(){
            $sql ="INSERT INTO preguntas (pregunta, respuesta, estado) VALUES (?,?,?)";
            $params = array($this->pregunta, $this->respuesta, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updatePreguntas(){
            $sql ="UPDATE preguntas SET pregunta=? , respuesta=?  WHERE id = ?";
            $params = array($this->pregunta, $this->respuesta,  $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deletePreguntas(){
            $sql ="UPDATE preguntas SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarPreguntas(){
            $sql ="UPDATE preguntas SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getPreguntas(){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas WHERE estado = 0
                    GROUP BY id, pregunta, respuesta, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getPreguntasNulas(){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas WHERE estado = 1
                    GROUP BY id, pregunta, respuesta, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readPreguntas(){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas WHERE estado = 0 AND id= ?
                    GROUP BY id, pregunta, respuesta, estado";
            $params = array($this->id);
            $preguntas = Database::getRow($sql, $params);
            if($preguntas){
                $this->id = $preguntas['id'];
                $this->pregunta = $preguntas['pregunta'];
                $this->respuesta = $preguntas['respuesta'];
                $this->estado = $preguntas['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readPreguntasNulas(){
            $sql = "SELECT id, pregunta, respuesta, estado FROM preguntas WHERE estado = 1 AND id= ?
                    GROUP BY id, pregunta, respuesta, estado";
            $params = array($this->id);
            $preguntas = Database::getRow($sql, $params);
            if($preguntas){
                $this->id = $preguntas['id'];
                $this->pregunta = $preguntas['pregunta'];
                $this->respuesta = $preguntas['respuesta'];
                $this->estado = $preguntas['estado'];
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