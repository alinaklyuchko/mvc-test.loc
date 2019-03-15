<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Model/DbTable.php';
$mod = new Model\DbTable('employers', ['id' => '', 'name' => '', 'department' => '', 'department_id' => '']);
$data = $mod->select(['limit' => '10', 'offset' => '5', 'where' => 'position = "Менеджер"']);
//$mod->insert(['first_name' => 'Malkovich', 'name' => 'Antony', 'position' => 'manager']);
require_once 'System/Asset.php';
\System\Asset::getCss();
\System\Asset::getJs();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>
<table>
    <tr class="title">
        <td>ФИО</td>
        <td>Должность</td>
    </tr>
    <?php foreach ($data as $datum) : ?>
        <tr>
            <td><?= $datum->first_name.' '.$datum->name ?></td>
            <td><?= $datum->position ?></td>
        </tr>
    <?php endforeach; ?>

</table>
</body>
</html>
