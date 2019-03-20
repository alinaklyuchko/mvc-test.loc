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

/* part.php */
class __TwigTemplate_9aa8775e1ef1c537bb337f93dcb9d1ae4999119e37270a6c49d7b280ee2f20a8 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<table>
    <tr class=\"title\">
        <td>Имя</td>
        <td>Департамент</td>
    </tr>
<!--    ";
        // line 6
        echo twig_escape_filter($this->env, ($context["data"] ?? null), "html", null, true);
        echo "-->
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["datum"]) {
            // line 8
            echo "            <tr>
            <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["datum"], "name", []), "html", null, true);
            echo "</td>
            <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["datum"], "department_name", []), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['datum'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
</table>
<?php \\Services\\Pagination::countPag(\$params); ?>
";
    }

    public function getTemplateName()
    {
        return "part.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 13,  57 => 10,  53 => 9,  50 => 8,  46 => 7,  42 => 6,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "part.php", "/var/www/mvc-test.loc/Views/employes/part.php");
    }
}
