    <!--FOOTER-->
    <footer class="cm-footer flex row between">
      <div class="flex col start">
        <p>Síguenos en nuestras redes sociales</p>
        <?php
          $footerSocialMenu = array(
            'theme_location' => 'footer-social-menu',
            'container' => false,
            'items_wrap' => '<div class="flex row start">%3$s</div>',
          );
          wp_nav_menu( $footerSocialMenu );
        ?>
        <p class="direct">O contáctanos directamente</p>
        <?php
          $footerContactMenu = array(
            'theme_location' => 'footer-contact-menu',
            'container' => false,
            'items_wrap' => '<div class="flex row start">%3$s</div>',
          );
          wp_nav_menu( $footerContactMenu );
        ?>
      </div>
      <a class="cm-footer-logo" href="<?php echo esc_url( home_url('/') );?>">
        <img alt="cimbra logo" src="<?php echo get_template_directory_uri() . '/img/'?>logo-cimbra.svg" />
      </a>
    </footer>
    <?php wp_footer(); ?>
    <script>var scroll = new SmoothScroll('a[href*="#"]');</script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5bec1ba870ff5a5a3a722437/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <script>
      $(document).ready(function () {
        $('#sentMessage span').click(function(){
          $('#sentMessage').fadeOut('slow');
        });
      });
    </script>
  </body>
</html>