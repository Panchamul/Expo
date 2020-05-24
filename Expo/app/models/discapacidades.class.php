<?php 
    class Discapacidad extends Validator{
        //Declarar variables 
        private $id = null;
        private $discapacidad = null;
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
        public function setDiscapacidad($value){
            if($this->validateAlphabetic($value, 1, 300)){
                $this->discapacidad = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getDiscapacidad(){
            return $this->discapacidad;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchDiscapacidad($value){
            $sql = "SELECT id, discapacidad, estado FROM discapacidades WHERE estado = 0
                    AND discapacidad LIKE ? ORDER BY discapacidad";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createDiscapacidades(){
            $sql ="INSERT INTO discapacidades (discapacidad, estado) VALUES (?,?)";
            $params = array($this->discapacidad, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateDiscapacidades(){
            $sql ="UPDATE discapacidades SET discapacidad=? ,estado=? WHERE id = ?";
            $params = array($this->discapacidad, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteDiscapacidades(){
            $sql ="UPDATE discapacidades SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarDiscapacidades(){
            $sql ="UPDATE discapacidades SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getDiscapacidades(){
            $sql = "SELECT id, discapacidad, estado FROM discapacidades WHERE estado = 0
                    GROUP BY id, discapacidad, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getDiscapacidadesNulas(){
            $sql = "SELECT id, discapacidad, estado FROM discapacidades WHERE estado = 1
                    GROUP BY id, discapacidad, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readDiscapacidades(){
            $sql = "SELECT id, discapacidad, estado FROM discapacidades WHERE estado = 0 AND id= ?
                    GROUP BY id, discapacidad, estado";
            $params = array($this->id);
            $discapacidades = Database::getRow($sql, $params);
            if($discapacidades){
                $this->id = $discapacidades['id'];
                $this->discapacidad = $discapacidades['discapacidad'];
                $this->estado = $discapacidades['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readDiscapacidadesNulas(){
            $sql = "SELECT id, discapacidad, estado FROM discapacidades WHERE estado = 1 AND id= ?
                    GROUP BY id, discapacidad, estado";
            $params = array($this->id);
            $discapacidades = Database::getRow($sql, $params);
            if($discapacidades){
                $this->id = $discapacidades['id'];
                $this->discapacidad = $discapacidades['discapacidad'];
                $this->estado = $discapacidades['estado'];
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