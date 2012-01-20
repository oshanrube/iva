<?php

/* AcmeMenusBundle:Default:index.html.twig */
class __TwigTemplate_760a2563b013951ae5b9f705dd4bf261 extends Twig_Template
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
        return "AcmeMenusBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
