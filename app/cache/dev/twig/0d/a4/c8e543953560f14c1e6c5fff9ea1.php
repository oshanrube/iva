<?php

/* ::header.html.twig */
class __TwigTemplate_0da4c8e543953560f14c1e6c5fff9ea1 extends Twig_Template
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
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header ";
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            echo "style=\"height: 597px;\"";
        }
        echo " >
\t<div class=\"wrapper\">
\t\t<ul id=\"icons\">
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>\"><img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon1.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>sitemap\"><img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon2.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>contacts\"><img src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon3.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t</ul>
\t\t<span class=\"call\"></span>
\t</div>
\t";
        // line 10
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            // line 11
            echo "\t<div class=\"wrapper\">
\t\t<nav>
\t\t\t<div id=\"main_menu\">
\t\t\t<ul id=\"menu\">
\t\t\t\t<li class=\"first\" class=\"menu_active\">
\t\t\t\t\t<a href=\"home?tmpl=ajax\"  class=\"house\">Home</a></li>
\t\t\t\t<li><a href=\"features?tmpl=ajax\" class=\"features\">Features</a></li>
\t\t\t\t<li><a href=\"about?tmpl=ajax\" class=\"info\">About</a></li>
\t\t\t\t<li><a href=\"support?tmpl=ajax\" class=\"wrench\">Support</a></li>
\t\t\t\t<li><a href=\"contacts?tmpl=ajax\" class=\"envelope\">Contacts</a></li>
\t\t\t</ul>
\t\t\t</div>
\t\t</nav>
\t</div>
\t<div id=\"stage\">
\t\t\t<!-- The dot divs are shown here -->
\t</div>
  \t\t<div id=\"ajax_content\"></div>
  \t\t
\t";
        } else {
            // line 31
            echo "\t<div class=\"wrapper\">
\t\t<nav>
\t\t\t<div id=\"member_menu\">
\t\t\t\t<jdoc:include type=\"modules\" name=\"member-menu\" />
\t\t\t</div>
\t\t</nav>
\t</div>
\t";
        }
        // line 39
        echo "\t
\t";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "</header>";
    }

    // line 40
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
