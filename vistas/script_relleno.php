<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/comentario.inc.php';

include_once 'app/repusuario.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/repcomentario.inc.php';

Conexion::abrir_con();
for ($usuarios = 0; $usuarios < 100; $usuarios++ ){
$nombre = sa(10);
$apellidos = sa(8).' '.sa(9);
$usuario = sa(6);
$email = sa(6).'@'.sa(3);
$password = password_hash('123456', PASSWORD_DEFAULT);

$usuario = new Usuario('', $nombre, $apellidos, $usuario, $email, $password, '', '');
RepositorioUsuario::insertar_usuarios(Conexion::obtener_con(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++){
$titulo = sa(10);
$url = $titulo;
$texto = lorem();
$autor = random_int(1, 100);

$entrada = new Entrada('', $autor, $url, $titulo, $texto, '', '');
RepositorioEntrada::insertar_entrada(Conexion::obtener_con(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = random_int(1, 100);
    $entrada = random_int(1, 100);
    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_con(), $comentario);
    }

function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
}
function lorem(){
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc semper lectus ut urna venenatis tempus. Aliquam blandit, ante sed interdum iaculis, mauris nulla bibendum leo, eget fermentum odio nibh vitae risus. Maecenas tortor turpis, consequat nec lacinia vel, venenatis vitae nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ut sodales diam, nec laoreet nisi. Curabitur at justo arcu. Vivamus pharetra tincidunt lorem, quis hendrerit libero ultrices in. Quisque viverra lectus consequat est volutpat maximus. Mauris bibendum ligula ut sodales consectetur. Quisque id auctor turpis.

    Nulla id lectus mauris. Nulla maximus tempus libero ut rhoncus. Phasellus et consectetur risus, ac rhoncus lacus. Suspendisse nulla eros, posuere vel dignissim in, placerat vitae quam. Etiam malesuada odio et mauris malesuada, id lacinia nibh cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse non turpis eu diam venenatis ornare sed ut eros. Mauris sed ipsum sit amet est semper ullamcorper.
    
    Praesent eu efficitur dolor. Etiam nec elementum eros. Donec vehicula aliquet suscipit. Vestibulum pellentesque velit sit amet diam ullamcorper, sed pulvinar nunc porttitor. Aliquam ornare gravida venenatis. Nulla a eros fringilla, sagittis neque sed, volutpat sapien. Pellentesque sed quam feugiat, gravida massa nec, volutpat est.
    
    Praesent nec quam eu nunc venenatis scelerisque ut ut neque. Quisque sed sapien posuere dui tincidunt porta. Vivamus at tristique risus, sit amet sollicitudin eros. In hac habitasse platea dictumst. Maecenas posuere, ipsum at fermentum suscipit, risus leo pretium neque, vitae varius lectus ex id erat. Aliquam tincidunt eros a metus lacinia, ultricies rhoncus purus interdum. Mauris eleifend non est non maximus.
    
    Praesent vel sem felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam volutpat porttitor condimentum. Mauris non interdum urna, tincidunt porta quam. Morbi risus ex, feugiat ut pulvinar id, ultricies vitae enim. Maecenas ut libero lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus est augue, pharetra non pellentesque vitae, mollis sed ex. Aliquam nec interdum lectus. Morbi fermentum posuere turpis eu blandit. Praesent ornare magna in nulla dictum sodales. Integer hendrerit dignissim metus, ac facilisis orci malesuada sed. Donec eget euismod sapien.';
    return $lorem;
}

?>