<?php

/* AcmeProfileBundle:Default:index.html.twig */
class __TwigTemplate_880d4f1d00883fbdf4a6bb60470ec020 extends Twig_Template
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
        return "AcmeProfileBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
