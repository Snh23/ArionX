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
                        <a class="btn btn-primary" href="<?php echo RUTA_ENTRADA . "/" . $entrada -> get_url() ?>" role="button">Seguir Leyendo</a>
                    </div>
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
}
?>