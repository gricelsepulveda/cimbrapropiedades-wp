
<?php get_header(); ?>

<!-- FUNCTION QUERY DATA-->
<?php

  $postQuery;
  $postTitle;
  $postContent;
  $postId;
  $postFeatImg;
  $postBtnText;
  $postBtnLink;
  $postSubt1;
  $postSubt2;
  $postSubt1Desc;
  $postSubt2Desc;

  function gettingPostData($thisPost){
    global $post;
    $currentPage = "inicio"; 
    $mainCatID = get_cat_ID( $currentPage );

    $args = array(
      'posts_per_page' => 1,
      'category__and' => array( $mainCatID, $thisPost )
    );
    $postQuery = new WP_Query( $args );
    while( $postQuery->have_posts() ):
      $postQuery->the_post();
      global $postTitle;
      global $postContent;
      global $postId;
      global $postFeatImg;
      global $postBtnText;
      global $postBtnLink;
      global $postSubt1;
      global $postSubt2;
      global $postSubt1Desc;
      global $postSubt2Desc;
      $postTitle = get_the_title();
      $postContent = get_the_content();
      $postId = get_the_ID();
      $postFeatImg = get_the_post_thumbnail_url($postId);
      $postBtnText = get_post_meta($postId, 'texto-boton', true);
      $postBtnLink = get_post_meta($postId, 'enlace-boton', true);
      $postSubt1 = get_post_meta($postId, 'banner-subtitulo1', true);
      $postSubt2 = get_post_meta($postId, 'banner-subtitulo2', true);
      $postSubt1Desc = get_post_meta($postId, 'banner-descripcion1', true);
      $postSubt2Desct = get_post_meta($postId, 'banner-descripcion2', true);
    endwhile;
    //CLEAN QUERY POST
    wp_reset_postdata();
  }
?>


<!--SLIDER -->
<div class="cm-slider-wrapper">
  <ul class="cm-list-slider">
    <!--GETTING SLIDER 1 POST-->
    <?php
      $banner1 = get_cat_ID('banner-1');
      $hola = gettingPostData($banner1);
    ?>
    <!--SLIDER 1-->
    <li class="cm-item-slider active" style="background-image: url(<?php echo $postFeatImg; ?>);" >
      <div class="flex col start cm-slider-content">
        <h2><?php echo $postTitle; ?></h2>
        <div class="flex row start">
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-documento.svg" title="icon-1" /></div>
            <p><?php echo $postSubt1 ?><br/><?php echo $postSubt1Desc; ?></p>
          </article>
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-home.svg" title="icon-1" /></div>
            <p><?php echo $postSubt2 ?><br/><?php echo $postSubt2Desc; ?></p>
          </article>
        </div>
      </div>
    </li>
    <!--GETTING SLIDER 2 POST-->
    <?php
      $banner2 = get_cat_ID('banner-2');
      $hola = gettingPostData($banner2);
    ?>
    <!--SLIDER 2-->
    <li class="cm-item-slider" style="background-image: url(<?php echo $postFeatImg; ?>);" >
      <div class="flex col start cm-slider-content">
        <h2><?php echo $postTitle; ?></h2>
        <div class="flex row start">
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-documento.svg" title="icon-1" /></div>
            <p><?php echo $postSubt1 ?><br/><?php echo $postSubt1Desc; ?></p>
          </article>
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-home.svg" title="icon-1" /></div>
            <p><?php echo $postSubt2 ?><br/><?php echo $postSubt2Desc; ?></p>
          </article>
        </div>
      </div>
    </li>
    <!--GETTING SLIDER 3 POST-->
    <?php
      $banner3 = get_cat_ID('banner-3');
      $hola = gettingPostData($banner3);
    ?>
    <!--SLIDER 3-->
    <li class="cm-item-slider" style="background-image: url(<?php echo $postFeatImg; ?>);" >
      <div class="flex col start cm-slider-content">
        <h2><?php echo $postTitle; ?></h2>
        <div class="flex row start">
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-documento.svg" title="icon-1" /></div>
            <p><?php echo $postSubt1 ?><br/><?php echo $postSubt1Desc; ?></p>
          </article>
          <article class="cm-banner-art">
            <div class="cm-banner-art-icon"><img alt="icon-1" src="<?php echo get_template_directory_uri() . '/img/'?>icon-home.svg" title="icon-1" /></div>
            <p><?php echo $postSubt2 ?><br/><?php echo $postSubt2Desc; ?></p>
          </article>
        </div>
      </div>
    </li>
    <ol class="cm-slider-buttons flex row center">
      <li class="cm-slider-button active"></li>
      <li class="cm-slider-button"></li>
      <li class="cm-slider-button"></li>
    </ol>
  </ul>
</div>
<!--UF BAND-->
<div class="cm-uf-band flex row center">Lunes 27 de Agosto de 2018, Valor UF: $29.238,94 CLP | $44.25 USD</div>

 <!--GETTING SERVICE TITLE-->
 <?php
  $serviciosTitle = get_cat_ID('servicios');
  $hola = gettingPostData($serviciosTitle);
?>


<!--SERVICES-->
<section class="cm-services" id="services">
  <h2 class="flex center row cm-section-title"><?php echo $postTitle; ?></h2>
  <!-- FUNCTION QUERY DATA 2-->
<?php

$postQuery;
$postTitle;
$postContent;
$postId;
$postFeatImg;
$postBtnText;
$postBtnLink;
$postExcerpt;

function gettingServiceData($thisPost, $thisSlug){
  global $post;
  $post_slug=$post->post_name;
  
  $mainCatID = get_cat_ID( $thisSlug );

  $args = array(
    'posts_per_page' => 1,
    'category__and' => array( $mainCatID, $thisPost )
  );
  $postQuery = new WP_Query( $args );
  while( $postQuery->have_posts() ):
    $postQuery->the_post();
    global $postTitle;
    global $postContent;
    global $postId;
    global $postFeatImg;
    global $postBtnText;
    global $postBtnLink;
    global $postExcerpt;
    $postTitle = get_the_title();
    $postContent = get_the_content();
    $postId = get_the_ID();
    $postExcerpt = get_the_excerpt();
    $postFeatImg = get_the_post_thumbnail_url($postId);
    $postBtnText = get_post_meta($postId, 'texto-boton', true);
    $postBtnLink = get_post_meta($postId, 'enlace-boton', true);
  endwhile;
  //CLEAN QUERY POST
  wp_reset_postdata();
}
?>
  <div class="flex center row cm-service-flex">
    <!--SERVICE 1-->
    <article class="flex col center cm-serv-article">
      <!--GETTING CORRETAJE-->
      <?php
        $serviciosHome = get_cat_ID('descripcion');
        $hola = gettingServiceData($serviciosHome, "servicio-corretaje");
      ?>
      <div class="cm-img-container"><img alt="service-1" src="<?php echo $postFeatImg?>" title="service-1" /></div>
      <h3 class="text-center"><?php echo $postTitle; ?></h3>
      <p class="text-center">
        <?php echo $postExcerpt; ?>
      </p>
      <a class="button naked" href="./corretaje.html">
        <img alt="agregar" src="<?php echo get_template_directory_uri() . '/img/'?>icon-agregar.svg"title="agregar" />
        Seguir leyendo
      </a>
    </article>
    <!--SERVICE 2-->
    <article class="flex col center cm-serv-article">
      <!--GETTING venta arriendo-->
      <?php
        $serviciosHome = get_cat_ID('descripcion');
        $hola = gettingServiceData($serviciosHome, "servicio-venta-arriendo");
      ?>
      <div class="cm-img-container"><img alt="service-2" src="<?php echo $postFeatImg?>" title="service-2" /></div>
      <h3 class="text-center"><?php echo $postTitle; ?></h3>
      <p class="text-center">
        <?php echo $postExcerpt; ?>
      </p>
      <a class="button naked" href="./venta-arriendo.html">
        <img alt="agregar" src="<?php echo get_template_directory_uri() . '/img/'?>icon-agregar.svg" title="agregar" />
        Seguir leyendo
      </a>
    </article>
    <!--SERVICE 3-->
    <article class="flex col center cm-serv-article">
      <!--GETTING CORRETAJE-->
      <?php
        $serviciosHome = get_cat_ID('descripcion');
        $hola = gettingServiceData($serviciosHome, "servicio-tasacion");
      ?>
      <div class="cm-img-container"><img alt="service-2" src="<?php echo $postFeatImg?>" title="service-2" /></div>
      <h3 class="text-center"><?php echo $postTitle; ?></h3>
      <p class="text-center">
        <?php echo $postExcerpt; ?>
      </p>
      <a class="button naked" href="./tasacion.html">
        <img alt="agregar" src="<?php echo get_template_directory_uri() . '/img/'?>icon-agregar.svg"/> Seguir leyendo
      </a>
    </article>
  </div>
</section>

<!--CONTACT SECTION-->
<?php
  include('contact.php');
?>

<?php get_footer(); ?>