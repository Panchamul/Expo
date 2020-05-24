<?php

class Notas extends Validator{

	//Declaracion de las variables a utilizar

	private $id= null;

	private $nota=null; 

    private $curso=null;

    private $perfil=null;

	private $tipo=null;

    private $mes=null;

		private $maestro=null;

		private $materia=null;

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

	public function setMes($value){ 

		$this->mes = $value;

		return true;  

}

//Funcion para recolectar el id

public function getMes(){

	return $this->mes;

}

public function setMateria($value){ 

	$this->materia= $value;

	return true;  

}

//Funcion para recolectar el id

public function getMateria(){

return $this->materia;

}

    public function setTipo($value){ 

			$this->tipo = $value;

			return true;  

    }

    //Funcion para recolectar el id

	public function getTipo(){

		return $this->tipo;

	}

	//Elementos  para ingresar el nombre de la materia

	public function setCurso($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->curso= $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el nombre de la materia

	public function getCurso(){

		return $this->curso;

    }   

    //Elementos  para ingresar el nombre de la materia

	public function setMaestro($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->maestro= $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el nombre de la materia

	public function getMaestro(){

		return $this->maestro;

    }  

    //Elementos  para ingresar el nombre de la materia

	public function setPerfil($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->perfil= $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el nombre de la materia

	public function getPerfil(){

		return $this->perfil;

    }  

	public function searchMateriasAdmin($value){

        $sql = "SELECT evaluaciones.id as id,perfil,tipo,curso.id as id_curso,materias.materia as materia,grados.grado as grado,

        evaluaciones.id_curso as id1,id_mes from 

        evaluaciones,tipo_prueba,curso,maestros,materias,grados where curso.id=evaluaciones.id_curso and maestros.id=? 

         and materias.id=curso.id_materia and materias.estado=0 and grados.estado=0 and curso.estado=0 and grados.id=curso.id_grado and tipo_prueba.id=evaluaciones.id_tipo

         and maestros.id=curso.id_maestro and grados.grado like ? ";

		$params = array($this->id,"%$value");

		return Database::getRows($sql, $params);

		}
    public function getPerfiles(){

        $sql = "SELECT evaluaciones.id as id,perfil,tipo,curso.id as id_curso,materias.materia as materia,grados.grado as grado,

        evaluaciones.id_curso as id1,id_mes from 

        evaluaciones,tipo_prueba,curso,maestros,materias,grados where curso.id=evaluaciones.id_curso and maestros.id=? 

         and materias.id=curso.id_materia and materias.estado=0 and grados.estado=0 and curso.estado=0 and grados.id=curso.id_grado and tipo_prueba.id=evaluaciones.id_tipo

         and maestros.id=curso.id_maestro ";

		$params = array($this->id);

		return Database::getRows($sql, $params);

		}

		public function getPerfiles2(){

			$sql = "SELECT evaluaciones.id as id,perfil,tipo,materias.materia as materia,grados.grado as grado,

			evaluaciones.id_curso as id1,id_mes from 

			evaluaciones,tipo_prueba,curso,maestros,materias,grados where curso.id=evaluaciones.id_curso and curso.id=? 

			 and materias.id=curso.id_materia and grados.id=curso.id_grado and tipo_prueba.id=evaluaciones.id_tipo

			 and maestros.id=curso.id_maestro ";

	$params = array($this->id);

	return Database::getRows($sql, $params);

	}

    public function getTipos(){

		$sql = "SELECT id,tipo from tipo_prueba where estado=0";

		$params = array(null);

		return Database::getRows($sql, $params);

    }

    public function getCursos(){

		$sql = "SELECT curso.id,curso.id from curso,grados where grados.id=curso.id_grado and curso.estado=0 and id_maestro=?";

		$params = array($this->maestro);

		return Database::getRows($sql, $params);

    } 
    public function getSeccion(){

		$sql = "SELECT alumnos.id as id,nombre,apellido from alumnos,curso,grados,secciones,evaluaciones WHERE curso.id_grado=grados.id and secciones.id_grado=grados.id and secciones.id_alumno=alumnos.id and evaluaciones.id=? and 
		evaluaciones.id_curso=curso.id and alumnos.estado=0 group by alumnos.id";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getNotasAlumnoDetalle(){

		$sql = "SELECT evaluaciones.id as id,evaluaciones.perfil as perfil,tipo_prueba.tipo as tipo,

		notas.nota as nota ,materia from alumnos, notas,evaluaciones,tipo_prueba,materias

		,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and 

		curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id 

		and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id and materias.id=curso.id_materia and 

		notas.id_alumno=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? and materia=? ";

		$params = array($this->id,$this->tipo,$this->mes,$this->materia);

		return Database::getRows($sql, $params);

	}

	public function getNotasAlumnoDetalle1(){

		$sql = "SELECT evaluaciones.id as id,evaluaciones.perfil as perfil,tipo_prueba.tipo as tipo,

		notas.nota as nota ,materia from alumnos, notas,evaluaciones,tipo_prueba,materias

		,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and 

		curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id 

		and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id and materias.id=curso.id_materia and 

		alumnos.carnet=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? and materia=? ";

		$params = array($this->id,$this->tipo,$this->mes,$this->materia);

		return Database::getRows($sql, $params);

	}

	public function getPromedio(){

		$sql = "SELECT round(AVG(notas.nota),2) as promedio  from alumnos, notas,evaluaciones,tipo_prueba,materias

		,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and 

		curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id 

		and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id and materias.id=curso.id_materia and 

		notas.id_alumno=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? and materia=? ";

		$params = array($this->id,$this->tipo,$this->mes,$this->materia);

		return Database::getRows($sql, $params);

	}

	public function getPromedio1(){

		$sql = "SELECT round(AVG(notas.nota),2) as promedio  from alumnos, notas,evaluaciones,tipo_prueba,materias

		,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and 

		curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id 

		and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id and materias.id=curso.id_materia and 

		alumnos.carnet=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? and materia=? ";

		$params = array($this->id,$this->tipo,$this->mes,$this->materia);

		return Database::getRows($sql, $params);

	}

	public function getNotasAlumno(){

		$sql = "SELECT materia from alumnos, notas,evaluaciones,tipo_prueba,materias,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id 

		and materias.id=curso.id_materia and notas.id_alumno=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? group by materia ";

		$params = array($this->id,$this->tipo,$this->mes);

		return Database::getRows($sql, $params);

	}

	public function getNotasEspecial(){

		$sql = "SELECT grados.id,grado from grados inner join curso on curso.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id INNER join notas on notas.id_evaluacion=evaluaciones.id where grados.estado=0 and curso.estado=0

		and evaluaciones.id_mes>? and evaluaciones.id_mes<?  group by grado";

		$params = array($this->tipo,$this->mes);

		return Database::getRows($sql, $params);

	}

	public function getNotasEspecial1(){

		$sql = "SELECT round(avg(nota),2) from grados inner join curso on curso.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id

		 INNER join notas on notas.id_evaluacion=evaluaciones.id where grados.estado=0 and curso.estado=0 

		 and evaluaciones.id_mes>? and evaluaciones.id_mes<? and grados.id=? group by grado

		";

		$params = array($this->tipo,$this->mes,$this->id);

		return Database::getRows($sql, $params);

	}

	public function getReprobados1(){

		$sql = "SELECT grados.id,grado from grados inner join curso on curso.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id inner join notas on notas.id_evaluacion=evaluaciones.id inner join secciones on secciones.id_grado=grados.id inner JOIN alumnos on alumnos.id=notas.id_alumno where curso.estado=0 and alumnos.estado=0 GROUP by grado";

		$params = array(null);

		return Database::getRows($sql, $params);

	} 

	public function getReprobados2(){

		$sql = "SELECT alumnos.nombre ,alumnos.apellido,grado,round(avg(nota),2) as promedio from grados inner join curso on curso.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id inner join notas on notas.id_evaluacion=evaluaciones.id inner join secciones on secciones.id_grado=grados.id inner JOIN alumnos on alumnos.id=notas.id_alumno where curso.estado=0 and evaluaciones.id_mes>? and alumnos.estado=0 and evaluaciones.id_mes<? 

		and grados.id=? and (select avg(nota) <6) GROUP by alumnos.id";

		 

		$params = array($this->tipo,$this->mes,$this->id);

		return Database::getRows($sql, $params);

	} 

	public function getNotasAlumno1(){

		$sql = "SELECT materia from alumnos, notas,evaluaciones,tipo_prueba,materias,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id 

		and materias.id=curso.id_materia and alumnos.carnet=? and evaluaciones.id_mes>? and evaluaciones.id_mes<? group by materia";

		$params = array($this->id,$this->tipo,$this->mes);

		return Database::getRows($sql, $params);

	}

    public function readPerfiles(){

		$sql = "SELECT  perfil,id_tipo,materias.materia as materia,grados.grado as grado,

        evaluaciones.id_curso as id1,maestros.id as id2 from 

        evaluaciones,tipo_prueba,curso,maestros,materias,grados where curso.id=evaluaciones.id_curso 

         and materias.id=curso.id_materia and grados.id=curso.id_grado and tipo_prueba.id=evaluaciones.id_tipo

         and maestros.id=curso.id_maestro and evaluaciones.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

            $this->perfil=$album['perfil'];

            $this->tipo=$album['id_tipo'];

			$this->grado = $album['grado']; 

            $this->materia=$album['materia']; 

            $this->curso=$album['id1'];

            $this->maestro=$album['id2'];

			return true; 

		}else{

			return null;

		}

    }

    public function updatePerfiles(){

		$sql = "UPDATE evaluaciones SET perfil=?,id_tipo=?,id_curso=?,id_mes=? WHERE id = ?";

		$params = array($this->perfil,$this->tipo,$this->curso,$this->mes, $this->id);

		return Database::executeRow($sql, $params);

		}

		public function updateNotas(){

			$sql = "UPDATE notas SET nota=?  WHERE id_alumno = ? and id_evaluacion=?";

			$params = array($this->materia,$this->id,$this->tipo);

			return Database::executeRow($sql, $params);

			}	

    public function createPerfiles(){

		$sql ="INSERT INTO evaluaciones(perfil,id_tipo,id_curso,id_mes) VALUES (?,?,?,?)";

		$params = array($this->perfil,$this->tipo,$this->curso,$this->mes);

		return Database::executeRow($sql, $params);

		}

		public function createNotas(){

			$sql ="INSERT INTO notas(nota,id_evaluacion,id_alumno) VALUES (?,?,?)";

			$params = array($this->materia,$this->tipo,$this->perfil);

			return Database::executeRow($sql, $params);

			}

    public function checkRepetido(){

		$sql = "SELECT id,id_mes,id_tipo,id_curso FROM evaluaciones WHERE id_mes= ? and id_tipo=? and id_curso=?";

		$params = array($this->mes,$this->tipo,$this->curso);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id']; 

			return true;

		}else{

			return false;

		}

	}

	public function readNotas(){

		$sql = "SELECT nota from notas where notas.id_alumno=? and notas.id_evaluacion=?";

		$params = array($this->id,$this->tipo);

		$album = Database::getRow($sql, $params);

		if($album){ 

            $this->materia=$album['nota'];  

			return true; 

		}else{

			return null;

		}

	}

	public function readPromedioFinal(){

		$sql = "SELECT round(AVG(notas.nota),2) as promedio from alumnos, notas,evaluaciones,tipo_prueba,materias ,curso,secciones,grados where alumnos.id=notas.id_alumno and alumnos.id=secciones.id_alumno and curso.id_grado=grados.id and secciones.id_grado=curso.id_grado and notas.id_evaluacion=evaluaciones.id and evaluaciones.id_curso=curso.id and evaluaciones.id_tipo=tipo_prueba.id and 

		materias.id=curso.id_materia and alumnos.carnet=? and evaluaciones.id_mes>? and evaluaciones.id_mes<?";

		$params = array($this->id,$this->tipo,$this->mes);

		$album = Database::getRow($sql, $params);

		if($album){ 

            $this->materia=$album['promedio'];  

			return true; 

		}else{

			return null;

		}

	}

	public function checkRepetido2(){

		$sql = "SELECT id,nota,id_evaluacion,id_alumno FROM notas WHERE id_evaluacion= ? and id_alumno=?  ";

		$params = array($this->tipo,$this->perfil );

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id']; 

			return true;

		}else{

			return false;

		}

	}

	public function checkCarnet(){

		$sql = "SELECT nombre,apellido,grado FROM alumnos inner join secciones on secciones.id_alumno=alumnos.id inner join grados

		on grados.id=secciones.id_grado and carnet= ? ";

		$params = array($this->perfil);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['nombre']; 

			$this->perfil=$data['apellido'];

			$this->tipo=$data['grado'];

			return true;

		}else{

			return false;

		}

	}

}

?>