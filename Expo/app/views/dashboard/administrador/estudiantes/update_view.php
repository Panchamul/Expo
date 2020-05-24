<main class="hermoso1">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Agregar alumno</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post"  enctype="multipart/form-data" autocomplete="off">
                <div class="col s12 m12 l6">
                    <img id="imgSalida" class="materialboxed imagenancho1"  src="../../../web/img/estudiantes/<?php echo($estudiantes->getFoto())?>">
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtNombre" placeholder="Nombre" type="text" required value ="<?php echo($estudiantes->getNombre())?>">
                    <label class="active ">Nombre</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtApellido" placeholder="Apellido" type="text" required value="<?php echo($estudiantes->getApellido())?>">
                    <label class="active ">Apellido</label>
                </div> 
                <div class="input-field blanco col l6 m12 s12"> 
                <input onpaste="return false" onkeypress="return soloFechas(event)" name="txtFechaN" id="10" type="text" class="datepicker" required value="<?php $estudiantes->getFecha()?>">
                <label for="10" class="ajuste">Fecha de nacimiento</label> 
                </div>
                <div class="input-field text-blanco col l6 m12 s12">
                    <?php
                        Page::showSelect("Municipio", "municipio", $estudiantes->getIdMunicipio(), $estudiantes->getMunicipios());
                    ?>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return solonumeros(event)"name="txtTelefono" placeholder="Telefono" type="text" required value="<?php echo($estudiantes->getTelefono())?>">
                    <label class="active ">Teléfono</label>
                </div>
               <div class='file-field input-field blanco col s12 m12 l6'>
                    <div class='btn waves-effect blanco ' id="btn1">
                        <span><i class='material-icons '>image</i></span>
                        <input type='file' name='txtArquivo' id='file-input' />
                    </div>
                    <div class='file-path-wrapper '>
                        <input type='text' class='file-path validate blanco'   placeholder='Seleccione una imagen'/>
                    </div>
                </div>   
                <div class="input-field text-blanco col l6 m12 s12">
                    <?php
                        Page::showSelect("Zona", "zona", $estudiantes->getIdZona(), $estudiantes->getZona());
                    ?>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtNie" placeholder="NIE del estudiante" type="text" required value="<?php echo($estudiantes->getNie())?>">
                    <label class="active ">NIE</label>
                </div>
                <div class="input-field text-blanco col l6 m12 s12">
                    <select name ="genero" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <label>Género</label>
                </div>
                <div class="input-field text-blanco col l6 m12 s12">
                    <?php
                        Page::showSelect("Estado familiar", "estadoF", $estudiantes->getIdEstadoF(), $estudiantes->getEstadoFamiliar());
                    ?>
                </div>
                <div class="input-field text-blanco col l6 m12 s12">
                    <?php
                        Page::showSelect("Religion", "religion", $estudiantes->getIdReligion(), $estudiantes->getReligion());
                    ?>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return solonumeros(event)"name="txtAnioI" placeholder="Año de ingreso" type="number" min="2000" max="2018" required value="<?php echo($estudiantes->getAnioIngreso())?>">
                    <label class="active ">Año ingreso</label>
                </div>
               <div class="input-field text-blanco col l6 m12 s12">
                    <select name ="repiteAnio" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    <label>Repite año</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtTarjeta" placeholder="Tarjeta de la vacuna" type="text" required value="<?php echo($estudiantes->getTarjetaVacunas())?>">
                    <label class="active ">Tarjeta de la vacuna</label>
                </div>
                <div class="input-field text-blanco col l6 m12 s12">
                    <?php
                        Page::showSelect("Discapacidad", "discapacidad", $estudiantes->getIdDiscapacidad(), $estudiantes->getDiscapacidades());
                    ?>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtPreescripcion" placeholder="Prescripciones medicas" type="text" required value="<?php echo($estudiantes->getDescripcion())?>">
                    <label class="active ">Prescripciones médicas</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtPartida" placeholder="Partida" type="text" required value="<?php echo($estudiantes->getPartida())?>">
                    <label class="active ">Partida</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtCertificado" placeholder="Certificado del año anterior" type="text" required value="<?php echo($estudiantes->getCertificado())?>">
                    <label class="active ">Certificado del año anterior</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return soloFechas(event)"name="fechaRegi" placeholder="Fecha de registro" type="text" required value="<?php echo($estudiantes->getFechaRegistro())?>">
                    <label class="active ">Fecha de registro</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtCorreo" placeholder="Correo" type="email" required value="<?php echo($estudiantes->getCorreo())?>">
                    <label class="active ">Correo</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" onkeypress="return solonumeros(event)"name="txtCarnet" placeholder="Carnet" type="text" required value="<?php echo($estudiantes->getCarnet())?>">
                    <label class="active ">Carnet</label>
                </div>
                <div class="input-field blanco col l6 m12 s12">
                    <!--Input con de tipo text con placeholder de Nombre-->
                    <input onpaste="return false" name="txtUsuario" placeholder="Usuario" type="text" required value="<?php echo($estudiantes->getUsuarios())?>">
                    <label class="active ">Usuario</label>
                </div>
                <div class="col s12 m12 l6 text-blanco">
                    <?php
                        Page::showSelect("Grado", "grado", $estudiantes->getIdGrado(), $estudiantes->getGrados());
                    ?>
                </div>
                <!--<div class="input-field col s12">
                    <?php
                    //Page::showSelect("Tipo de codigo", "tipo", $codigos->getCodigo(), $codigos->getTipoCodigos());
                    ?>
                </div>-->
                <div class="col l12 s12">
                    <p class="center">
                        <button type="submit" name="btnEditar" class="waves-effect green btn">Agregar</button>
                        <a href="index_estudiantes.php"  class="waves-effect red btn">Cancelar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>