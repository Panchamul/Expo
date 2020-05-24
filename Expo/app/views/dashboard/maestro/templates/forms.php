<?php 
    class Forms{ 
          public static function habilitacion($titulo, $elemento, $btnName, $direccion){
            print('
                <main class="hermoso">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <h1 class="text-blanco center">'.$titulo.'</h1>
                            </div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <form method="post" autocomplete="off">
                                <div class="col l12">
                                    <h3 class="center text-blanco">Enserio deseas habilitar</h3>
                                    <h3 class="center text-blanco">"'.$elemento.'"</h3>
                                </div>
                                <div class="col l12">
                                    <p class="center">
                                        <button type="submit" name="'.$btnName.'" class="waves-effect green btn">Si</button>
                                        <a href="'.$direccion.'" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }

        public static function delete($titulo, $informacion){ 
            print('<main class="hermoso">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <h1 class="text-blanco center">'.$titulo.'</h1>
                            </div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <form method="post" autocomplete="off">
                                <div class="col l12">
                                    <h3 class="center text-blanco">Enserio deseas eliminar </h3>
                                    <h3 class="center text-blanco">"'.$informacion.'"</h3>
                                </div>
                                <div class="col l12">
                                    <p class="center">
                                        <button type="submit" name="btnEliminar" class="waves-effect green btn">Si</button>
                                        <a href="index_observaciones.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
    }

          
?> 