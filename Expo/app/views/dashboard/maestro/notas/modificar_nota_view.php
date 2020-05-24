<main class="bg1"> 
<!--Formularios de datos--> 
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Modificar Calificaciones</h1>
        </div>
    </div>
</div>   
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="container">
    <!--Fila de input-->
    <div class="row"> 
    <script type="text/javascript">
    
    function filterFloat(evt,input){
      // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
      var key = window.Event ? evt.which : evt.keyCode;    
      var chark = String.fromCharCode(key);
      var tempValue = input.value+chark;
      if(key >= 48 && key <= 57){
          if(filter(tempValue)=== false){
              return false;
          }else{       
              return true;
          }
      }else{
            if(key == 8 || key == 13 || key == 0) {     
                return true;              
            }else if(key == 46){
                  if(filter(tempValue)=== false){
                      return false;
                  }else{       
                      return true;
                  }
            }else{
                return false;
            }
      }
  }
  function filter(__val__){
      var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
      if(preg.test(__val__) === true){
          return true;
      }else{
         return false;
      }
      
  }
    </script>
    <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">assignment</i>
            <input onpaste="return false" onkeypress="return filterFloat(event,this)" name="nombre" id="1" type="text" class="validate" value="<?php print($perfiles->getMateria()) ?>" required>
            <label for="1" class="ajuste">Calificacion</label> 
        </div> 
        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="actualizar" type="submit">Modificar Calificacion</button>                
        </div> 
        <div class="col s3 alto3">
        <?php 
        
        print(" 
        <a href='seccion.php?id=$_SESSION[devol]'class='waves-effect waves-light btn red'>Cancelar</a>
        ");
        ?>                 
        </div>
        </div>
    </div>
    </div>
    </form> 
<!--Fin del formulario--> 
</main> 