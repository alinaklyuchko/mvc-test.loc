<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Model/DbTable.php';
$mod = new Model\DbTable('employes', ['id' => '', 'name' => '', 'department_id' => '']);
$data = $mod->select();
//$data2 = $mod->selectByDepart(['where' => 'department_name = accounting department'], 'department');
echo '<pre>';
//var_dump($data2);

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
    <table>
        <tr class="title">
            <td>Имя</td>
            <td>Департамент</td>
        </tr>

        <?php foreach ($data as $datum) : ?>
            <tr>
                <td><?= $datum->name ?></td>
                <td><?= $datum->department_id ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <table>
        <tr class="title">
            <td>Имя</td>
            <td>Департамент</td>
        </tr>
        <?php if (isset($data2)) : ?>
        <?php foreach ($data2 as $datum) : ?>
            <tr>
                <td><?= $datum->name ?></td>
                <td><?= $datum->department_name ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>