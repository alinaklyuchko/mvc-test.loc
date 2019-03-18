<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require_once '././vendor/autoload.php';
//
//$loader = new \Twig\Loader\FilesystemLoader('./templates');
//$twig = new \Twig\Environment($loader, [
//    'cache' => './compilation_cache',
//]);
//$template = $twig->load('base.html');

?>

    <h2>Employes</h2>
    <div class="content">
        <?php require_once 'part.php'; ?>
    </div>

    <div>
        <a href="http://mvc-test.loc/employes/accounting">accounting department</a>
        <a href="http://mvc-test.loc/employes/sales">sales department</a>
        <a href="http://mvc-test.loc/employes">Назад</a>
    </div>
