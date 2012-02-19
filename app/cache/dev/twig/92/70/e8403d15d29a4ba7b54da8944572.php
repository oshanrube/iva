<?php

/* ::topPanel.html.twig */
class __TwigTemplate_9270e8403d15d29a4ba7b54da8944572 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"toppanel\">
\t<div id=\"panel\">
\t\t<div class=\"content clearfix\">
\t\t\t<div class=\"left\">
\t\t\t\t<img title=\"IVA\" class=\"border\" style=\"width: 272px;\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo.png"), "html", null, true);
        echo "\" />
\t\t\t</div>
\t\t\t<div class=\"left\">
\t\t\t\t<!-- Login Form -->
\t\t\t\t";
        // line 9
        echo $this->env->getExtension('actions')->renderAction("FOSUserBundle:Security:login", array("quick" => true), array());
        // line 10
        echo "\t\t\t</div>
\t\t\t<div class=\"left right\">\t\t\t
\t\t\t\t<!-- Register Form -->
\t\t\t\t\t<div id=\"mcs_container\">
\t\t\t\t\t<div class=\"customScrollBox\">
\t\t\t\t\t<div class=\"container\" style=\"position:relative;width: 280px;top: 0px;margin: 0;padding: 0;float:left;\">
\t\t\t\t\t<div class=\"content\" style=\"clear:both;width: inherit;\">
            ";
        // line 17
        echo $this->env->getExtension('actions')->renderAction("FOSUserBundle:Registration:register", array("quick" => true), array());
        // line 18
        echo "\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"dragger_container\">
\t\t\t\t\t\t<div class=\"dragger\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<!-- content to show if javascript is disabled -->
\t\t\t\t\t<noscript>
\t\t\t\t\t\t<style type=\"text/css\">
\t\t\t\t\t\t\t#mcs_container .customScrollBox{overflow:auto;}
\t\t\t\t\t\t\t#mcs_container .dragger_container{display:none;}
\t\t\t\t\t\t\t
\t\t\t\t\t\t</style>
\t\t\t\t\t</noscript>
\t\t\t</div>
\t\t</div>
</div> <!-- /login -->\t

\t<!-- The tab on top -->\t
\t<div class=\"tab\">
\t\t<ul class=\"login\">
\t\t\t<li class=\"left\">&nbsp;</li>
\t\t\t";
        // line 42
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 43
            echo "         \t<li>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username")), "FOSUserBundle"), "html", null, true);
            echo "</li>
         ";
        } else {
            // line 45
            echo "            <li>Hello Guest!</li>
         ";
        }
        // line 47
        echo "\t\t\t<li class=\"sep\">|</li>
\t\t\t<li id=\"toggle\">
\t\t\t";
        // line 49
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 50
            echo "         \t<a class=\"open\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
         ";
        } else {
            // line 52
            echo "            <span id=\"open\" class=\"open\">Log In | Register</span>
         ";
        }
        // line 54
        echo "\t\t\t\t<span id=\"close\" style=\"display: none;\" class=\"close\">Close Panel</span>\t\t\t
\t\t\t</li>
\t\t\t<li class=\"right\">&nbsp;</li>
\t\t</ul> 
\t</div> 
\t<!-- / top -->
\t</div>";
    }

    public function getTemplateName()
    {
        return "::topPanel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
