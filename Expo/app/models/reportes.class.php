<?php
    class Reportes extends Validator {

        public function get_alumnos() 
        {
            $sql = "SELECT id, nombre, apellido, NIE, foto, carnet FROM alumnos ORDER BY nombre";
            $params = array(NULL);
            return Database:: getRows($sql, $params); 
        }

        public function get_registro($value)
        {
            $sql = "SELECT a.id, a.nombre, a.apellido, a.NIE, a.foto, a.carnet, g.grado FROM alumnos a , secciones s, grados g  WHERE a.id = s.id_alumno and g.id = s.id_grado and g.id=?";
            $params = array($value);
            return Database:: getRows($sql, $params); 
        }
    }
    
?>