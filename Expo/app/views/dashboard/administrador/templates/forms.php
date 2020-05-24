<?php 
    class Forms{
        public static function create($titulo, $input, $placeholder, $label, $direccion, $boton){
            print('<main class="hermoso">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="text-blanco center">'.$titulo.'</h1>
                                </div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <form method="post" autocomplete="off">
                                    <div class="input-field blanco col l12">
                                        <!--Input con de tipo text con placeholder de Nombre-->
                                        <input name="'.$input.'" placeholder="'.$placeholder.'" type="text" required>
                                        <label class="active ">'.$label.'</label>
                                    </div>
                                    <div class="col l12">
                                        <p class="center">
                                            <button type="submit" name="'.$boton.'" class="waves-effect green btn">Agregar</button>
                                            <a href="'.$direccion.'"  class="waves-effect red btn">Cancelar</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>');
        }


        public static function create2($titulo, $input, $placeholder, 
                                        $label, $direccion, $boton, $tipo, $input2
                                        , $placeholder2, $label2, $tipo2){
            print('<main class="hermoso">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="text-blanco center">'.$titulo.'</h1>
                                </div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <form method="post" autocomplete="off">
                                    <div class="input-field blanco col l12">
                                        <!--Input con de tipo text con placeholder de Nombre-->
                                        <input name="'.$input.'" placeholder="'.$placeholder.'" type="'.$tipo.'" required>
                                        <label class="active ">'.$label.'</label>
                                    </div>
                                    <div class="input-field blanco col l12">
                                        <!--Input con de tipo text con placeholder de Nombre-->
                                        <input name="'.$input2.'" placeholder="'.$placeholder2.'" type="'.$tipo2.'" required>
                                        <label class="active ">'.$label2.'</label>
                                    </div>
                                    <div class="col l12">
                                        <p class="center">
                                            <button type="submit" name="'.$boton.'" class="waves-effect green btn">Agregar</button>
                                            <a href="'.$direccion.'"  class="waves-effect red btn">Cancelar</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>');
        }
        public static function delete4($titulo, $informacion){
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
                                        <a href="index_codigos.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
        
    public static function delete1($titulo, $informacion){
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
                                        <a href="menu.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
        
        
        
        
        public static function deletebueno($titulo, $informacion,$direccion_no){
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
                                        <a href="'.$direccion_no.'" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
         public static function delete2($titulo, $informacion){
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
                                        <a href="index1.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
            public static function delete0($titulo, $informacion){
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
                                        <a href="index_estudiantes.php" class="waves-effect red btn">No</a>
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
                                        <a href="index.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }
           public static function update1($titulo, $txt, $placeholder, $txtValue, $label, $btn,$titulo1, $txt1, $placeholder1, $txtValue1, $label1){
            print('<main class="hermoso">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <h1 class="text-blanco center">'.$titulo.'</h1>
                            </div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <form method="post" autocomplete="off">
                                <div class="input-field blanco col l12">
                                    <!--Input con de tipo text con placeholder de Nombre-->
                                    <input name="'.$txt.'" placeholder="'.$placeholder.'" type="text" required value="'.$txtValue.'">
                                    <label class="active ">'.$label.'</label>
                                </div>
                                <div class="input-field blanco col l12">
                                    <!--Input con de tipo text con placeholder de Nombre-->
                                    <input name="'.$txt1.'" placeholder="'.$placeholder1.'" type="text" required value="'.$txtValue1.'">
                                    <label class="active ">'.$label1.'</label>
                                </div>
                                <div class="col l12">
                                    <p class="center">
                                        <button type="submit" name="'.$btn.'" class="waves-effect green btn">Actualizar</button>
                                        <a href="index1.php"  class="waves-effect red btn">Cancelar</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }

        public static function update($titulo, $txt, $placeholder, $txtValue, $label, $btn){
            print('<main class="hermoso">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <h1 class="text-blanco center">'.$titulo.'</h1>
                            </div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <div class="altura"></div>
                            <form method="post" autocomplete="off">
                                <div class="input-field blanco col l12">
                                    <!--Input con de tipo text con placeholder de Nombre-->
                                    <input name="'.$txt.'" placeholder="'.$placeholder.'" type="text" required value="'.$txtValue.'">
                                    <label class="active ">'.$label.'</label>
                                </div>
                                <div class="col l12">
                                    <p class="center">
                                        <button type="submit" name="'.$btn.'" class="waves-effect green btn">Actualizar</button>
                                        <a href="index.php"  class="waves-effect red btn">Cancelar</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>');
        }


        public static function update2($titulo, $txt, $placeholder, $txtValue, $label, $btn, $tipo
                                       , $txt2, $placeholder2, $txtValue2, $label2, $tipo2){
                print('<main class="hermoso">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="text-blanco center">'.$titulo.'</h1>
                                </div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <div class="altura"></div>
                                <form method="post" autocomplete="off">
                                    <div class="input-field blanco col l12">
                                        <!--Input con de tipo text con placeholder de Nombre-->
                                        <input name="'.$txt.'" placeholder="'.$placeholder.'" type="'.$tipo.'" required value="'.$txtValue.'">
                                        <label class="active ">'.$label.'</label>
                                    </div>
                                    <div class="input-field blanco col l12">
                                        <!--Input con de tipo text con placeholder de Nombre-->
                                        <input name="'.$txt2.'" placeholder="'.$placeholder2.'" type="'.$tipo2.'" required value="'.$txtValue2.'">
                                        <label class="active ">'.$label2.'</label>
                                    </div>
                                    <div class="col l12">
                                        <p class="center">
                                            <button type="submit" name="'.$btn.'" class="waves-effect green btn">Actualizar</button>
                                            <a href="index.php"  class="waves-effect red btn">Cancelar</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>');
            
        }

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

        public static function habilitar($arreglo, $data){
            print('
            <main class="hermoso">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="center text-blanco">Religiones dadas de baja</h1>
                        </div>
                        <div class="col l12 col s12 col m6">
                            <table class=" text-blanco">
                                <thead>
                                <tr>            
            ');
            /*======================================================
            INICIO DE LA SECCION QUE INGRESA CUENTAS COLUMNAS TENDRA
            ========================================================*/
                            for($i=0;i<count($arreglo);$i++){
                                print('<th>'.$arreglo[$i].'</th>');
                            }
            /*======================================================
            FIN DE LA SECCION QUE INGRESA CUENTAS COLUMNAS TENDRA
            ========================================================*/ 
            print('
                                </tr>
                                </thead> 
                                <tbody>
            ');             
            /*=========================================================
            INICIO DE LA SECCION DE RECOLECCION
            ===========================================================*/  
                            foreach($data as $row){
                                    print('
                                    <tr>
                                    ');
                                    for($h=0;$h<count($arreglo);$h++){
                                        print('<td>'.$row[$arreglo[$h]].'</td>');
                                    }
                                    print('
                                        <td><a href="habilitacion_religion.php?id='.$row['id'].'" class="waves-effect waves-light green btn"><i class="material-icons">check</i></a></td>
                                    </tr>
                                    ');
                                }
            ptint('
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </main>
            ');
        }

    }
?>



                         
                    
                    <?php
                        
                    ?> 
                    