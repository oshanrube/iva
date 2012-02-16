<?php

/* FOSUserBundle:Registration:quickRegister.html.twig */
class __TwigTemplate_c00d0e2ccd9bf4dafaf08e64c01c90ca extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->env->getExtension('form')->setTheme($this->getContext($context, "form"), array("AcmeHomeBundle:Form:quickFields.html.twig", ));
        // line 2
        echo "

<h1>Not a member yet? Sign Up!</h1>
<form action=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " method=\"POST\" class=\"fos_user_registration_quickRegister\">
    ";
        // line 6
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
\t<div class=\"clear\"></div>
\t<button type=\"submit\" name=\"Submit\" class=\"btn register\">
    ";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "
    </button>
</form>";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:quickRegister.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
