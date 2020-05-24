<?php 
    class TipoPrueba extends Validator{
        //Declarar variables 
        private $id = null;
        private $tipo = null;
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
        public function setTipo($value){
            if($this->validateAlphabetic($value, 1, 300)){
                $this->tipo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getTipo(){
            return $this->tipo;
        }
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchTipoPrueba($value){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 0
                    AND tipo LIKE ? ORDER BY tipo";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }
        public function searchTipoPruebaNulo($value){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 1
                    AND tipo LIKE ? ORDER BY tipo";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createTipoPrueba(){
            $sql ="INSERT INTO tipo_prueba (tipo, estado) VALUES (?,?)";
            $params = array($this->tipo, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateTipoPrueba(){
            $sql ="UPDATE tipo_prueba SET tipo=? ,estado=? WHERE id = ?";
            $params = array($this->tipo, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteTipoPrueba(){
            $sql ="UPDATE tipo_prueba SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarTipoPrueba(){
            $sql ="UPDATE tipo_prueba SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getTipoPrueba(){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 0
                    GROUP BY id, tipo, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getTipoPruebaNulas(){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 1
                    GROUP BY id, tipo, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readTipoPrueba(){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 0 AND id= ?
                    GROUP BY id, tipo, estado";
            $params = array($this->id);
            $tipoPruebas = Database::getRow($sql, $params);
            if($tipoPruebas){
                $this->id = $tipoPruebas['id'];
                $this->tipo = $tipoPruebas['tipo'];
                $this->estado = $tipoPruebas['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readTipoPruebaNulas(){
            $sql = "SELECT id, tipo, estado FROM tipo_prueba WHERE estado = 1 AND id= ?
                    GROUP BY id, tipo, estado";
            $params = array($this->id);
            $tipoPruebas = Database::getRow($sql, $params);
             if($tipoPruebas){
                $this->id = $tipoPruebas['id'];
                $this->tipo = $tipoPruebas['tipo'];
                $this->estado = $tipoPruebas['estado'];
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