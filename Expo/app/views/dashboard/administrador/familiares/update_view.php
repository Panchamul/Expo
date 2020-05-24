<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Agregar familiar</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtNombre" placeholder="Nombre" type="text" required value="<?php echo($familiares->getNombre())?>">
                    <label class="active ">Nombre</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtApellido" placeholder="Apellido" type="text" required value="<?php echo($familiares->getApellido())?>">
                    <label class="active ">Apellido</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloFechas(event)"name="txtFecha" placeholder="Fecha de nacimiento" type="date" required value="<?php echo($familiares->getFecha())?>">
                    <label class="active ">Fecha de nacimiento</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtOcupacion" placeholder="Ocupación" type="text" required value="<?php echo($familiares->getOcupacion())?>">
                    <label class="active ">Ocupación</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtNombreTrabajo" placeholder="Nombre del trabajo" type="text" required value="<?php echo($familiares->getTrabajo())?>">
                    <label class="active ">Nombre del trabajo</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtDireccionTrabajo" placeholder="Direcion del trabajo" type="text" required value="<?php echo($familiares->getDireccionTrabajo())?>">
                    <label class="active ">Dirección del trabajo</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return solonumeros(event)"name="txtTelefonoTrabajo" placeholder="telefono del trabajo" type="text" required value="<?php echo($familiares->getTelefonoTrabajo())?>">
                    <label class="active ">Teléfono del trabajo</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return solonumeros(event)"name="txtTelefono" placeholder="Teléfono" type="text" required value="<?php echo($familiares->getTelefono())?>">
                    <label class="active ">Teléfono</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtNivel" placeholder="Nivel de estudio" type="text" required value="<?php echo($familiares->getNivelEstudio())?>">
                    <label class="active ">Nivel de estudio</label>
                </div>
                <div class="input-field blanco col l6">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtDui" placeholder="DUI" type="text" required value="<?php echo($familiares->getDui())?>">
                    <label class="active ">DUI</label>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnModificar" class="waves-effect green btn">Modificar</button>
                        <a href="index_familiares.php"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>