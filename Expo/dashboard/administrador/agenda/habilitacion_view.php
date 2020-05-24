<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Habilitar recordatosio</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post">
                <div class="col l12">
                    <h3 class="center text-blanco">Enserio deceas habilitar el recordatorio</h3>
                    <h3 class="center text-blanco">"<?php echo($agendas->getTitulo())?>"</h3>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnHabilitar" class="waves-effect green btn">Si</button>
                        <a href="index_agenda.php" class="waves-effect red btn">No</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>