<?php

class Cursos extends Validator{

	//Declaracion de las variables a utilizar

	private $id= null;

	private $grado=null; 

    private $estado=null;

    private $materia=null;

	private $maestro=null;

	private $valor1=null;

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

	public function setValor($value){ 

		$this->valor1 = $value;

		return true;  

}

//Funcion para recolectar el id

public function getValor(){

	return $this->valor1;

}

    public function setEstado($value){ 

			$this->estado = $value;

			return true;  

    }

    //Funcion para recolectar el id

	public function getEstado(){

		return $this->estado;

	}

	//Elementos  para ingresar el nombre de la materia

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

	public function setMateria($value){

		if($this->validateAlphanumeric($value,1,50)){

			$this->materia= $value;

			return true;

		}else{

			return false;

		}

	}

	//Funcion para recolectar el nombre de la materia

	public function getMateria(){

		return $this->materia;

    }  

    public function getCursos1(){

		$sql = "SELECT curso.id as id,grado,materia FROM grados,curso,maestros,materias where maestros.estado=0 and 

        grados.estado=0 and curso.estado=0 and materias.estado=0 and maestros.id=curso.id_maestro

        and materias.id=curso.id_materia and grados.id=curso.id_grado and maestros.id=? group by curso.id";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getCursosR(){

		$sql = "SELECT materia, nombre,apellido from materias inner join curso on curso.id_materia=materias.id inner join maestros

		on maestros.id=curso.id_maestro where curso.id_grado=? and curso.estado=0";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	

	public function getCursos2(){

		$sql = "SELECT curso.id as id,grado,materia FROM grados,curso,maestros,materias where maestros.estado=0 and 

        grados.estado=0 and curso.estado=1 and materias.estado=0 and maestros.id=curso.id_maestro

        and materias.id=curso.id_materia and grados.id=curso.id_grado and maestros.id=? group by curso.id";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function createCursos(){

		$sql ="INSERT INTO curso(id_grado,id_materia,estado,id_maestro) VALUES (?,?,?,?)";

		$params = array($this->grado,$this->materia,$this->estado,$this->maestro);

		return Database::executeRow($sql, $params);

	}

	public function getGrados(){

		$sql = "SELECT id,grado from grados  where  grados.estado=0";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getGradosR(){

		$sql = "SELECT materias.id as id ,materia from materias inner join curso on curso.id_materia=materias.id inner join grados on grados.id=curso.id_grado inner join secciones on secciones.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id 

		inner join notas on notas.id_evaluacion=evaluaciones.id where materias.estado=0 group by materia";

		$params = array(null);

		return Database::getRows($sql, $params);

	}

	public function getGradosR2(){

		$sql = "select round(avg(nota),2) from materias inner join curso on curso.id_materia=materias.id inner join grados on grados.id=curso.id_grado inner join secciones on secciones.id_grado=grados.id inner join evaluaciones on evaluaciones.id_curso=curso.id inner join notas on notas.id_evaluacion=evaluaciones.id where materias.estado=0 and materias.id=?";

		$params = array($this->id);

		return Database::getRows($sql, $params);

	}

	public function getMaterias(){

		$sql = "SELECT id,materia from materias where not EXISTS(select materias.id from curso,grados,maestros 

		where materias.id=curso.id_materia and materias.estado=0 

		and curso.id_grado=grados.id and grado=? and maestros.id=curso.id_maestro and maestros.estado=0 and curso.estado=0 )"; 

		$params = array( $this->grado);

		return Database::getRows($sql, $params);

	}

	public function getMaterias1(){

		$sql = "SELECT id,materia from materias where  materias.estado=0 "; 

		$params = array( null);

		return Database::getRows($sql, $params);

	}

	public function getCursos3(){

		$sql = "SELECT grados.id as id,grado from grados inner join curso on curso.id_grado=grados.id inner join maestros on maestros.id=curso.id_maestro inner join materias

		on materias.id=curso.id_materia and curso.estado=0 group by grados.id"; 

		$params = array( null);

		return Database::getRows($sql, $params);

	}

	

	public function readCursos(){

		$sql = "SELECT grados.id as grado,materias.id as materia FROM grados,curso,maestros,materias where maestros.estado=0 and grados.estado=0 and curso.estado=0 and materias.estado=0 

		and maestros.id=curso.id_maestro and materias.id=curso.id_materia and grados.id=curso.id_grado and curso.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->grado = $album['grado']; 

			$this->materia=$album['materia']; 

			return true; 

		}else{

			return null;

		}

	}

	public function readCursos1(){

		$sql = "SELECT grados.id as id, materias.id as id1,grado,materia FROM grados,curso,maestros,materias where maestros.estado=0 and grados.estado=0 and curso.estado=1 and materias.estado=0 

		and maestros.id=curso.id_maestro and materias.id=curso.id_materia and grados.id=curso.id_grado and curso.id=?";

		$params = array($this->id);

		$album = Database::getRow($sql, $params);

		if($album){

			$this->grado = $album['grado']; 

			$this->materia=$album['materia'];  

			$this->valor1=$album['id'];

			$this->maestro=$album['id1'];

			return true; 

		}else{

			return null;

		}

	}

	public function readGrados2(){

		$sql = "SELECT grado from grados where id=?";

		$params = array($this->id);

		$codigos = Database::getRow($sql, $params);

		if($codigos){

			$this->grado= $codigos['grado']; 

			return true;

		}else{

			return null;

		}

	} 

	public function habilitarCursos(){

		$sql = "UPDATE curso SET estado=? WHERE id = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	}

	public function updateCursos(){

		$sql = "UPDATE curso SET id_grado=?,id_materia=? WHERE id = ?";

		$params = array($this->grado, $this->materia,$this->id);

		return Database::executeRow($sql, $params);

	}

	public function checkRepetido(){

		$sql = "SELECT id,id_materia,id_grado FROM curso WHERE id_grado= ? and id_materia=? and curso.estado=0";

		$params = array($this->grado,$this->materia);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id']; 

			return true;

		}else{

			return false;

		}

	}

	public function checkRepetido2(){

		$sql = "SELECT curso.id,id_materia,id_grado FROM curso WHERE id_grado= ? and id_materia=? and curso.estado=0";

		$params = array($this->valor1,$this->maestro);

		$data = Database::getRow($sql, $params);

		if($data){

			$this->id = $data['id']; 

			return true;

		}else{

			return false;

		}

	}

	public function deleteCursos(){

		$sql = "UPDATE curso SET estado=? WHERE id  = ?";

		$params = array($this->estado, $this->id);

		return Database::executeRow($sql, $params);

	}

}

?>