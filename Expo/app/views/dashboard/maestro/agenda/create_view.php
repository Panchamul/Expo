<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Agregar recordatorio</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtTitulo" placeholder="Titulo" type="text" required>
                    <label class="active ">Titulo</label>
                </div>
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtCuerpo" placeholder="Cuerpo" type="text" required>
                    <label class="active ">Cuerpo</label>
                </div>
                <div class="col l12 s12">
                    <p class="center">
                        <button type="submit" name="btnGuardar" class="waves-effect green btn">Agregar</button>
                        <?php print("
                        <a href='index_agenda.php?id=$_GET[id]' class='waves-effect red btn'>Cancelar</a>
                        ")?>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>