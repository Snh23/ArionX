<?php
include_once 'app/repentrada.inc.php';
include_once 'app/entrada.inc.php';

class EscritorEntradas
{
    public static function escribir_entradas()
    {
        $entradas = RepositorioEntrada::obtener_entradas_fechasc(Conexion::obtener_con());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribir_entrada($entrada);
            }
        }
    }

    public static function escribir_entrada($entrada)
    {
        if (!isset($entrada)) {
            return;
        }
        ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    echo $entrada->get_titulo();
                    ?>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <?php
                            echo $entrada->get_fecha();
                            ?>
                        </strong>
                    </p>
                    <div class="hyphenation text-justify">
                        <?php
                        echo nl2br(self::resumir_texto($entrada->get_texto()));
                        ?>
                    </div>
                    <br>
                    <div class="text-right">
                        <a class="btn btn-primary" href="<?php echo RUTA_ENTRADA . "/" . $entrada->get_url() ?>" role="button">Seguir Leyendo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

public static function mostrar_entradas_busqueda($entradas)
{
    for ($i = 1; $i <= count($entradas); $i++) {
        if ($i % 3 == 0) {
            ?>
            <div class="row">
            <?php
        }
        $entrada = $entradas[$i - 1];
        self::mostrar_entrada($entrada);
        if ($i % 3 == 0) {
            ?>
            </div>
        <?php
    }
}
}

public static function mostrar_entrada($entrada)
{
    if (!isset($entrada)) {
        return;
    }
    ?>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $entrada->get_titulo();
                ?>
            </div>
            <div class="panel-body">
                <p>
                    <strong>
                        <?php
                        echo $entrada->get_fecha();
                        ?>
                    </strong>
                </p>
                <div class="hyphenation text-justify">
                    <?php
                    echo nl2br(self::resumir_texto($entrada->get_texto()));
                    ?>
                </div>
                <br>
                <div class="text-right">
                    <a class="btn btn-primary" href="<?php echo RUTA_ENTRADA . "/" . $entrada->get_url() ?>" role="button">Seguir Leyendo</a>
                </div>
            </div>
        </div>
    </div>
<?php
}


public function resumir_texto($texto)
{
    $longitudmax = 400;
    $resultado = '';
    if (strlen($texto) >= $longitudmax) {
        /*for ($i = 0; $i < $longitudmax; $i++) {
            $resultado .= substr($texto, $i, 1);
        }*/
        $resultado = substr($texto, 0, $longitudmax);
        $resultado .= '...';
    } else {
        $resultado = $texto;
    }
    return $resultado;
}

public static function mostrar_entradas_busqueda_multiple($entradas)
{
    for ($i = 0; $i < count($entradas); $i++) {
        ?>
        <div class="row">
            <?php
            $entrada = $entradas[$i];
            self::mostrar_entrada_multiple($entrada);
                ?>
            </div>
        <?php
}
}

public static function mostrar_entrada_multiple($entrada)
{
    if (!isset($entrada)) {
        return;
    }
    ?>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $entrada->get_titulo();
                ?>
            </div>
            <div class="panel-body">
                <p>
                    <strong>
                        <?php
                        echo $entrada->get_fecha();
                        ?>
                    </strong>
                </p>
                <div class="hyphenation text-justify">
                    <?php
                    echo nl2br(self::resumir_texto($entrada->get_texto()));
                    ?>
                </div>
                <br>
                <div class="text-right">
                    <a class="btn btn-primary" href="<?php echo RUTA_ENTRADA . "/" . $entrada->get_url() ?>" role="button">Seguir Leyendo</a>
                </div>
            </div>
        </div>
    </div>
<?php
}

}
?>