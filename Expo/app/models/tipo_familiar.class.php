<?php 
    class TipoFamiliar extends Validator{
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
        public function searchTipoFamiliar($value){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 0
                    AND tipo LIKE ? ORDER BY tipo";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchTipoFamiliarNula($value){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 1
                    AND tipo LIKE ? ORDER BY tipo";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createTipoFamiliar(){
            $sql ="INSERT INTO tipo_familiar (tipo, estado) VALUES (?,?)";
            $params = array($this->tipo, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateTipoFamiliar(){
            $sql ="UPDATE tipo_familiar SET tipo=? ,estado=? WHERE id = ?";
            $params = array($this->tipo, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
        }

        public function deleteTipoFamiliar(){
            $sql ="UPDATE tipo_familiar SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarTipoFamiliar(){
            $sql ="UPDATE tipo_familiar SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getTipoFamiliar(){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 0
                    GROUP BY id, tipo, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function getTipoFamiliarCombobox(){
            $sql = "SELECT id, tipo FROM tipo_familiar WHERE estado = 0
                    GROUP BY id, tipo";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function getTipoFamiliarNulas(){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 1
                    GROUP BY id, tipo, estado";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        

        public function readTipoFamiliar(){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 0 AND id= ?
                    GROUP BY id, tipo, estado";
            $params = array($this->id);
            $tipoFamiliares = Database::getRow($sql, $params);
            if($tipoFamiliares){
                $this->id = $tipoFamiliares['id'];
                $this->tipo = $tipoFamiliares['tipo'];
                $this->estado = $tipoFamiliares['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readTipoFamiliarNulas(){
            $sql = "SELECT id, tipo, estado FROM tipo_familiar WHERE estado = 1 AND id= ?
                    GROUP BY id, tipo, estado";
            $params = array($this->id);
            $tipoFamiliares = Database::getRow($sql, $params);
             if($tipoFamiliares){
                $this->id = $tipoFamiliares['id'];
                $this->tipo = $tipoFamiliares['tipo'];
                $this->estado = $tipoFamiliares['estado'];
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