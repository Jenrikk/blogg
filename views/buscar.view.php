<?php require 'header.php'; ?>

    <h1><?php echo $titulo ?></h1>
    <div class="contenedor">

        <?php foreach($resultados as $post): ?>
            <div class="post">
            <article>
                <h2 class="titulo">
                    <a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a>
                </h2>
                <p class="fecha"><?php echo fecha($post['fecha']) ?></p>
                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id'] ?>">
                        <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="">
                    </a>
                </div>
                <p class="extracto"><?php echo $post['extracto'] ?></p>
                <a class="continuar" href="single.php?id=<?php echo $post['id'] ?>">Seguir leyendo</a>
            </article>
        </div>
        <?php endforeach; ?>


        <?php require 'paginacion.php'; ?>
    </div>

<?php require 'footer.php'; ?>