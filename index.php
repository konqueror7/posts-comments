<?php
namespace Glavpunkt;

require 'autoload.php';

?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <main>
      <div class="search-block">
        <form name="search_form" class="search_form" action="" method="post">
          <label for="search">Поиск комментариев по содержимому</label>
          <input type="text" name="search" value="" pattern="[A-Za-z]{3,}" required placeholder="Введите не менее 3-х символов на латинице">
          <button type="submit" value="submit" name="button">Найти</button>
        </form>
        <div class="search-result">

        </div>
      </div>
    </main>
    <script type="module" src="js/script.js"></script>
  </body>
</html>
