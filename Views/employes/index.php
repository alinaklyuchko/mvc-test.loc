{% extends "base.html" %}
{% block content %}
    <h2>Employes</h2>
    <div class="content">
        {% include 'part.php' %}
    </div>
    <div>
        <a href="http://mvc-test.loc/employes/accounting">accounting department</a>
        <a href="http://mvc-test.loc/employes/sales">sales department</a>
        <a href="http://mvc-test.loc/employes">Назад</a>
    </div>
{% endblock %}