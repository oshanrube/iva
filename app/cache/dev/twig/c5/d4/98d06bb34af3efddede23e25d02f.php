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
 <div class=\"col\">
  \t<div class=\"widget\">
    <h2>Calendars</h2>
\t\t";
        // line 16
        echo $this->env->getExtension('actions')->renderAction("AcmeCalendarBundle:Default:userCalendars", array(), array());
        echo "        
  </div>
  <div class=\"widget\" style=\"height: 300px;\">
    <h2>Location</h2>    
\t\t";
        // line 20
        echo $this->env->getExtension('actions')->renderAction("AcmeLocationBundle:Default:index", array(), array());
        // line 21
        echo "  </div>
 </div>
 <section class=\"col middle-col\">
 \t<header>
\t\t<h2>Dash</h2>
\t</header>
   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
   <p><a class=\"btn\" href=\"#\">View details »</a></p>
 </section>
 <div class=\"col\" style=\"position: absolute;right: 35px;\">
 \t<div class=\"widget\">
    <h2>Weather</h2>
\t\t";
        // line 33
        echo $this->env->getExtension('actions')->renderAction("AcmeWeatherBundle:Default:index", array(), array());
        // line 34
        echo "   </div>
   <div class=\"widget\">
    <h2>News</h2>
    \t";
        // line 37
        echo $this->env->getExtension('actions')->renderAction("AcmeNewsBundle:Default:index", array(), array());
        // line 38
        echo "   </div>
 </div>
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
