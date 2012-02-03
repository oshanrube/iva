<?php

/* AcmeNewsBundle:Default:index.html.twig */
class __TwigTemplate_66c1a27842b9f30041b3ed6742594e82 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\">
\$(function(){
\t\$('#news-feed').vTicker({ 
\t\tspeed: 500,
\t\tpause: 3000,
\t\tanimation: 'fade',
\t\tmousePause: false,
\t\tshowItems: 3,
\t\theight: 300
\t});
});
</script>
<div id=\"news-feed\" class=\"border\">
<ul>
";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "feed"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            echo "  
\t<li>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "title"), "html", null, true);
            echo "</li> 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "</ul>
</div>";
    }

    public function getTemplateName()
    {
        return "AcmeNewsBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
