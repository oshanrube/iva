<?php

/* AcmeMenusBundle:Default:menu.html.twig */
class __TwigTemplate_95ad65645d06d4627fd2121eddc4be3a extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul class=\"button-list\">
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "menu"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("member_menu", array("url" => $this->getAttribute($this->getContext($context, "item"), "url"))), "html", null, true);
            echo "\" class='button'>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "label"), "html", null, true);
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 5
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "AcmeMenusBundle:Default:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
