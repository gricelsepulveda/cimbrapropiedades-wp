
<!--CONTACT-->
<section class="cm-contact" id="contacto">
  <div class="flex row between cm-flex-contact">
    
    <?php
      if(isset($_GET['r'])){
        echo '<div id="sentMessage">Mensaje enviado exitosamente</div>';
      }
    ?>
    <h2 class="flex row start">Escríbenos y conversemos acerca de tu espacio.</h2>
    <form action="/mailer/mailer.php" class="flex col end cm-contact-form" method="post">
      <h4>Formulario de Contacto</h4>
      <div class="flex row end cm-flex-form"><label>Nombre:*</label><input id="name" name="name" type="text" required placeholder="Introduce tu nombre"/></div>
      <div class="flex row end cm-flex-form"><label>Teléfono:*</label><input id="phone" name="phone" type="text" type="text" required placeholder="Introduce tu teléfono"/></div>
      <div class="flex row end cm-flex-form"><label>Correo:*</label><input id="email" name="email" type="email" type="text" required placeholder="Introduce una dirección de correo válida"/></div>
      <div class="flex row end cm-flex-form"><label>Asunto:</label><input id="subject" name="subject" type="text" type="text" required placeholder="Ingresa el asunto"/></div>
      <div class="flex row end cm-flex-form"><label>Mensaje:</label><textarea id="message" name="message" rows="7" type="text" required placeholder="Ingresa el mensaje"></textarea></div><button
        class="normal" type="submit">Enviar</button><span class="cm-note">Te contactaremos de vuelta en un plazo max.
        de 24hrs (hábiles)</span>
    </form>
  </div>
</section>

