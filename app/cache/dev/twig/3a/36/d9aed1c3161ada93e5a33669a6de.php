<?php

/* AcmeHomeBundle:Default:article.html.twig */
class __TwigTemplate_3a36d9aed1c3161ada93e5a33669a6de extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2> ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getContext($context, "article"), "title")), "html", null, true);
        echo " </h2>
";
        // line 3
        echo "<p>";
        echo $this->getAttribute($this->getContext($context, "article"), "content");
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "AcmeHomeBundle:Default:article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
