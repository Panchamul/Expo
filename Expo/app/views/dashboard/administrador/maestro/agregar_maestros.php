 <main class="bg1"> 
<!--Formularios de datos-->

<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Agregar maestros</h1>
        </div>
    </div>
</div>   
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="container">
    <!--Fila de input-->
    <div class="row">
        <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)" name="nombre" id="1" type="text" class="validate" value="<?php print($maestro->getNombre()) ?>" required>
            <label for="1" class="ajuste">Nombre del maestro</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)" name="apellido" id="2" type="text" class="validate" value="<?php print($maestro->getApellido()) ?>" required>
            <label for="2" class="ajuste">Apellido del maestro</label> 
        </div>
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de dui-->
            <i class="material-icons prefix">chrome_reader_mode</i>
            <input onpaste="return false" name="dui" id="3" type="text" class="validate" value="<?php print($maestro->getDui()) ?>" required>
            <label for="3" class="ajuste">Dui</label> 
        </div>
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de usuario-->
            <i class="material-icons prefix">account_circle</i>
            <input onpaste="return false" name="usuario" id="4" type="text" class="validate" value="<?php print($maestro->getUsuario()) ?>" required>
            <label for="4" class="ajuste">Usuario</label> 
        </div>
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de contraseña-->
            <i class="material-icons prefix">https</i>
            <input onpaste="return false" name="contrasenia" id="5" type="password" class="validate" value="<?php print($maestro->getContrasenia()) ?>" required>
            <label for="5" class="ajuste">Contraseña</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de repetir contraseña-->
            <i class="material-icons prefix">https</i>
            <input onpaste="return false" name="contrasenia1" id="6" type="password" class="validate"class="validate" value="<?php print($maestro->getContrasenia()) ?>" required>
            <label for="6" class="ajuste">Repite tu Contraseña</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de correo-->
            <i class="material-icons prefix">contact_mail</i>
            <input onpaste="return false" name="correo" id="7" type="text" class="validate" value="<?php print($maestro->getCorreo()) ?>" required>
            <label for="7" class="ajuste">Correo electronico</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">contact_phone</i>
            <input onpaste="return false" onkeypress="return solonumeros(event)" name="telefono" id="8" type="text" class="validate" value="<?php print($maestro->getTelefono()) ?>" required>
            <label for="8" class="ajuste">Telefono</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">streetview</i>
            <input onpaste="return false" name="direccion" id="9" type="text" class="validate" value="<?php print($maestro->getDireccion()) ?>" required>
            <label for="9" class="ajuste">Direccion</label> 
        </div> 
        <!--Combobox para seleccionar GENERO-->
        <div class="input-field blanco col s6 ">
        <h6>Selecciona un genero</h6>
        <select name="generos" required>
        <option value="" disabled selected>Selecciona un genero</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option> 
        </select> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">people</i>
            <input onpaste="return false" onkeypress="return soloFechas(event)"name="fecha" id="10" type="text" class="datepicker"  value="<?php print($maestro->getFecha()) ?>" required>
            <label for="10" class="ajuste">Fecha de nacimiento</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">account_balance_wallet</i>
            <input onpaste="return false" name="NIT" id="11" type="text" class="validate" value="<?php print($maestro->getNit()) ?>" required>
            <label for="11" class="ajuste">NIT</label> 
        </div>   
        <div class="col s6">
        <img id="imgSalida" class="responsive-img" width="250 px" height="250 px" src="../../../web/img/generales/perfil.jpg" />
        </div>  
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">account_balance</i>
            <input onpaste="return false" name="escalafon" id="12" type="text" class="validate" value="<?php print($maestro->getEscalafon()) ?>"  >
            <label for="12" class="ajuste">Escalafon</label> 
        </div>  
        <div class='file-field input-field blanco col s12 m6'>
            <div class='btn waves-effect blanco ' id="btn1">
                <span><i class='material-icons '>image</i></span>
                <input type='file' name='archivo1' id='file-input' required/>
            </div>
            <div class='file-path-wrapper '>
                <input type='text' class='file-path validate blanco'  placeholder='Seleccione una imagen'/>
            </div>
        </div>   
        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="agregar" type="submit">Agregar maestro</button>                
        </div> 
        <div class="col s3 alto3">
            <a href="../admin/menu_admin.php"class="waves-effect waves-light btn red">Cancelar</a>                
        </div>
        </div>
    </div>
    </div>
    </form> 
<!--Fin del formulario--> 
</main> 