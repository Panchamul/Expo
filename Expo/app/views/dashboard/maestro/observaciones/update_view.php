<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Modificar observación</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off"> 
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtObservacion" onkeypress="return soloLetras(event)"placeholder="Cuerpo" type="text" required value="<?php echo($observaciones->getObservacion())?>">
                    <label class="active ">Observacion</label>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Actualizar</button>
                        <?php print("<a href='observaciones.php?id=$_GET[idAlumno]'  class='waves-effect red btn'>Cancelar</a>");
                        ?>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>