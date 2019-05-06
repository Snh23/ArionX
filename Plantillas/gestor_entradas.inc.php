<div class="row parte_gestor_entradas">
    <div class="col-md-12 text-center">
        <h2>Gestionar Entradas</h2>
        <br>
        <a href=<?PHP echo RUTA_ENTRADA_NVA ?> class="btn btn-lg btn-primary" role="button" id="boton_entrada_nva">+ Entrada</a>
        <br>
    </div>
</div>
<div class="row parte_gestor_entradas">
    <div class="col-md-12">
        <?php
        if (count($array_entradas) > 0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>T&iacutetulo</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($array_entradas); $i++) {
                        $entrada_actual = $array_entradas[$i][0];
                        $comentarios_entrada_actual = $array_entradas[$i][1];
                        ?>
                        <tr>
                            <td><?php echo $entrada_actual -> get_fecha(); ?></td>
                            <td><?php echo $entrada_actual -> get_titulo(); ?></td>
                            <td><?php echo $entrada_actual -> are_activa(); ?></td>
                            <td><?php echo $comentarios_entrada_actual; ?></td>
                            <td>
                                <button type="button" class="btn btn-default btn-xs">Editar</button>
                                <button type="button" class="btn btn-default btn-xs">Borrar</button>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        <?php
    } else {
        ?>
            <h3 class="text-center">Todavia no has escrito ninguna entrada</h3>
            <br>
            <br>
        <?php
    }
    ?>
    </div>
</div>