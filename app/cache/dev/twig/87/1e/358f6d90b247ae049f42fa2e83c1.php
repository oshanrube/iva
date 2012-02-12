<?php

/* ::base.html.twig */
class __TwigTemplate_871e358f6d90b247ae049f42fa2e83c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'content' => array($this, 'block_content'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"<?php echo \$this->language; ?>\" lang=\"<?php echo \$this->language; ?>\" dir=\"<?php echo \$this->direction; ?>\" >
\t<head>
\t\t<script type=\"text/javascript\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.6.js"), "html", null, true);
        echo "\"></script>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t\t<title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"shortcut icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t<meta charset=\"utf-8\">
\t\t<!--bootstrap-->
\t\t<link rel=\"stylesheet/less\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/lib/bootstrap.less"), "html", null, true);
        echo "\">
\t\t<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/less.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t\t<!-- stylesheets -->
\t\t<link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/layout.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/notifications.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/slide.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/menu.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery.mCustomScrollbar.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/calendar.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/tasks.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/weather.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/news.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
\t\t";
        // line 23
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 24
        echo "\t\t<!-- javascript -->
\t\t<script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.jqtransform.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/menu.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/ajax_content.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.easing.1.3.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.mousewheel.min.js"), "html", null, true);
        echo "\"></script>

\t\t<!-- styles needed by jScrollPane -->
\t\t<link type=\"text/css\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery.jscrollpane.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"all\" />
\t\t<!-- the mousewheel plugin - optional to provide mousewheel support -->
\t\t<script type=\"text/javascript\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.mousewheel.js"), "html", null, true);
        echo "\"></script>
\t\t<!-- the jScrollPane script -->
\t\t<script type=\"text/javascript\" src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.jscrollpane.min.js"), "html", null, true);
        echo "\"></script>\t\t
\t\t<script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.form.js"), "html", null, true);
        echo "\"></script> 
\t\t<!-- PNG FIX for IE6 -->
\t\t<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
\t\t<!--[if lte IE 6]>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pngfix/supersleight-min.js"), "html", null, true);
        echo "\"></script>
\t\t<![endif]-->
\t\t<!-- Sliding effect -->
\t\t<script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/slide.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t\t<!--[if lt IE 9]>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/html5.js"), "html", null, true);
        echo "\"></script>
\t\t\t<style type=\"text/css\">
\t\t\t\t.button1 {behavior: url(";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/PIE.htc"), "html", null, true);
        echo ")}
\t\t\t</style>
\t\t<![endif]-->
\t\t<!--[if lt IE 7]>
\t\t\t<div style=' clear: both; text-align:center; position: relative;'>
\t\t\t\t<a href=\"http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode\"><img src=\"http://www.theie6countdown.com/images/upgrade.jpg\" border=\"0\" alt=\"\" /></a>
\t\t\t</div>
\t\t<![endif]-->
\t\t<!--bootstrap javascripts-->
\t\t<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-twipsy.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-popover.js"), "html", null, true);
        echo "\"></script>
\t\t";
        // line 60
        $this->displayBlock('javascript', $context, $blocks);
        // line 61
        echo "\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/script.js"), "html", null, true);
        echo "\"></script>\t\t
\t\t<script type=\"text/javascript\" src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.vticker-min.js"), "html", null, true);
        echo "\"></script>
</head>
<body id=\"page1\" ";
        // line 64
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            echo "class=\"member\"";
        }
        echo " >
<!-- Panel -->
\t";
        // line 66
        $this->env->loadTemplate("::topPanel.html.twig")->display($context);
        // line 67
        echo "<!--panel -->
\t<div class=\"body1\" id=\"body1\">
\t\t<div class=\"body2\">
\t\t\t<div class=\"main\">
\t\t\t<!-- header -->
<header ";
        // line 72
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            echo "style=\"height: 597px;\"";
        }
        echo " >
\t<div class=\"span4\">
\t\t<ul id=\"icons\">
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>\"><img src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon1.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>sitemap\"><img src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon2.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"<?php echo JURI::base(); ?>contacts\"><img src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon3.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t</ul>
\t\t<span class=\"call\"></span>
\t</div>
\t";
        // line 81
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            // line 82
            echo "\t<div class=\"wrapper\">
\t\t<nav>
\t\t\t<div id=\"main_menu\">
\t\t\t<ul id=\"menu\">
\t\t\t\t<li class=\"first\" class=\"menu_active\">
\t\t\t\t\t<a href=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "aa")), "html", null, true);
            echo "\"  class=\"house\">Home</a></li>
\t\t\t\t<li><a href=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "features")), "html", null, true);
            echo "\" class=\"features\">Features</a></li>
\t\t\t\t<li><a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "about")), "html", null, true);
            echo "\" class=\"info\">About</a></li>
\t\t\t\t<li><a href=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "support")), "html", null, true);
            echo "\" class=\"wrench\">Support</a></li>
\t\t\t\t<li><a href=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "contact-us")), "html", null, true);
            echo "\" class=\"envelope\">Contact us</a></li>
\t\t\t</ul>
\t\t\t</div>
\t\t</nav>
\t</div>
\t<div id=\"stage\">
\t\t\t<!-- The dot divs are shown here -->
\t</div>
  \t\t<div id=\"ajax_content\">";
            // line 99
            $this->displayBlock('fos_user_content', $context, $blocks);
            echo "</div>
  \t\t
\t";
        } else {
            // line 102
            echo "\t<div class=\"pull-right\">
\t\t<nav>
\t\t\t<div id=\"member_menu\">
\t\t\t\t";
            // line 105
            echo $this->env->getExtension('actions')->renderAction("AcmeMenusBundle:Default:getMenu", array("menu_type" => 2), array());
            // line 106
            echo "\t\t\t</div>
\t\t</nav>
\t</div>
\t";
        }
        // line 110
        echo "</header>
\t\t\t<!-- / header -->
\t\t\t</div>
\t\t</div>
\t</div>
";
        // line 115
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 116
            echo "<div class=\"dashboard\">
<!-- content -->
\t<section id=\"content\">
\t\t<div id=\"tabContent\">
\t\t\t";
            // line 120
            if (array_key_exists("error", $context)) {
                // line 121
                echo "\t\t\t";
                if ((!twig_test_empty($this->getContext($context, "error")))) {
                    // line 122
                    echo "\t\t\t<div id=\"message\">
\t\t\t<dl id=\"system-message\"><dt class=\"error\">Error</dt><dd class=\"error message\"><ul><li>";
                    // line 123
                    echo twig_escape_filter($this->env, $this->getContext($context, "error"), "html", null, true);
                    echo "</li></ul></dd></dl>
\t\t\t\t<a id=\"close-button\" src=\"\" >
\t\t\t\t<img src=\"";
                    // line 125
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/close.gif"), "html", null, true);
                    echo "\" style=\"padding: 7px;margin-top: 10px;position: relative;float:left\">
\t\t\t\t</a>
\t\t\t</div>
\t\t\t";
                }
                // line 129
                echo "\t\t\t";
            }
            // line 130
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array("notice", ), "method")) {
                // line 131
                echo "\t\t\t<div id=\"message\">
\t\t\t\t<dl id=\"system-message\">
\t\t\t\t\t<dt class=\"notice\">Notice</dt><dd class=\"notice message\"><ul><li>";
                // line 133
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array("notice", ), "method"), "html", null, true);
                echo "</li></ul></dd></dl>
\t\t\t\t<a id=\"close-button\" src=\"\" >
\t\t\t\t<img src=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/close.gif"), "html", null, true);
                echo "\" style=\"padding: 7px;margin-top: 10px;position: relative;float:left\">
\t\t\t\t</a>
\t\t\t</div>
\t\t\t";
            }
            // line 139
            echo "\t\t\t<div class=\"clear\"></div>
\t\t\t<div id=\"contentHolder\">
\t\t\t\t<!-- The AJAX fetched content goes here -->
\t\t\t\t";
            // line 142
            $this->displayBlock('content', $context, $blocks);
            // line 143
            echo "\t\t\t\t";
            $this->displayBlock('body', $context, $blocks);
            // line 144
            echo "\t\t\t\t";
            $this->displayBlock('javascripts', $context, $blocks);
            // line 145
            echo "\t\t\t</div>
\t\t</div>
\t</section>
</div>
";
        }
        // line 150
        echo "<script>
\tjQuery(document).ready(function(\$) {
\t\t\$('#form_1').jqTransform({imgPath:'jqtransformplugin/img/'});\t
\t});
</script>
<script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.mCustomScrollbar.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

</body>
<footer><small style=\"float: left;margin-left: 41px;font-size: 10px;\">The imformation in this page is for demostration purposes only!</small> OshanR Presents...</footer>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 23
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 60
    public function block_javascript($context, array $blocks = array())
    {
    }

    // line 99
    public function block_fos_user_content($context, array $blocks = array())
    {
    }

    // line 142
    public function block_content($context, array $blocks = array())
    {
    }

    // line 143
    public function block_body($context, array $blocks = array())
    {
    }

    // line 144
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
