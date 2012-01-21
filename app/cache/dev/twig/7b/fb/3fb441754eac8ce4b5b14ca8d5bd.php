<?php

/* AcmeStoreBundle:Default:index.html.twig */
class __TwigTemplate_7bfb3fb441754eac8ce4b5b14ca8d5bd extends Twig_Template
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
        return "AcmeStoreBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
