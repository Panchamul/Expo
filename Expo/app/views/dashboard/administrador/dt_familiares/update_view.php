<main class="hermoso">
    <div class="container">
        <form action="" method="post" autocomplete="off">
            <div class="row">
                <div class="col s12">
                    <h1 class="center text-blanco">
                        Detalle de familiares
                    </h1>
                    <h3 class="text-blanco center">
                        <p>Nombre : <?php echo($familiares->getNombre())?></p>
                        <p>Apellido : <?php echo($familiares->getApellido())?></p>
                    </h3>
                </div>
                <div class="col s6 blanco">
                    <?php
                    Page::showSelect("Tipo de familiar", "tipo", $tipo->getTipo(), $tipo->getTipoFamiliarCombobox());
                    ?>
                </div>
                <div class="col s6">
                    <label>Encargado</label>
                    <select class='form-control' name='encargado' required >
                        <option value='' disabled selected>Seleccione una opción</option>
                        <option value='NO' selected>No es un encargado</option>
                        <option value='SI' selected>Si es encargado</option>
                    </select>
                </div>
                <div class="col s12 m12 l12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Modificar</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</main>