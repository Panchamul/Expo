<!--Inicializacion de encabezado--> 
<main class="hermoso"><!--Completo sirve para que el color llegue a todas partes--> 
    <!--Inicio de imagen-->
    <div class="row text-blanco"> 
            <!--Inicio de seccion de alturas--> 
                <div class="altura"></div> 
            <!--Fin de bloque en blanco por-->
            <h1 align=center>Editar Perfil</h1>  
            <div class="altura"></div> 
    </div>
    <!--Fin de seccion de imagen-->
    <div class="row">   
    <form method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="container">
    <!--Fila de input-->
    <div class="row">
        <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)"name="nombre" id="1" type="text" class="validate" value="<?php print($perfil->getNombre()) ?>" required>
            <label for="1" class="ajuste">Nombre del alumno</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)" name="apellido" id="2" type="text" class="validate" value="<?php print($perfil->getApellido()) ?>" required>
            <label for="2" class="ajuste">Apellido del alumno</label> 
        </div> 
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de usuario-->
            <i class="material-icons prefix">account_circle</i>
            <input name="usuario" id="4" type="text" class="validate" value="<?php print($perfil->getUsuario()) ?>" required>
            <label for="4" class="ajuste">Usuario</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de correo-->
            <i class="material-icons prefix">contact_mail</i>
            <input name="correo" id="7" type="text" class="validate" value="<?php print($perfil->getCorreo()) ?>" required>
            <label for="7" class="ajuste">Correo electronico</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">contact_phone</i>
            <input onpaste="return false" onkeypress="return solonumeros(event)" name="telefono" id="8" type="text" class="validate" value="<?php print($perfil->getTelefono()) ?>" required>
            <label for="8" class="ajuste">Telefono</label> 
        </div>  
        <!--Combobox para seleccionar GENERO-->
            <?php 
        if($perfil->getGenero()=="Femenino"){
            print('
            <div class="input-field blanco col s6 ">
        <h6>Selecciona un genero</h6>
        <select name="generos" required>
        <option value="" disabled selected>Selecciona un genero</option>
        <option value="Masculino">Masculino</option>
        <option selected value="Femenino">Femenino</option> 
        </select> 
        </div>
        ');
        }
        else{
            print('
            <div class="input-field blanco col s6 ">
        <h6>Selecciona un genero</h6>
        <select name="generos" required>
        <option value="" disabled selected>Selecciona un genero</option>
        <option selected value="Masculino">Masculino</option>
        <option  value="Femenino">Femenino</option> 
        </select> 
        </div>
        ');
        }
        ?>
        <?php    
        foreach($data as $row){ 
         print("
        <div class='col s6'>
        <img id='imgSalida' class='responsive-img' width='250 px' height='250 px' src='../../web/img/estudiantes/$row[foto]' />
        </div>
        ");
        }
        ?>  
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">people</i>
            <input onpaste="return false" onkeypress="return soloFechas(event)" name="fecha" id="10" type="text" class="datepicker"  value="<?php print($perfil->getFecha()) ?>" required>
            <label for="10" class="ajuste">Fecha de nacimiento</label> 
        </div>  
        <div class='file-field input-field blanco col s12 m6'>
            <div class='btn waves-effect blanco ' id="btn1">
                <span><i class='material-icons '>image</i></span>
                <input type='file' name='archivo' id='file-input'/>
            </div>
            <div class='file-path-wrapper '>
                <input type='text' class='file-path validate blanco'  placeholder='Seleccione una imagen'/>
            </div>
        </div>   
        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="actualizar" type="submit">Actualizar Perfil</button>                
        </div> 
        <div class="col s3 alto3">
            <a href="menu_principal.php"class="waves-effect waves-light btn red">Cancelar</a>                
        </div>
        </div>
    </div>
    </div>
    </form>  
    </div>
</main> 