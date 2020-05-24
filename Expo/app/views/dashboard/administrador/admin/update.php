<main class="bg1"> 
<!--Formularios de datos-->

<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Modificar Administradores</h1>
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
            <input onpaste="return false" onkeypress="return soloLetras(event)" name="nombre" id="1" type="text" class="validate" value="<?php print($admin->getNombre()) ?>" required>
            <label for="1" class="ajuste">Nombre </label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)" name="apellido" id="2" type="text" class="validate" value="<?php print($admin->getApellido()) ?>" required>
            <label for="2" class="ajuste">Apellido </label> 
        </div>
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de dui-->
            <i class="material-icons prefix">chrome_reader_mode</i>
            <input onpaste="return false" name="dui" id="3" type="text" class="validate" value="<?php print($admin->getDui()) ?>" required>
            <label for="3" class="ajuste">Dui</label> 
        </div>
         <!--Input de field con color blanco-->
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de usuario-->
            <i class="material-icons prefix">account_circle</i>
            <input onpaste="return false" name="usuario" id="4" type="text" class="validate" value="<?php print($admin->getUsuario()) ?>" required>
            <label for="4" class="ajuste">Usuario</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de correo-->
            <i class="material-icons prefix">contact_mail</i>
            <input name="correo" id="7" type="text" class="validate" value="<?php print($admin->getCorreo()) ?>" required>
            <label for="7" class="ajuste">Correo electronico</label> 
        </div>
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">contact_phone</i>
            <input onpaste="return false" onkeypress="return solonumeros(event)"name="telefono" id="8" type="text" class="validate" value="<?php print($admin->getTelefono()) ?>" required>
            <label for="8" class="ajuste">Telefono</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">streetview</i>
            <input onpaste="return false" name="direccion" id="9" type="text" class="validate" value="<?php print($admin->getDireccion()) ?>" required>
            <label for="9" class="ajuste">Direccion</label> 
        </div> 
        <!--Combobox para seleccionar GENERO-->
        <?php 
        if($admin->getGenero()=="Femenino"){
            print('
            <div class="input-field blanco col s6 ">
        <h6>Selecciona un genero</h6>
        <select name="Genero" required>
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
        <select name="Genero" required>
        <option value="" disabled selected>Selecciona un genero</option>
        <option selected value="Masculino">Masculino</option>
        <option  value="Femenino">Femenino</option> 
        </select> 
        </div>
        ');
        }
        ?>
        
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">people</i>
            <input name="fecha" id="10" type="text" class="datepicker"  value="<?php print($admin->getFecha()) ?>" required>
            <label for="10" class="ajuste">Fecha de nacimiento</label> 
        </div> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">account_balance_wallet</i>
            <input onpaste="return false" name="NIT" id="11" type="text" class="validate" value="<?php print($admin->getNit()) ?>" required>
            <label for="11" class="ajuste">NIT</label> 
        </div>   
        <?php   
        foreach($data as $row){ 
         print("
        <div class='col s6'>
        <img id='imgSalida' class='responsive-img' width='250 px' height='250 px' src='../../../web/img/usuarios/$row[foto]' />
        </div>
        ");
        }
        ?> 
        <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">account_balance</i>
            <input onpaste="return false" name="escalafon" id="12" type="text" class="validate" value=""  >
            <label for="12" class="ajuste">Escalafon</label> 
        </div>   
        <div class="text-blanco blanco col s6">
            <?php
                    Page::showSelect("Tipo de usuarios", "tipo", $admin->getId_tipo(), $admin->getTipo());
            ?> 
            </div>
        <div class='file-field input-field blanco col s12 m6'>
            <div class='btn waves-effect blanco ' id="btn1">
                <span><i class='material-icons '>image</i></span>
                <input type='file' name='archivo' id='file-input' />
            </div>
            <div class='file-path-wrapper '>
                <input type='text' class='file-path validate blanco'  placeholder='Seleccione una imagen'/>
            </div>
        </div>   
        <div class="row"></div>
        <div class="row">
        <div class="col l6 alto3">
            <button class="waves-effect waves-light btn green" title="Actualizar"name="actualizar" type="submit">Actualizar</button>                
        </div>    
        <div class="col l6 alto3">
            <a href="../admin/admin_index.php" class="waves-effect waves-light btn red" title="volver" name="volver" >Regresar</a>                
        </div> 
        </div>
    </div>
    </div>
    </form> 
<!--Fin del formulario--> 
</main> 