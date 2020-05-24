<?php 
    class Estado extends Validator{
        //Declarar variables 
        private $id = null;
        private $estadoFamiliar = null;
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
        public function setEstadoFamiliar($value){
            if($this->validateAlphabetic($value, 1, 20)){
                $this->estadoFamiliar = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getEstadoFamiliar(){
            return $this->estadoFamiliar;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchEstadoFamiliar($value){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 0
                    AND estado_familiar LIKE ? ORDER BY estado_familiar";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchEstadoFamiliarNula($value){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 1
                    AND estado_familiar LIKE ? ORDER BY estado_familiar";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createEstadoFamiliar(){
            $sql ="INSERT INTO estado_familiar (estado_familiar, estado) VALUES (?,?)";
            $params = array($this->estadoFamiliar, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateEstadoFamiliar(){
            $sql ="UPDATE estado_familiar SET estado_familiar=? ,estado=? WHERE id = ?";
            $params = array($this->estadoFamiliar, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteEstadoFamiliar(){
            $sql ="UPDATE estado_familiar SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarEstadoFamiliar(){
            $sql ="UPDATE estado_familiar SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getEstadosFamiliares(){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 0
                    GROUP BY id, estado_familiar, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getEstadosFamiliaresNulos(){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 1
                    GROUP BY id, estado_familiar, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readEstadoFamiliar(){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 0 AND id= ?
                    GROUP BY id, estado_familiar, estado";
            $params = array($this->id);
            $estados = Database::getRow($sql, $params);
            if($estados){
                $this->id = $estados['id'];
                $this->estadoFamiliar = $estados['estado_familiar'];
                $this->estado = $estados['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readEstadoFamiliarNulas(){
            $sql = "SELECT id, estado_familiar, estado FROM estado_familiar WHERE estado = 1 AND id= ?
                    GROUP BY id, estado_familiar, estado";
            $params = array($this->id);
            $estados = Database::getRow($sql, $params);
            if($estados){
                $this->id = $estados['id'];
                $this->estadoFamiliar = $estados['estado_familiar'];
                $this->estado = $estados['estado'];
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