<?php  $numeroPags = numeroPaginas($blog_config['post_por_paginas'], $conex);?>

<section class="paginacion">
    <ul>
        <?php if (pagina_actual() === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?php echo pagina_actual()-1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php for($i=1; $i <= $numeroPags; $i++): ?>
            
            <li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor;?>
        <!-- <li><a href="">2</a></li>
        <li><a href="">3</a></li> -->
        <li><a href="">&raquo;</a></li>
        </ul>
</section>