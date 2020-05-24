<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Actualizar Ofertas</h1>
            </div>
            <div class="altura"></div><!--agregamos espacios-->
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off"> 
            <div class="input-field blanco col l6 ">
                    <i class="material-icons prefix">account_balance_wallet</i>
                    <input onpaste="return false" name="matricula" id="buscadorE" type="text" class="" value="<?php print($oferta->getMatricula())?>"required>
                    <label for="buscadorE" class="ajuste">Matrícula</label>
            </div>  
            <div class="input-field blanco col l6  ">
                    <i class="material-icons prefix">attach_money</i>
                    <input onpaste="return false" name="mensualidad" id="2" type="text" class="" value="<?php print($oferta->getMensualidad())?>" required>
                    <label for="2" class="ajuste">Mensualidad</label>
            </div> 
            <div class="input-field blanco col l6 alto4"> 
                <?php
                    Page::showSelect("Seleccione un Grado", "grados", $oferta->getGrado(), $oferta->getGrados1());
                 ?> 
            </div>  
            <div class="input-field blanco col l6 ">
                    <textarea id="textarea1" name="textarea1" class="materialize-textarea"><?php print($oferta->getDescripcion())?></textarea>
                <label for="textarea1" class="ajuste">Descripción</label>
            </div> 
                <div class="row">
                <div class="col l5 offset-l1"> 
                        <button type="submit" name="actualizar" title="Modificar"class="waves-effect green btn">Modificar Oferta</a>
                 </div>
                 <div class="col l4 offset-l1"> 
                       <a href="academico.php#taboferta"type="submit" name="cancelar" title="Cancelar"class="waves-effect red btn">Cancelar</a> 
                 </div>
                 </div> 
            </div>   
            </form>
        </div>
    </div>
</main>