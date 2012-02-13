<?php

/* AcmeLocationBundle:Default:index.html.twig */
class __TwigTemplate_94be647ab3899a978127e518ad0c23c9 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"map_canvas\" class=\"border\" style=\"height: 256px;\"></div>

<script type=\"text/javascript\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/src-maps.js"), "html", null, true);
        echo "\"></script>";
    }

    public function getTemplateName()
    {
        return "AcmeLocationBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
