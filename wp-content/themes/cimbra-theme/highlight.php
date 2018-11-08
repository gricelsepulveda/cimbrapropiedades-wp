<!--SHOWCASE PROPIERTIES-->
<section class="cm-showcase">
  <div class="flex row between cm-buttons-showcase">
    <h2 class="flex start row cm-section-title">Propiedades destacadas</h2>
    <div class="flex row end"><a class="button normal" href="#contact">Publica con nosotros</a><a class="button highlight" href="./catalogo.php">Ver catálogo completo</a></div>
  </div>
  <div class="flex row center cm-showcase-flex">
  <?php
    $catalogId = get_cat_ID('catalogo');
    $propiertyId = get_cat_ID('propiedad');
    $highlightId = get_cat_ID('destacada');

    $args = array(
      'posts_per_page'   => -1,
      'category'         => $highlightId,
      'orderby'          => 'date',
      'order'            => 'ASC',
    );
    $posts = get_posts($args);
    foreach( $posts as $post ): setup_postdata($post);
    $propCar = get_post_meta($post->ID, 'propiedad-caracteristicas', true);
    $propKind = get_post_meta($post->ID, 'propiedad-tipo', true);
    $propLoc = get_post_meta($post->ID, 'propiedad-ubicacion', true);
    
  ?>
    <article class="cm-highlight-property" style="background-image: url<?php echo get_template_directory_uri() . '/img/' . the_post_thumbnail(); ?>;">
      <span><?php echo $propLoc; ?></span>
      <div class="flex col start cm-block-h-property">
        <h4><?php echo $propKind; ?></h4>
        <p><?php echo $propCar; ?></p>
        <a class="button naked" href="./propierty.html"><img alt="agregar" src="../assets/img/icon-agregar.svg" title="agregar" /> Seguir leyendo</a>
      </div>
    </article>
  </div>
</section>
<?php endforeach; ?>