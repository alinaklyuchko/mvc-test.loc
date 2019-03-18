<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Employes</h2>
    <div class="content">
        <?php require_once 'part.php'; ?>
    </div>
<!--    <form action=""></form>-->
    <div>
        <a href="http://mvc-test.loc/employes/accounting">accounting department</a>
        <a href="http://mvc-test.loc/employes/sales">sales department</a>
        <a href="http://mvc-test.loc/employes">Назад</a>
    </div>
</body>
</html>