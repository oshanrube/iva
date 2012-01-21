<?php

/* AcmeWeatherBundle:Default:index.html.twig */
class __TwigTemplate_b47aa241e3bb84f57fa55cd5c49923f6 extends Twig_Template
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
        return "AcmeWeatherBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
