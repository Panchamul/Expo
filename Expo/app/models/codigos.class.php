<?php 
    class Codigo extends Validator{
        //Declarar variables 
        private $id = null;
        private $codigo = null;
        private $idCodigo = null;
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

        //Elementos del id para ingresar
        public function setIdCodigo($value){
            if($this->validateId($value)){
                $this->idCodigo = $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el id
        public function getIdCodigo(){
            return $this->idCodigo;
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
        public function setCodigo($value){
            if($this->validateAlphabetic($value, 1, 300)){
                $this->codigo = $value;
                return true;
            }else{
                return false;
            }
        }
        //funcion para recolectar la discapacidad
        public function getCodigo(){
            return $this->codigo;
        }
        
    /*========================================================================
    FIN DE SENTENCIAS GET Y SET
    ==========================================================================*/


    /*========================================================================
    INICIO DE ELEMENTOS SCRUD
    ==========================================================================*/
        public function searchCodigos($value){
            $sql = "SELECT codigos.codigo, codigos.id, codigos.estado, tipo_codigo.tipo 
                    FROM codigos INNER JOIN tipo_codigo 
                    WHERE codigos.id_tipo = tipo_codigo.id AND codigos.estado = 0 
                    AND codigos.codigo like ?";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function searchCodigosNulas($value){
            $sql = "SELECT codigos.codigo, codigos.id, codigos.estado, tipo_codigo.tipo 
                    FROM codigos INNER JOIN tipo_codigo 
                    WHERE codigos.id_tipo = tipo_codigo.id AND codigos.estado = 1
                    AND codigos.codigo like ?";
            $params = array("%$value%");
            return Database::getRows($sql, $params);
        }

        public function createCodigos(){
            $sql ="INSERT INTO codigos (codigo, id_tipo, estado) VALUES (?,?,?)";
            $params = array($this->codigo, $this->idCodigo, $this->estado);
            return Database::executeRow($sql, $params);
        }

        public function updateCodigos(){
            $sql ="UPDATE codigos SET codigo=?,  id_tipo= ?, estado=? WHERE id = ?";
            $params = array($this->codigo, $this->idCodigo, $this->estado, $this->id);
            return Database::executeRow($sql, $params);
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
        public function deleteCodigos(){
            $sql ="UPDATE codigos SET estado = 1 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }

        public function habilitarCodigos(){
            $sql ="UPDATE codigos SET estado = 0 WHERE id = ?";
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        }
        
        public function getCodigos(){
            $sql = "SELECT codigos.codigo, codigos.id, codigos.estado, tipo_codigo.tipo 
                    FROM codigos INNER JOIN tipo_codigo 
                    WHERE codigos.id_tipo = tipo_codigo.id AND codigos.estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getCodigosNulas(){
            $sql = "SELECT codigos.codigo, codigos.id, codigos.estado, tipo_codigo.tipo 
                    FROM codigos INNER JOIN tipo_codigo 
                    WHERE codigos.id_tipo = tipo_codigo.id AND codigos.estado = 1 ";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function getTipoCodigos(){
            $sql = "SELECT id, tipo FROM tipo_codigo WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        
        public function readGrados2(){
            $sql = "SELECT grado from grados where id=?";
            $params = array($this->id);
            $codigos = Database::getRow($sql, $params);
            if($codigos){
                $this->codigo= $codigos['grado']; 
                return true;
            }else{
                return null;
            }
        } 
        public function readCodigos(){
            $sql = "SELECT id, codigo, id_tipo, estado FROM codigos WHERE estado = 0 AND id= ?
                    GROUP BY id, codigo, id_tipo, estado";
            $params = array($this->id);
            $codigos = Database::getRow($sql, $params);
            if($codigos){
                $this->id = $codigos['id'];
                $this->codigo = $codigos['codigo'];
                $this->idCodigo = $codigos['id_tipo'];
                $this->estado = $codigos['estado'];
                return true;
            }else{
                return null;
            }
        }
        public function readCodigosNulas(){
            $sql = "SELECT id, codigo, id_tipo, estado FROM codigos WHERE estado = 1 AND id= ?
                    GROUP BY id, codigo, id_tipo, estado";
            $params = array($this->id);
            $codigos = Database::getRow($sql, $params);
            if($codigos){
                $this->id = $codigos['id'];
                $this->codigo = $codigos['codigo'];
                $this->idCodigo = $codigos['id_tipo'];
                $this->estado = $codigos['estado'];
                return true;
            }else{
                return null;
            }
        }

        /*========================================================================
        FIN DE ELEMENTOS SCRUD
        ==========================================================================*/

        /*===========================================================================
        COMIENZO DE LA SECCION PARA INGRESAR CODIGOS A LOS ALUMNOS
        ============================================================================*/
        //Aca esta la parte del alumno para agregar codigosd
        private $nombre = null;
        private $apellido = null;
        private $carnet = null;
        private $idAlumno = null;
        private $foto = null;
        private $idTipo = null;
        private $idMaestro = null;
        private $fecha = null;
        private $descripcion = null;
        private $grado=null;
        public function setFecha($value){
            $this->fecha = $value;
            return true;
            
        }

        public function setDescripcion($value){
            $this->descripcion = $value;
            return true;
        }
        
        
        public function setGrado($value){
            if($this->validateAlphanumeric($value,1,50)){
                $this->grado= $value;
                return true;
            }else{
                return false;
            }
        }
        //Funcion para recolectar el nombre de la materia
        public function getGrado(){
            return $this->grado;
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

        public function setIdMaestro($value){
            if($this->validateId($value)){
                $this->idMaestro = $value;
                return true;
            }else{
                return false;
            }
        }

        public function setIdTipo($value){
            if($this->validateId($value)){
                $this->idTipo = $value;
                return true;
            }else{
                return false;
            }
        }

        //Funcion para recolectar el id
        public function getNombre(){
            return $this->nombre;
        }

        //Funcion para recolectar el id
        public function getFoto(){
            return $this->foto;
        }
        
        public function getApellido(){
            return $this->apellido;
        }

        //Funcion para recolectar el id
        public function getIdAlumno(){
            return $this->idAlumno;
        }
        
        public function getCarnet(){
            return $this->carnet;
        }
        /*===============================================================================
        Comienzo de los SCRUD de la seccion de agregar codigos a los alumnos
        ===============================================================================?*/
        public function getAlumnos(){
            $sql = "SELECT id, alumnos.nombre, alumnos.apellido, alumnos.carnet FROM alumnos 
                    WHERE estado = 0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }


        public function SearchAlumnos($value){
            $sql = "SELECT  alumnos.id, alumnos.nombre, alumnos.apellido, alumnos.carnet FROM alumnos 
                    WHERE estado = 0 AND alumnos.nombre LIKE ? OR alumnos.apellido LIKE ? OR alumnos.carnet LIKE ?";
            $params = array("%$value%","%$value%","%$value%");
            return Database::getRows($sql, $params);
        }

        public function readAlumnos(){
            $sql = "SELECT id, alumnos.nombre, alumnos.apellido, alumnos.carnet, alumnos.foto FROM alumnos 
                    WHERE estado = 0 AND id = ?";
            $params = array($this->idAlumno);
            $codigos = Database::getRow($sql, $params);
            if($codigos){
                $this->id = $codigos['id'];
                $this->nombre = $codigos['nombre'];
                $this->apellido = $codigos['apellido'];
                $this->carnet = $codigos['carnet'];
                $this->foto = $codigos['foto'];
                return true;
            }else{
                return null;
            }
        }

        public function getCodigoAsignar(){
            $sql = "SELECT codigos.id, codigos.codigo FROM codigos WHERE codigos.id_tipo = ?";
            $params = array($this->idTipo);
            return Database::getRows($sql, $params);
        }
        public function checkCarnet(){
            $sql = "SELECT nombre,apellido,grado FROM alumnos inner join secciones on secciones.id_alumno=alumnos.id inner join grados
            on grados.id=secciones.id_grado and carnet= ? ";
            $params = array($this->idAlumno);
            $data = Database::getRow($sql, $params);
            if($data){
                $this->id = $data['nombre']; 
                $this->codigo=$data['apellido'];
                $this->foto=$data['grado'];
                return true;
            }else{
                return false;
            }
        }
        public function getCodigoAlumnos(){
            $sql = "SELECT C.codigo, T.tipo, H.descripcion, H.fecha , A.nombre, A.apellido
                    FROM alumnos A, historial_codigos H, codigos C, tipo_codigo T 
                    WHERE A.id = H.id_alumno AND H.id_codigo = C.id AND T.id = C.id_tipo AND A.id = ?";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }
        public function getGrados(){
            $sql = "SELECT id,grado from grados where estado=0";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getCodigoAlumnos1(){
            $sql = "SELECT C.codigo, T.tipo, H.descripcion, H.fecha , M.nombre,M.apellido
                    FROM alumnos A inner join historial_codigos H on H.id_alumno=A.id inner join codigos C on C.id=H.id_codigo
                    inner join tipo_codigo T on T.id=C.id_tipo inner join maestros M on M.id=H.id_maestro AND A.carnet = ?";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }
        public function getCodigosEspecial(){
            $sql = "SELECT codigo from codigos inner join tipo_codigo on tipo_codigo.id=codigos.id_tipo where codigos.estado=0 and 
            tipo_codigo.estado=0 and codigos.id_tipo=?";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }
        public function getCodigosEspecial0(){
            $sql = "SELECT tipo_codigo.id,tipo from  tipo_codigo inner join codigos on codigos.id_tipo=tipo_codigo.id where tipo_codigo.estado=0 group by tipo_codigo.id";
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function getCodigoAlumnos2(){
            $sql = "  SELECT C.codigo, T.tipo, H.descripcion, H.fecha , A.nombre, A.apellido FROM alumnos A, historial_codigos H, codigos C, tipo_codigo T,curso k,
            grados G,maestros M WHERE A.id = H.id_alumno AND H.id_codigo = C.id AND T.id = C.id_tipo AND
             k.id_grado=G.id and M.id=K.id_maestro and H.id_maestro=M.id and G.id=? group by h.id
            ";
            $params = array($this->idAlumno);
            return Database::getRows($sql, $params);
        }
        public function getCodigoAlumnos3($value1,$value2){
            $sql = "  SELECT C.codigo, T.tipo, H.descripcion, H.fecha , A.nombre, A.apellido FROM alumnos A, historial_codigos H, codigos C, tipo_codigo T,curso k,
            grados G,maestros M WHERE A.id = H.id_alumno AND H.id_codigo = C.id AND T.id = C.id_tipo AND
             k.id_grado=G.id and M.id=K.id_maestro and H.id_maestro=M.id and G.id=? and H.fecha between ? and ? group by h.id
            ";
            $params = array($this->idAlumno,$value1,$value2);
            return Database::getRows($sql, $params);
        }
        public function readCodigosAsignar(){
            $sql = "SELECT codigos.id, codigos.codigo FROM codigos WHERE codigos.id_tipo = ?";
            $params = array($this->idTipo);
            $codigos = Database::getRow($sql, $params);
            if($codigos){
                $this->id = $codigos['id'];
                $this->codigo = $codigos['codigo'];
                return true;
            }else{
                return null;
            }
        }

        public function AsignarCodigos(){
            $sql ="INSERT INTO historial_codigos(id_alumno, id_maestro, id_codigo, fecha, descripcion) VALUES (?,?,?,?,?)";
            $params = array($this->idAlumno, $this->idMaestro, $this->idCodigo, $this->fecha, $this->descripcion);
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
        /*===========================================================================f
        FIN DE LA SECCION PARA INGRESAR CODIGOS A LOS ALUMNOS
        ============================================================================*/

    }

?>