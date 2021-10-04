<?php

require 'admin/config.php';
require 'functions.php'; 

$conex = conexion($bd_config);
if (!$conex) {
    header('Location: error.php');
}

$posts = obtener_post($blog_config['post_por_paginas'], $conex);
if (!$posts) {
    header('Location: error.php');
}


require 'views/index.view.php';


?>