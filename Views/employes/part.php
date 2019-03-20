<table>
    <tr class="title">
        <td>Имя</td>
        <td>Департамент</td>
    </tr>
<!--    {{ data }}-->
        {% for datum in data %}
            <tr>
            <td>{{ datum.name }}</td>
            <td>{{ datum.department_name }}</td>
            </tr>
        {% endfor %}

</table>
<?php \Services\Pagination::countPag($params); ?>
