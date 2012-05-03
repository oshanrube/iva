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
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"shortcut icon\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t<meta charset=\"utf-8\">
\t\t<!-- stylesheets -->
\t\t";
        // line 9
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "79ddd72_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_layout_1.css");
            // line 25
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_style_2.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_notifications_3.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_slide_4.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_menu_5.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_jquery.mCustomScrollbar_6.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_articles_7.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_calendar_8.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_tasks_9.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_9") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_weather_10.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_10") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_news_11.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_11") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_feedback_12.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_12") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_profileNotification_13.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
            // asset "79ddd72_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72_13") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72_jquery.jscrollpane_14.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
        } else {
            // asset "79ddd72"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79ddd72") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/79ddd72.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" media=\"all\">
\t\t";
        }
        unset($context["asset_url"]);
        // line 27
        echo "\t\t";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "\t\t<!--bootstrap-->
\t\t<link rel=\"stylesheet/less\" type=\"text/css\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/lib/bootstrap.less"), "html", null, true);
        echo "\">
\t\t<script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/less.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t\t<!-- javascript -->
\t\t";
        // line 32
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4197ce0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery-1.6_1.js");
            // line 51
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.jqtransform_2.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_menu_3.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_feedback_4.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_profileNotification_5.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_ajax-content_6.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery-ui.min_7.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.easing.1.3_8.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.mousewheel.min_9.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_9") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.mousewheel_10.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_10") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.jscrollpane.min_11.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_11") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.form_12.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_12") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_slide_13.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_13") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_bootstrap-twipsy_14.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_14") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_bootstrap-popover_15.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_15") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_script_16.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
            // asset "4197ce0_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0_16") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0_jquery.vticker-min_17.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        } else {
            // asset "4197ce0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4197ce0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/4197ce0.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        }
        unset($context["asset_url"]);
        // line 53
        echo "
\t\t";
        // line 54
        $this->displayBlock('javascript', $context, $blocks);
        // line 55
        echo "\t\t<!-- PNG FIX for IE6 -->
\t\t<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
\t\t<!--[if lte IE 6]>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pngfix/supersleight-min.js"), "html", null, true);
        echo "\"></script>
\t\t<![endif]-->
\t\t<!--[if lt IE 7]>
\t\t\t<div style=' clear: both; text-align:center; position: relative;'>
\t\t\t\t<a href=\"http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode\"><img src=\"http://www.theie6countdown.com/images/upgrade.jpg\" border=\"0\" alt=\"\" /></a>
\t\t\t</div>
\t\t<![endif]-->
\t\t<!--[if lt IE 9]>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/html5.js"), "html", null, true);
        echo "\"></script>
\t\t\t<style type=\"text/css\">
\t\t\t\t.button1 {behavior: url(";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/PIE.htc"), "html", null, true);
        echo ")}
\t\t\t</style>
\t\t<![endif]-->
</head>
<body id=\"page1\" ";
        // line 72
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            echo "class=\"member\"";
        }
        echo " >
<!-- Panel -->
\t";
        // line 74
        $this->env->loadTemplate("::topPanel.html.twig")->display($context);
        // line 75
        echo "<!--panel -->
\t<div class=\"body1\" id=\"body1\">
\t\t<div class=\"body2\">
\t\t\t<div class=\"main\">
\t\t\t<!-- header -->
<header ";
        // line 80
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            echo "style=\"height: 597px;\"";
        }
        echo " >
\t<div class=\"span4\">
\t\t<ul id=\"icons\">
\t\t\t<li><a href=\"\"><img src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon1.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"sitemap\"><img src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon2.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t\t<li><a href=\"contacts\"><img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon3.gif"), "html", null, true);
        echo "\" alt=\"\"></a></li>
\t\t</ul>
\t\t<span class=\"call\"></span>
\t</div>
\t";
        // line 89
        if ((!$this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED"))) {
            // line 90
            echo "\t<div class=\"wrapper\">
\t\t<nav>
\t\t\t<div id=\"main_menu\">
\t\t\t<ul id=\"menu\">
\t\t\t\t<li class=\"first\" class=\"menu_active\">
\t\t\t\t\t<a href=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "aa")), "html", null, true);
            echo "\"  class=\"house\">Home</a></li>
\t\t\t\t<li><a href=\"";
            // line 96
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "concept")), "html", null, true);
            echo "\" class=\"features\">Features</a></li>
\t\t\t\t<li><a href=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "about")), "html", null, true);
            echo "\" class=\"info\">About</a></li>
\t\t\t\t<li><a href=\"";
            // line 98
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AcmeHomeBundle_ajax", array("article" => "mobile")), "html", null, true);
            echo "\" class=\"wrench\">Mobile</a></li>
\t\t\t\t<li><a href=\"";
            // line 99
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
            // line 107
            $this->displayBlock('fos_user_content', $context, $blocks);
            echo "</div>
  \t\t
\t";
        } else {
            // line 110
            echo "\t<div class=\"pull-right\">
\t\t<nav>
\t\t\t<div id=\"member_menu\">
\t\t\t\t";
            // line 113
            echo $this->env->getExtension('actions')->renderAction("AcmeMenusBundle:Default:getMenu", array("menu_type" => 2), array());
            // line 114
            echo "\t\t\t</div>
\t\t</nav>
\t</div>
\t";
        }
        // line 118
        echo "</header>
\t\t\t<!-- / header -->
\t\t\t</div>
\t\t</div>
\t</div>
";
        // line 123
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 124
            echo "<div class=\"dashboard\">
<!-- content -->
\t<section id=\"content\">
\t\t<div id=\"tabContent\">
\t\t\t";
            // line 128
            if (array_key_exists("error", $context)) {
                // line 129
                echo "\t\t\t";
                if ((!twig_test_empty($this->getContext($context, "error")))) {
                    // line 130
                    echo "\t\t\t<div id=\"message\">
\t\t\t<dl id=\"system-message\"><dt class=\"error\">Error</dt><dd class=\"error message\"><ul><li>";
                    // line 131
                    echo twig_escape_filter($this->env, $this->getContext($context, "error"), "html", null, true);
                    echo "</li></ul></dd></dl>
\t\t\t\t<a id=\"close-button\" src=\"\" >
\t\t\t\t<img src=\"";
                    // line 133
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/close.gif"), "html", null, true);
                    echo "\" style=\"padding: 7px;margin-top: 10px;position: relative;float:left\">
\t\t\t\t</a>
\t\t\t</div>
\t\t\t";
                }
                // line 137
                echo "\t\t\t";
            }
            // line 138
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array("notice", ), "method")) {
                // line 139
                echo "\t\t\t<div id=\"message\">
\t\t\t\t<dl id=\"system-message\">
\t\t\t\t\t<dt class=\"notice\">Notice</dt><dd class=\"notice message\"><ul><li>";
                // line 141
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array("notice", ), "method"), "html", null, true);
                echo "</li></ul></dd></dl>
\t\t\t\t<a id=\"close-button\" src=\"\" >
\t\t\t\t<img src=\"";
                // line 143
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/close.gif"), "html", null, true);
                echo "\" style=\"padding: 7px;margin-top: 10px;position: relative;float:left\">
\t\t\t\t</a>
\t\t\t</div>
\t\t\t";
            }
            // line 147
            echo "\t\t\t<div class=\"clear\"></div>
\t\t\t<div id=\"contentHolder\">
\t\t\t\t<!-- The AJAX fetched content goes here -->
\t\t\t\t";
            // line 150
            $this->displayBlock('content', $context, $blocks);
            // line 151
            echo "\t\t\t\t";
            $this->displayBlock('body', $context, $blocks);
            // line 152
            echo "\t\t\t\t";
            $this->displayBlock('javascripts', $context, $blocks);
            // line 153
            echo "\t\t\t</div>
\t\t</div>
\t</section>
</div>
<div id=\"profileNotification\">";
            // line 157
            echo $this->env->getExtension('actions')->renderAction("AcmeMemberBundle:Default:profileNotification", array(), array());
            echo "</div>
<div id=\"feedback\">";
            // line 158
            echo $this->env->getExtension('actions')->renderAction("AcmeFeedbackBundle:Default:getFeedback", array(), array());
            echo "</div>
";
        }
        // line 160
        echo "<script>
\tjQuery(document).ready(function(\$) {
\t\t\$('#form_1').jqTransform({imgPath:'jqtransformplugin/img/'});
\t});
</script>

";
        // line 166
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "197700a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_197700a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/197700a_jquery.mCustomScrollbar_1.js");
            // line 167
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
";
        } else {
            // asset "197700a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_197700a") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/197700a.js");
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
";
        }
        unset($context["asset_url"]);
        // line 169
        echo "</body>
<footer><small style=\"float: left;margin-left: 41px;font-size: 10px;\">The information in this page is strictly for demostration purposes only!</small> OshanR Presents...</footer>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome to IVA!";
    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 54
    public function block_javascript($context, array $blocks = array())
    {
    }

    // line 107
    public function block_fos_user_content($context, array $blocks = array())
    {
    }

    // line 150
    public function block_content($context, array $blocks = array())
    {
    }

    // line 151
    public function block_body($context, array $blocks = array())
    {
    }

    // line 152
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
