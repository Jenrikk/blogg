<?php
//conexion a la bdd
function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
    
}

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_paginas, $conexion){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_paginas - $post_por_paginas : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_paginas");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function numeroPaginas($postXPag, $conex){
    $total_post = $conex->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numPaginas = ($total_post/$postXPag);
    return $numPaginas;

}


// limpiar el id del single.php/?id=2
function id_articulo($id){
    return (int)limpiarDatos($id);
}


function obtenerPostId($conexi, $id){
    $resultado = $conexi->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}

function fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}



?>