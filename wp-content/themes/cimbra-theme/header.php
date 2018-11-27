<!DOCTYPE html>
<html lang="es">
    <meta charset="utf-8" />
    <title>Cimbra Propiedades</title>
    <meta content="Cimbra Propieades" name="description" />
    <meta content="propiedades, corretaje, departamento, casa, inmobiliario, tazaciones, compra, venta" name="keywords" />
    <meta content="Gricel Sepúlveda y Jimena Fuentealba" name="author" />
    <!--VIEWPORT RESPONSIVE-->
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport" />
    <!--FONTAWESOME-->
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      rel="stylesheet" />
    <?php wp_head(); ?>
  </head>
  <body>
    <!--MAIN NAVBAR-->
    <nav class="cm-main-nav">
      <a href="<?php echo esc_url( home_url('/') );?>">
        <img alt="cimbra logo" src="<?php echo get_template_directory_uri() . '/img/'?>logo-cimbra.svg" alt="cimbra-logo"/>
      </a>
      <div class="cm-nav-wrapper flex col end">
        <ul class="cm-social-nav flex row end">
          <li class="cm-social-item flex row end"><a href="tel:+56989029333"><i class="fas fa-phone"></i>+56 9 89029333</a></li>
          <li class="cm-social-item"><a href="https://www.facebook.com/CimbraPropiedades-466776470497653/"><i class="fab fa-facebook-f"></i></a></li>
          <li class="cm-social-item"><a href="https://twitter.com/CimbraP"><i class="fab fa-twitter"></i></a></li>
          <li class="cm-social-item"><a href="https://www.instagram.com/cimbrapropiedades/"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <!-- MAIN NAVIGATION START -->
        <?php
          $headerMenu = array(
            'theme_location' => 'header-menu',
            'container' => false,
            'items_wrap' => '<ul class="cm-link-nav flex row end">%3$s</ul>',
          );
          wp_nav_menu( $headerMenu );
        ?>
        <!-- MAIN NAVIGATION END -->
      </div>
    </nav>