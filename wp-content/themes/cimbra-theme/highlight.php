<section class="cm-showcase">
  <div class="flex row between cm-buttons-showcase">
    <h2 class="flex start row cm-section-title">Propiedades destacadas</h2>
    <div class="flex row end"><a class="button normal" href="#contact">Publica con nosotros</a><a class="button highlight"
        href="./propierties.html">Ver catálogo completo</a></div>
  </div>
  <div class="flex row center cm-showcase-flex">
<!-- FUNCTION QUERY DATA-->
<?php
  $highlightId = get_cat_ID('destacada');
  $propiertyId = get_cat_ID('propiedad');

  $args = array(
    'posts_per_page'   => -1,
    //'category'         => $propiertyId,
    'category__and' => array( $propiertyId, $highlightId ),
    'orderby'          => 'date',
    'order'            => 'ASC',
  );
  $posts = get_posts($args);
  
  foreach( $posts as $post ) :  setup_postdata($post);
  // METADATA
  $pesos = get_post_meta($post->ID, 'precio-pesos', true);
  $uf = get_post_meta($post->ID, 'precio-uf', true);
  $m2 = get_post_meta($post->ID, 'm2', true);
  $kind = get_post_meta($post->ID, 'tipo', true);
  $location = get_post_meta($post->ID, 'ubicacion', true);
  $postFeatImg = get_the_post_thumbnail_url($post->ID);

?>
    <!--PROPIERTY START-->
    <article class="cm-highlight-property" style="background-image: url(<?php echo $postFeatImg; ?>);"><span><?php echo $location; ?></span>
      <div class="flex col start cm-block-h-property">
        <h4><?php echo $location; ?></h4>
        <p><?php echo the_excerpt(); ?></p>
        <a class="button naked" href="<?php the_permalink(); ?>">
          <img alt="agregar" src="<?php echo get_template_directory_uri() . '/img/'?>icon-agregar.svg"/>&nbsp;Seguir leyendo
        </a>
      </div>
    </article>
    <!--PROPIERTY END-->

  <?php endforeach; ?>

  </div>
</section>