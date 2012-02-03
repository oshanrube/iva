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
        echo "<div id=\"weather\">
<div class=\"thumbnail\">
\t<h4>Today</h4>
\t<img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "todaysWeather"), "icon"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "todaysWeather"), "condition"), "html", null, true);
        echo "\" >
\t<h5 class=\"condition\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "todaysWeather"), "condition"), "html", null, true);
        echo "</h5>
\t<div class=\"humidity\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "todaysWeather"), "humidity"), "html", null, true);
        echo "</div>
</div>
</div>";
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
