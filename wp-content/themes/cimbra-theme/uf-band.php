<?php 
  $apiUrl = 'https://mindicador.cl/api';
  //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
  if ( ini_get('allow_url_fopen') ) {
      $json = file_get_contents($apiUrl);
  } else {
      //De otra forma utilizamos cURL
      $curl = curl_init($apiUrl);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $json = curl_exec($curl);
      curl_close($curl);
  }
   
  $dailyIndicators = json_decode($json);
?>

<script>
  var date = new Date(),  // 2009-11-10
  locale = "es-es",
  month = date.toLocaleString(locale, {
    month: "long"
  });

  var weekday = new Array(7);
  weekday[0] =  "Domingo";
  weekday[1] = "Lunes";
  weekday[2] = "Martes";
  weekday[3] = "Miércoles";
  weekday[4] = "Jueves";
  weekday[5] = "Viernes";
  weekday[6] = "Sábado";
  var nameDay = weekday[date.getDay()];
  var day = date.getDate();
  var year = date.getFullYear();
  Month = month.replace(/\b\w/g, function(l){ return l.toUpperCase() })
  var fullDate = nameDay + " " + day + " de " + Month +  " de " + year;
</script>

<div class="cm-uf-band flex row center"><script type="text/javascript">document.write(fullDate)</script>, Valor UF: <?php echo $dailyIndicators->uf->valor;?> CLP | <?php echo $dailyIndicators->uf->valor;?> USD</div>