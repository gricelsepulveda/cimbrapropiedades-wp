<?php  
  //HIGHLIGHTED IMAGES 
  function cimbraSetup(){
    add_theme_support('post-thumbnails');
  }
  add_action('after_setup_theme','cimbraSetup');

  //STYLES
  function cimbraStyles(){

    //REGISTER STYLES
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css' , array(), '8.0');
    wp_register_style('general', get_template_directory_uri() . '/css/cm-styles.min.css' , array('normalize'), '1.0');

    //CALL TO STYLES
    wp_enqueue_style('general');

    //REGISTER JS
    wp_enqueue_script('jqueryUpgrade', get_template_directory_uri() . '/js/jquery.js', array(), '3.3.1', true );
    wp_enqueue_script('generalScripts', get_template_directory_uri() . '/js/cm-scripts.js', array(), '1.0.0', true );
    wp_enqueue_script('scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '1.0.0', true );

    //CALL TO JAVASCRIPT
    wp_enqueue_script('jqueryUpgrade');
    wp_enqueue_script('generalScripts');
    wp_enqueue_script('scroll');
  }

  add_action( 'wp_enqueue_scripts', 'cimbraStyles');

  //NAVIGATION
  function cimbraMenus(){
    register_nav_menus(array(
      'header-menu' => __('Header Menu', 'cimbra'),
      'social-menu' => __('Social Menu', 'cimbra'),
      'footer-social-menu' => __('Footer Social Menu', 'cimbra'),
      'footer-contact-menu' => __('Footer Contact Menu', 'cimbra'),
    ));
  }
  add_action('init', 'cimbraMenus');

  //CUSTOM ATTRIBUTES FOR MENU LINKS
  function add_menu_atts( $atts, $item, $args ) {
    if( $args->theme_location == 'header-menu' ) {
      $atts['data-scroll'] = 'true';
    }
    if ( $args->theme_location == 'footer-social-menu' ){
      $atts['class'] = 'cm-link';
    }
    return $atts;
  }
  add_filter('nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

  //CUSTOM CLASSES FOR MENU LINKS
  function classCustomMenu($classes, $item, $args) {
    if($args->theme_location == 'footer-contact-menu') {
      $classes[] = 'flex row start';
    }
    if($args->theme_location == 'header-menu'){
      $classes[] = 'cm-link-item';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'classCustomMenu', 1, 3);  

  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  function new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');

?>
