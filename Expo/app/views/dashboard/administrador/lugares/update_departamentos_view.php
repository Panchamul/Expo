<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Actualizar departamentos</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtDepartamento" placeholder="Departamento" type="text" required value="<?php echo($departamentos->getDepartamento())?>">
                    <label class="active ">Departamento</label>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Actualizar</button>
                        <a href="menu.php#tabZona"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>