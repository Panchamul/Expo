<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Agregar recordatorio</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post">
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input name="txtTitulo" placeholder="Titulo" type="text" required>
                    <label class="active ">Titulo</label>
                </div>
                <div class="input-field blanco col l12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input name="txtCuerpo" placeholder="Cuerpo" type="text" required>
                    <label class="active ">Cuerpo</label>
                </div>
                <div class="col l12 s12">
                    <p class="center">
                        <button type="submit" name="btnGuardar" class="waves-effect green btn">Agregar</button>
                        <a href="index_agenda.php"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>