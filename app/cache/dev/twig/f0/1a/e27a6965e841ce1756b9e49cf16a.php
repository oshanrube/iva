<?php

/* AcmeTaskBundle:Default:index.html.twig */
class __TwigTemplate_f01ae27a6965e841ce1756b9e49cf16a extends Twig_Template
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
        return "AcmeTaskBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
