<?php

/* AcmeCalendarBundle:Panel:newCalendar.html.twig */
class __TwigTemplate_06282ec3618c10bc8ffb2313e6a07674 extends Twig_Template
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
        echo "<h2>New Calendar</h2>
<form onSubmit=\"ajaxSubmit(this);return false;\" action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeCalendarBundle_ajaxnewcalendar"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
\t<button type=\"submit\" name=\"Submit\" class=\"btn register\">
    ";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "
    </button>
</form>";
    }

    public function getTemplateName()
    {
        return "AcmeCalendarBundle:Panel:newCalendar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
