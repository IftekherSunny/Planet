<?php

/* admin/index.php */
class __TwigTemplate_16b2b8c8cf0885e96a724d549c1ba8bbc93daa3997b2f52b89b3ca450f519066 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title>hi</title>
</head>
<body>
";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["the"]) ? $context["the"] : null), "html", null, true);
        echo " lkk
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "admin/index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }
}
