<?php 
    class Religion extends Validator{
        //Declarar variables 
        private $id = null;
        private $religion = null;
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
        public function setReligion($value){
            if($this->validateAlphabetic($value, 1, 20)){
                $this->religion = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getReligion(){
            return $this->religion;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchReligion($value){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 0
                    AND religion LIKE ? ORDER BY religion";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchReligionNula($value){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 1
                    AND religion LIKE ? ORDER BY religion";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createReligiones(){
            $sql ="INSERT INTO religiones (religion, estado) VALUES (?,?)";
            $params = array($this->religion, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateReligiones(){
            $sql ="UPDATE religiones SET religion=? ,estado=? WHERE id = ?";
            $params = array($this->religion, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteReligiones(){
            $sql ="UPDATE religiones SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarReligiones(){
            $sql ="UPDATE religiones SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getReligiones(){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 0
                    GROUP BY id, religion, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getReligionesNulas(){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 1
                    GROUP BY id, religion, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readReligiones(){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 0 AND id= ?
                    GROUP BY id, religion, estado";
            $params = array($this->id);
            $religiones = Database::getRow($sql, $params);
            if($religiones){
                $this->id = $religiones['id'];
                $this->religion = $religiones['religion'];
                $this->estado = $religiones['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readReligionesNulas(){
            $sql = "SELECT id, religion, estado FROM religiones WHERE estado = 1 AND id= ?
                    GROUP BY id, religion, estado";
            $params = array($this->id);
            $religiones = Database::getRow($sql, $params);
            if($religiones){
                $this->id = $religiones['id'];
                $this->religion = $religiones['religion'];
                $this->estado = $religiones['estado'];
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