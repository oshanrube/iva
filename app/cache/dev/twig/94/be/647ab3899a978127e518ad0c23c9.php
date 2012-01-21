<?php

/* AcmeLocationBundle:Default:index.html.twig */
class __TwigTemplate_94be647ab3899a978127e518ad0c23c9 extends Twig_Template
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
        return "AcmeLocationBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
