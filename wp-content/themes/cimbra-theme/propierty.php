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
  $postData = get_post();

  $obj = $postData[0];
  echo $obj->ID;
  echo $obj->post_author;

  print_r($postData);
?>


<!--CONTACT SECTION-->
<?php
  //include('contact.php');
?>

<!--FOOTER THEME-->
<?php
  //get_footer();
?>