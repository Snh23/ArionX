<div class="form-group">
    <label>Nombre</label>
    <input name="nombre" type="text" class="form-control" placeholder="ej.Macario" <?php $validador->mostrar_nom() ?>>
    <?php
    $validador->mostrar_err_nom(); //en caso de haber error, lo mostramos
    ?>
</div>
<div class="form-group">
    <label>Apellidos</label>
    <input name="apellidos" type="text" class="form-control" placeholder="ej.Paterno y Materno" <?php $validador->mostrar_ape() ?>>
    <?php
    $validador->mostrar_err_ape(); //en caso de haber error, lo mostramos
    ?>
</div>
<div class="form-group">
    <label>Usuario</label>
    <input name="usuario" type="text" class="form-control" placeholder="ej.Mac42" <?php $validador->mostrar_usu() ?>>
    <?php
    $validador->mostrar_err_usu(); //en caso de haber error, lo mostramos
    ?>
</div>
<div class="form-group">
    <label>Email</label>
    <input name="email" type="email" class="form-control" placeholder="ej.Cuenta@email.com" <?php $validador->mostrar_ema() ?>>
    <?php
    $validador->mostrar_err_ema(); //en caso de haber error, lo mostramos
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input name="clave1" type="password" class="form-control" placeholder="**********">
    <?php
    $validador->mostrar_err_cl1(); //en caso de haber error, lo mostramos
    ?>
</div>
<div class="form-group">
    <label>Repite tu contraseña</label>
    <input name="clave2" type="password" class="form-control" placeholder="**********">
    <?php
    $validador->mostrar_err_cl2(); //en caso de haber error, lo mostramos
    ?>
</div>
<br>
<div class="form-group text-center">
    <button name="limpiar" type="reset" class="btn btn-default btn-primary">Limpiar Datos</button>
    <button name="enviar" type="submit" class="btn btn-default btn-primary">Enviar Datos</button>
</div>