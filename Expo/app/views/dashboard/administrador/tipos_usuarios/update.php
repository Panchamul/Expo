<main class="hermoso">
<div class="container">

<div class="row">  

<div class="col s12">

        <h1 class="text-blanco" align=center >Modificar tipos de usuarios</h1>

</div> 

</div>

</div>

              <form class="ajuste" method='post' enctype='multipart/form-data'>
              <div class="container">
                <div class="row"><!--inputs-->  
                <div class="input-field blanco col s6">

<!--Input con de tipo text con placeholder de Nombre-->

<i class="material-icons prefix">account_box</i>

<input name="Nombre" id="1" type="text" class="validate" autocomplete=off   onkeypress="return soloLetras(event)" value='<?php print($tipo->getTipo()) ?>' required>

<label for="1" class="ajuste">Nombre del tipo de usuario</label> 
                    </div > 
                    </div>  
                    <div class="ajustar row"> 
                    <?php 
                        $arreglo[]=null;
                        $indice=null; 
                        $id=2;
                        foreach($data as $row){
                            print("<div class='col l4'>");
                            foreach($datar as $rows){
                                if($rows['permis'] == $row['id_permiso']){
                                    $indice = $rows['permis']; 
                                    print("   <p>

                                    <input type='checkbox' class='filled-in' name='p[]' id='$id' value='$row[id_permiso]' checked>
              
                                    <label class='text-blanco'for='$id'>$row[permiso]</label>
              
                                  </p>");
                                  $id++;
                                }
                            }
                            if($row['id_permiso'] != $indice){
                                print(" <p>

                                <input type='checkbox' class='filled-in' name='p[]' id='$id' value='$row[id_permiso]'>
          
                                <label class='text-blanco'for='$id'>$row[permiso]</label>
                                
                              </p>");
                              $id++;
                            }
                            print("</div>"); 
                        }
                         
                    ?>
                    </div> 
                    <div class="row">
                    <div class="col s7 alto3">

<button class="waves-effect waves-light btn green" name="Modificar" type="submit">Modificar tipo de usuario</button>                

</div> 

<div class="col s3 alto3">

<a href="../tipos_usuarios/indextipos.php"class="waves-effect waves-light btn red">Cancelar</a>                
</div>
</div>
                 </div> 
            </form>  
        </div>  
    </main>