<main>
    <!--Especificacion para el fondo-->
    <div class=" bg ">
        <div class="row ">
            <div class="col l3 col m2 col s12 ">  </div>
                <div class="col l6 col m8 col s12 ">
                <!--aca inicia el formulario-->
                <form class=" alto1 form-contenedor" method="post" autocomplete="off">
                    <div class="row">
                        <!--Titulo dentro del formulario-->
                        <h5 align=center class="col s12 ">Iniciar Sesión</h5>
                        <div class="input-field col s12 alto3">
                        <!--Logo o icono del input-->
                        <i class="material-icons prefix">account_circle</i>
                        <input onpaste="return false" id="icon_prefix" type="text" name="alias" class="validate" required>
                        <!--Label del usuario-->
                        <label for="icon_prefix" class="ajuste">Usuario</label>
                        </div>
                        <!--Input de la contraseña-->
                        <div class="input-field col s12">
                        <!--Icono del input-->
                        <i class="material-icons prefix">https</i>
                        <input onpaste="return false" id="icon_prefix" type="password" name="clave"class="validate" required>
                        <!--Label de contraseña-->
                        <label for="icon_prefix" class="ajuste">Contraseña</label>
                        </div>
                        <!--Seccion de boton inicio de sesion dentro del menu principal-->
                        <div class="col s8 col l8 col m8 offset-l4 offset-s3 offset-m4 alto3">
                        <button name="iniciar" type="submit"class="waves-effect waves-light teal darken-3 btn ">Iniciar Sesión</button>  
                        </div>  
                        <!--Secccion del menu principal-->
                        <div class="col s11 col m10 col l8 offset-m2 offset-s1 offset-l3 ">
                        <a href="../email/index.php" class = "waves-effect waves-light btn black alto3">Olvide usuario/contraseña</a>
                        </div> 
                    </div> 
                </form>
                <!--aca termina el formulario-->
                </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</main> 