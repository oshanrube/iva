<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_a4652c9e56162846689682fa682db5dc extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<form action=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " method=\"POST\" class=\"fos_user_registration_register\">
    ";
        // line 3
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
    <div class=\"actions\">
            <input type=\"submit\" class=\"btn primary\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\">&nbsp;
            <button type=\"reset\" class=\"btn\">Cancel</button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
