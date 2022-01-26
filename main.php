<?php
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Загрузка файлов на сервер</title>
</head>
<body>
<h1>Пожалуйста загрузите CSV файл</h1>
<form  method="post" name="csvForm" enctype="multipart/form-data">
  <input type="file" name="csvInfo" accept=".csv"> <!-- $_FILES -->
  <input type="submit" value="Отправить">
</form>
<p class="waring"></p>
<script src="js/hendler.js"></script>
</body>
</html>
