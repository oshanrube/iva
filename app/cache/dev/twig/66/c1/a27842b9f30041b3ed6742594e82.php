<?php

/* AcmeNewsBundle:Default:index.html.twig */
class __TwigTemplate_66c1a27842b9f30041b3ed6742594e82 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "AcmeNewsBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
