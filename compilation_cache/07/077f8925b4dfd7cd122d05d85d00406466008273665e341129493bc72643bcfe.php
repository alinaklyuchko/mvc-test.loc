<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.twig */
class __TwigTemplate_9d60dc8c3a6153bea1ecdc15e3cfca807872814f4fb715552cd7ecc993f24c50 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html", "index.twig", 1);
        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        // line 3
        echo "    <h2>Employes</h2>
    <div class=\"content\">
        ";
        // line 5
        $this->loadTemplate("part.php", "index.twig", 5)->display($context);
        // line 6
        echo "    </div>
    <div>
        <a href=\"http://mvc-test.loc/employes/accounting\">accounting department</a>
        <a href=\"http://mvc-test.loc/employes/sales\">sales department</a>
        <a href=\"http://mvc-test.loc/employes\">Назад</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  51 => 5,  47 => 3,  44 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/var/www/mvc-test.loc/Views/employes/index.twig");
    }
}
