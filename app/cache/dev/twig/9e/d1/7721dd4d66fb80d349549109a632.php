<?php

/* AcmeCalendarBundle:Panel:myCalendars.html.twig */
class __TwigTemplate_9ed17721dd4d66fb80d349549109a632 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2>My Calendars</h2>
<div id=\"mcs12_container\">
\t<div class=\"customScrollBox\">
\t\t<div class=\"container\" style=\"position:relative; top:0; float:left;width: 160px;\">
\t\t\t<div class=\"content\" style=\"clear:both;width: 160px;\">
";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "calendars"));
        foreach ($context['_seq'] as $context["_key"] => $context["calendar"]) {
            // line 7
            echo "\t<span class=\"delete\" title=\"Delete Calendar\" id=\"calendar-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "id"), "html", null, true);
            echo "\"></span> 
\t<label class=\"label_check\" for=\"calendar-";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "id"), "html", null, true);
            echo "\" id=\"calendar-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "id"), "html", null, true);
            echo "\">
\t<input name=\"calendar-";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "id"), "html", null, true);
            echo "\" id=\"calendar-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "id"), "html", null, true);
            echo "\" value=\"1\" type=\"checkbox\" 
\t";
            // line 10
            if ($this->getAttribute($this->getContext($context, "calendar"), "enabled")) {
                echo " ";
                echo "checked=\"checked\"";
                echo " ";
            }
            echo ">
\t";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "calendar"), "title"), "html", null, true);
            echo "
\t</label>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['calendar'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "\t\t\t</div>
\t\t</div>
\t\t<div class=\"dragger_container\">
\t\t\t<div class=\"dragger\"></div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AcmeCalendarBundle:Panel:myCalendars.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
