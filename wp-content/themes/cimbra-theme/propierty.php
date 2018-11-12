<!--TEMPLATE DESCRIPTION-->
<?php
  /*
  * Template Name: Propiedad Template
  * Template Post Type: post, page, product
  */
?>
 
<?php get_header(); ?>
 
<!-- FUNCTION QUERY DATA-->
<?php
  $pesos = get_post_meta($post->ID, 'precio-pesos', true);
  $uf = get_post_meta($post->ID, 'precio-uf', true);
  $m2 = get_post_meta($post->ID, 'm2', true);
  $kind = get_post_meta($post->ID, 'tipo', true);
  $location = get_post_meta($post->ID, 'ubicacion', true);
  $postFeatImg = get_the_post_thumbnail_url($post->ID);
  $currentPost   = get_post($post->ID);
  $excerpt =  apply_filters( 'the_excerpt', $post->post_excerpt);
  $title =  apply_filters( 'the_title', $post->post_title);
  $content = apply_filters( 'the_content', $post->post_content);
  $content = preg_replace('/<img[^>]+./' , '' , $content);
 
?>

<?php
  include('simple_html_dom.php');
// //  //Create a DOM object
  $html = new simple_html_dom();
  // Load HTML from a string
  $html->load($content);
  // Find li elmenets within ul tags
  $list = $html->find('ul+li');
  // Find succeeded
  if ($list) {
    // Display output as code
    foreach($list as $key => $elm) {
      echo "<li>";
      echo htmlentities($elm->innertext);
      echo "</li>";
    }
  }

?>

<?php
  $content = preg_replace("/<li[^>]*>.*?<\/li>/is","" , $content);
?>
 
<!--SLIDER -->
<div class="cm-noslider-wrapper propierty">
  <div class="flex col start cm-flex-propierty-noslider">
    <h2><?php echo $uf; ?>UF - <?php echo $m2; ?>m2<br /><?php echo $kind; ?></h2>
    <p>
      <span><?php echo $location; ?></span>
      <?php echo $excerpt; ?>
    </p>
  </div>
</div>
 
<!--UF BAND-->
<?php
  include('uf-band.php');
?>
 
<!--PROPIERTY PAGE-->
<section class="cm-propierty-page flex col center"><a class="button naked" href="#"><i class="fas fa-arrow-left"></i>Volver</a>
    <h2 class="flex start row cm-section-title"><?php echo $title ?></h2>
    <div class="flex row center cm-flex-property">
      <div class="cm-container-propierty-images">
        <nav class="cm-propierty-carrousel">
          <ul class="flex row start">
            <li class="active"></li>
            <li></li>
            <li></li>
          </ul>
        </nav>
      </div>
      <div class="flex col start cm-property-info"><span class="cm-price-uf"><?php echo $uf; ?>UF</span><span class="cm-price">$<?php echo $pesos; ?></span>
        <div class="flex row start cm-buttons-property"><a class="button normal" data-scroll="" href="#contact">Consultar
            por propiedad</a>
          <div class="flex row start cm-social">
            <p>Compartir</p><a class="button facebook" href="#"><i class="fab fa-facebook-f"></i></a><a class="button whatsapp"
              href="#"><i class="fab fa-whatsapp"></i></a><a class="button twitter" href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
        <h5>Descripción</h5>
        <p class="cm-text-propierty"><?php echo $content; ?></p>
        <h5>Resumen</h5>
        <div class="flex row start cm-propierty-badges">
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-dormitorio.svg" /></div><span>3 Dormitorios</span>
          </div>
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-balcon.svg" /></div><span>Balcón</span>
          </div>
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-bano.svg" /></div><span>2 Baños</span>
          </div>
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-estacionamiento.svg" /></div><span>Estacionamiento</span>
          </div>
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-bodega.svg" /></div><span>Bodega</span>
          </div>
          <div class="flex row start cm-resume">
            <div class="cm-propierty-badge"><img src="../assets/img/icon-area-verde.svg" /></div><span>Áreas verdes</span>
          </div>
        </div>
      </div>
    </div>
  </section>
 
 
<!--CONTACT SECTION-->
<?php
  include('contact.php');
?>
 
<?php get_footer(); ?>