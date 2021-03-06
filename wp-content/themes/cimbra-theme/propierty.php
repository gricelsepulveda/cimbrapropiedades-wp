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

  if ( have_posts() ) : while ( have_posts() ) : the_post();
  endwhile;
  endif;

  
  $pesos = get_post_meta($post->ID, 'precio-pesos', true);
  $uf = get_post_meta($post->ID, 'precio-uf', true);
  $m2 = get_post_meta($post->ID, 'm2', true);
  $kind = get_post_meta($post->ID, 'tipo', true);
  $location = get_post_meta($post->ID, 'ubicacion', true);
  $postFeatImg = get_the_post_thumbnail_url($post->ID);
  $currentPost   = get_post($post->ID);
  $excerpt =  get_the_excerpt($post->ID);
  $title =  apply_filters( 'the_title', $post->post_title);
  $content = apply_filters( 'the_content', $post->post_content);
  $content = preg_replace('/<img[^>]+./' , '' , $content);
?>

<?php
  $content = preg_replace("/<li[^>]*>.*?<\/li>/is","" , $content);
?>

<!--SLIDER -->
<div class="cm-noslider-wrapper propierty" style="background-image: url(<?php echo $postFeatImg; ?>);">
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
      <?php
        $attachments = get_children(array('post_parent' => $post->ID,
        'post_status' => 'inherit',
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'DESC',
        'orderby' => 'menu_order ID'));
        foreach($attachments as $att_id => $attachment) {
          $full_img_url = wp_get_attachment_url($attachment->ID);
        }
        $firstElement = reset($attachment);
        
        $firstImgURL = wp_get_attachment_url($firstElement);
      ?>
      <div class="cm-container-propierty-images" style="background-image: url(<?php echo $firstImgURL; ?>);">
        <nav class="cm-propierty-carrousel">
          <ul class="flex row start">
            <?php
              $attachments = get_children(array('post_parent' => $post->ID,
              'post_status' => 'inherit',
              'post_type' => 'attachment',
              'post_mime_type' => 'image',
              'order' => 'ASC',
              'orderby' => 'menu_order ID'));
              foreach($attachments as $att_id => $attachment) {
                $full_img_url = wp_get_attachment_url($attachment->ID);
                echo "<li style='background-image:url(" . $full_img_url . "')></li>";
              }
            ?>
          </ul>
        </nav>
      </div>
      <div class="flex col start cm-property-info"><span class="cm-price-uf"><?php echo $uf; ?>UF</span><span class="cm-price">$<?php echo $pesos; ?></span>
        <div class="flex row start cm-buttons-property"><a class="button normal" data-scroll="" href="#contacto">Consultar
            por propiedad</a>
          <div class="flex row start cm-social">
            <p>Compartir</p>
              <div class="sharethis-inline-share-buttons"></div>
              <a class="button whatsapp" id="wasBtn" href=""><i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
        <h5>Descripción</h5>
        <p class="cm-text-propierty"><?php echo $content; ?></p>
        <h5>Resumen</h5>
        <div class="flex row start cm-propierty-badges">
          <?php
            $content = apply_filters( 'the_content', $post->post_content);
            include('simple_html_dom.php');
            //Create a DOM object
            $html = new simple_html_dom();
            // Load HTML from a string
            $html->load($content);
            // Find li elmenets within ul tags
            $list = $html->find('ul+li');
            // Find succeeded
            if ($list) {
              // Display output as code
              foreach($list as $key => $elm) {
                echo "<div class='flex row start cm-resume'>";

                $string = htmlentities($elm->innertext);
                switch (true) {
                  case stripos($string, 'dormitorio') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-dormitorio.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                  case stripos($string, 'a&ntilde;o') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-bano.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                  case stripos($string, 'estacionamiento') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-estacionamiento.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                  case stripos($string, 'alc') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-balcon.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                  case stripos($string, 'bodega') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-bodega.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                  case stripos($string, 'verde') !== false:
                    echo "<div class='cm-propierty-badge'><img src='" . get_template_directory_uri() . "/img/icon-area-verde.svg'></div>";
                    echo "<span>";
                    echo $string;
                    echo "</span>";
                    break;
                }
                echo "</div>";
              }
            }
          ?>
        </div>
      </div>
    </div>
  </section>
 
 
<!--CONTACT SECTION-->
<?php
  include('contact.php');
?>
 
<?php get_footer(); ?>

  <script>
    var $thisUrl = window.location.href;
    $('.facebook').attr("data-href", $thisUrl);
  </script>

  <script src="//platform-api.sharethis.com/js/sharethis.js#property=5bf2db05d329fa00111f748e&product=inline-share-buttons"></script>

<script>
  $(document).ready(function () {
    
    var images = $(".cm-propierty-carrousel").find("li");

    $(images[0]).addClass('active');

    $(images).click(function(){
      var currentImg = $(this);

      $(images).removeClass('active');
      $(this).addClass('active');
      
      var imgUrl = currentImg[0]["style"]["background-image"].split('"')[1];
      $(".cm-container-propierty-images").css('background-image',  'url(' + imgUrl + ')');
    });
    
    //WHATSAPP BUTTON
    var wasLink = "https://wa.me/";
    var wasMessage = "text=Mira%20esta%20propiedad%20que%20encontre.%20Revisa%20el%20enlace%20";
    var currentUrl = window.location.href;
    var encodeUrl = encodeURI(currentUrl);
    var wasFinalUrl = wasLink + wasMessage + encodeUrl;

    function changeLink(){
      var wasapButton = document.getElementById("wasBtn");
      wasapButton.setAttribute('href', wasFinalUrl);
    }
    changeLink();

  });

  // FACEBOOK
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


</script>