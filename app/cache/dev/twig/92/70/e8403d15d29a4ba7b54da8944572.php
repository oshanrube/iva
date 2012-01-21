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
\t\t\t\t<ul id=\"menu\">
\t\t\t\t\t<li id=\"menu_active\"><a href=\"home\">Home</a></li>
\t\t\t\t\t<li><a href=\"features\">Features</a></li>
\t\t\t\t\t<li><a href=\"about\">About</a></li>
\t\t\t\t\t<li><a href=\"support\">Support</a></li>
\t\t\t\t\t<li><a href=\"contacts\">Contacts</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"left\">
\t\t\t\t<!-- Login Form -->
\t\t\t\t";
        // line 15
        echo $this->env->getExtension('actions')->renderAction("FOSUserBundle:Security:login", array("quick" => true), array());
        // line 16
        echo "\t\t\t</div>
\t\t\t<div class=\"left right\">\t\t\t
\t\t\t\t<!-- Register Form -->
\t\t\t\t\t<div id=\"mcs_container\">
\t\t\t\t\t<div class=\"customScrollBox\">
\t\t\t\t\t<div class=\"container\" style=\"position:relative;width: 280px;top: 0px;margin: 0;padding: 0;float:left;\">
\t\t\t\t\t<div class=\"content\" style=\"clear:both;width: inherit;\">
            ";
        // line 23
        echo $this->env->getExtension('actions')->renderAction("FOSUserBundle:Registration:register", array("quick" => true), array());
        // line 24
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
        // line 48
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 49
            echo "         \t<li>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username")), "FOSUserBundle"), "html", null, true);
            echo "</li>
         ";
        } else {
            // line 51
            echo "            <li>Hello Guest!</li>
         ";
        }
        // line 53
        echo "\t\t\t<li class=\"sep\">|</li>
\t\t\t<li id=\"toggle\">
\t\t\t";
        // line 55
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 56
            echo "         \t<a class=\"open\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
         ";
        } else {
            // line 58
            echo "            <span id=\"open\" class=\"open\">Log In | Register</span>
         ";
        }
        // line 60
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
