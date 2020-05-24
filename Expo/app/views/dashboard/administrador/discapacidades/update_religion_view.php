<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Editar religión</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtReligion" placeholder="Nombre de la discapacidad" type="text" required value="<?php echo($religiones->getReligion())?>">
                    <label class="active ">Nombre de la religión</label>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Editar religión</button>
                        <a href="index1.php"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>