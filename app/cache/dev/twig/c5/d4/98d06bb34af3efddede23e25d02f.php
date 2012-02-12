<?php

/* AcmeMemberBundle:Default:index.html.twig */
class __TwigTemplate_c5d498d06bb34af3efddede23e25d02f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<section id=\"addNew\">
\t<header>
\t\t<h2>Quick Add</h2>
\t</header>
\t<content>
\t\t";
        // line 9
        echo $this->env->getExtension('actions')->renderAction("AcmeTaskBundle:Panel:AddNewTask", array(), array());
        // line 10
        echo "\t</content>
</section>
<div class=\"\">
\t<div class=\"col\">
\t\t<div class=\"widget\">
\t\t<h2>Calendars</h2>
\t\t\t";
        // line 16
        echo $this->env->getExtension('actions')->renderAction("AcmeCalendarBundle:Default:userCalendars", array(), array());
        echo "        
\t</div>
\t<div class=\"widget\" style=\"height: 300px;\">
\t\t<h2>Location</h2>    
\t\t\t";
        // line 20
        echo $this->env->getExtension('actions')->renderAction("AcmeLocationBundle:Default:index", array(), array());
        // line 21
        echo "\t</div>
</div>
<section class=\"col middle-col\">
\t<header>
\t\t<h2>
\t\tDashboard
\t\t\t<navigation>
\t\t\t\t<a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("AcmeDashBundle_ajax_panel"), "html", null, true);
        echo "\" class=\"nav\" target=\"dashboard\">Tasks</a>
\t\t\t\t<a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("AcmeUserBundle_profile"), "html", null, true);
        echo "\" class=\"nav\" target=\"dashboard\">Profile</a>
\t\t\t\t<a href=\"/tasks\" class=\"nav\" target=\"dashboard\">Calendars</a>
\t\t\t</navigation>
\t\t</h2>
\t</header>
\t\t";
        // line 34
        echo $this->env->getExtension('actions')->renderAction("AcmeDashBundle:Default:index", array(), array());
        // line 35
        echo "</section>
<div class=\"col\" style=\"position: absolute;right: 35px;\">
\t<div class=\"widget\">
\t\t<h2>Weather</h2>
\t\t\t";
        // line 39
        echo $this->env->getExtension('actions')->renderAction("AcmeWeatherBundle:Default:index", array(), array());
        // line 40
        echo "\t\t</div>
\t\t<div class=\"widget\">
\t\t<h2>News</h2>
\t\t\t";
        // line 43
        echo $this->env->getExtension('actions')->renderAction("AcmeNewsBundle:Default:index", array(), array());
        // line 44
        echo "\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AcmeMemberBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
