<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Actualizar código</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtCodigo" placeholder="Nombre del codigo" type="text" required value="<?php echo($codigos->getCodigo())?>">
                    <label class="active ">Nombre del código</label>
                </div>
                <div class="input-field col s12">
                    <?php
                    Page::showSelect("Tipo de codigo", "tipo", $codigos->getCodigo(), $codigos->getTipoCodigos());
                    ?>
                </div>
                <div class="col l12 s12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Agregar</button>
                        <a href="index_codigos.php"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>