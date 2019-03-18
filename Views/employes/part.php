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
\Services\Pagination::countPag($params);
?>
