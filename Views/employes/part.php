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
<?php
require_once 'System/Asset.php';
\System\Asset::getCss();
\System\Asset::getJs();
?>
<div class="content">
    <?php
    require_once 'part.php';
    ?>
    <table>
        <tr class="title">
            <td>Имя</td>
            <td>Департамент</td>
        </tr>
        <?php if ($data) : ?>
            <?php foreach ($data as $datum) : ?>
                <tr>
                    <td><?= $datum->name ?></td>
                    <td><?= $datum->department_name ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <?php
    //    \Services\Pagination::renderPag();
    \Services\Pagination::countPag($params);
    ?>
</div><div class="content">

</body>
</html>