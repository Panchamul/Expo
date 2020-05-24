<main class="hermoso">
<div class="row text-blanco"> 
            <!--Inicio de seccion de alturas--> 
                <div class="altura"></div> 
            <!--Fin de bloque en blanco por-->
            <h1 align=center>Cambiar Contraseña</h1>  
            <div class="altura"></div> 
    </div>    
    <form method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="container">
    <!--Fila de input-->
    <div class="row">
        <!--Input de field con color blanco-->
        <div class="input-field blanco col s12 m6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">security</i>
            <input name="contrasenia1" id="1" type="password" class="validate"   required>
            <label for="1" class="ajuste">Ingresa tu contraseña actual</label> 
        </div>
        <div class="input-field blanco col s12 m6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">security</i>
            <input name="contrasenia2" id="2" type="password" class="validate"  required>
            <label for="2" class="ajuste">Ingresa tu contraseña actual nuevamente</label> 
        </div> 
         <!--Input de field con color blanco-->
        <div class="input-field blanco col m6 s12">
            <!--Input con de tipo text con placeholder de usuario-->
            <i class="material-icons prefix">security</i>
            <input name="contrasenia3" id="4" type="password" class="validate"  required>
            <label for="4" class="ajuste">Ingresa tu contraseña nueva</label> 
        </div>    
        <div class="input-field blanco col s12 m6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">security</i>
            <input name="contrasenia4" id="10" type="password" class="validate"  required>
            <label for="10" class="ajuste">Ingresa tu contraseña nueva otra vez</label> 
        </div>   
        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="cambiar" type="submit">Cambiar contraseña</button>                
        </div> 
        <div class="col s3 alto3">
            <a href="../account/login.php"class="waves-effect waves-light btn red">Cancelar</a>                
        </div>
        </div>
    </div> 
    </form>  
</main>