<!--TEMPLATE DESCRIPTION-->
<?php 
  /*
  * Template Name: Propiedad Template
  * Template Post Type: post, page, product
  */
?>

<!--HEADER THEME-->
<?php
  //get_header();
?>

<!-- FUNCTION QUERY DATA-->
<?php
  $catalogId = get_cat_ID('catalogo');
  $propiertyId = get_cat_ID('propiedad');

  $args = array(
    'posts_per_page'   => -1,
    'category'         => $catalogId,
    'orderby'          => 'date',
    'order'            => 'ASC',
  );
  $posts = get_posts($args);
  foreach( $posts as $post ) :  setup_postdata($post);
  $m2 = get_post_meta($post->ID, 'm2', true);
?>

  <li class="testimonial"><?php the_content(); ?></li><br/>
  <li class="testimonial"><?php the_title(); ?></li><br/>
  <span><?php echo $post->ID; ?></span>
  <span><?php echo $m2 ?></span>
 
<?php endforeach; ?>
<!--CONTACT SECTION-->


<!--FOOTER THEME-->
<?php
  //get_footer();
?>