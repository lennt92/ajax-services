<?php define ('__ROOT__', $_SERVER['DOCUMENT_ROOT']); ?>
<!DOCTYPE html >
<head>
    <script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="http://localhost/ajax-services/css/style.css" rel="stylesheet">
</head>
<body>
<ul class="service-list-container">
    <?php
    require_once(__ROOT__.'/ajax-services/db.php');
    $stmt = $pdo->query('SELECT id, city FROM cities' );


    while($row = $stmt->fetch()) {
        echo "<li><a href=?id={$row['id']} class='service-link'>{$row['city']}</a></li>";
    }
    ?>
</ul>
<h3 id="city">Авторизованные сервисные центры в г. </h3>

<table class="service-partner-table">
    <thead>
    <tr>
        <th>Название центра</th>
        <th>Адрес</th>
        <th>Время работы</th>
        <th>Телефон</th>
        <th>Доп информация</th>
    </tr>
    </thead>
    <tbody id="output">
        <tr >
        </tr>
    </tbody>

</table>

  <div class="service-logo"><span id="sv-logo"></span></div>

  <script id="source" language="javascript" type="text/javascript">
      
      jQuery( document ).ready(function( $ ) {
          $('a.service-link').click(function () {
              $('#sv-logo').addClass('active');
              var params = $(this).attr('href').split('?');
              $.getJSON( '/ajax-services/api.php', params[1], function (response) {
                  var city = response[0]['city'];

                  console.log(response);
                  $('#city').html("Авторизованные сервисные центры в г." + city + ":");

                  $('#output').empty();
                  $.each(response , function(key,array){
                      $('#output').append("<tr><td>" + array['service_name'] + "</td><td>" + array['adress'] + "</td><td>" + array['time_work'] + "</td><td>" + array['phone_number'] + "</td><td>" + array['more_info'] +"</td></tr>");
                  });
                  $('#sv-logo').removeClass('active');
              });

              return false;

          });
      });
  </script>
</body>
</html>