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

/* hello.html.twig */
class __TwigTemplate_940383a96cd97ea808d1f8b58cd0eae4 extends Template
{
    private $source;
    private $macros = [];

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
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Menu</Menu>
    </title>
    <!-- Compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
    <!-- Compiled and minified JavaScript -->
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>
</head>

<body>
    Hello ";
        // line 17
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
    userid: ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getId", [], "method", false, false, false, 18), "html", null, true);
        echo "
    email: ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getEmail", [], "method", false, false, false, 19), "html", null, true);
        echo "
    registeredAt: ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getRegisteredAt", [], "method", false, false, false, 20), "html", null, true);
        echo "

    <p>HELLO BORDEL</p>
</body>

</html>

";
    }

    public function getTemplateName()
    {
        return "hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 20,  63 => 19,  59 => 18,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "hello.html.twig", "/app/templates/hello.html.twig");
    }
}
