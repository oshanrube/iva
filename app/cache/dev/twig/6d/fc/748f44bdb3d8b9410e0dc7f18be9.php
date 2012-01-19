<?php

/* AcmeTaskBundle:Default:new.html.twig */
class __TwigTemplate_6dfc748f44bdb3d8b9410e0dc7f18be9 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->env->getExtension('form')->setTheme($this->getContext($context, "form"), array("AcmeTaskBundle:Form:fields.html.twig", ));
        // line 2
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeTaskBundle_new"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
    ";
        // line 3
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "

    <input type=\"submit\" />
</form>";
    }

    public function getTemplateName()
    {
        return "AcmeTaskBundle:Default:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
