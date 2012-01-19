<?php

/* ::loading.html.twig */
class __TwigTemplate_417224c000f204da116a38ef3a4c6cd0 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<style>
\t\t#loading {
\t\t\tmargin: 80px auto;
\t\t\tposition: relative;
\t\t\twidth: 100px;
\t\t\theight: 100px;
\t\t\t-webkit-border-radius: 50px;
\t\t\t   -moz-border-radius: 50px;
\t\t\t        border-radius: 50px;
\t\t\tbackground: #ccc;
\t\t\tfont: 12px \"Lucida Grande\", Sans-Serif;
\t\t\ttext-align: center;
\t\t\tline-height: 100px;
\t\t\tcolor: white;
\t\t\t-webkit-box-shadow: 0 0 5px rgba(0,0,0,0.5);
\t\t\t-moz-box-shadow: 0 0 5px rgba(0,0,0,0.5);
\t\t\tbox-shadow: 0 0 5px rgba(0,0,0,0.5);
\t\t\t
\t\t}
\t\t#loading:before {
\t\t\tcontent: \"\";
\t\t\tposition: absolute;
\t\t\t  left: -20px;
\t\t\t   top: -20px;
\t\t\tbottom: -20px;
\t\t\t right: -20px;
\t\t\t-webkit-border-radius: 70px;
\t\t\t   -moz-border-radius: 70px;
\t\t\t        border-radius: 70px;
\t\t\tbackground: #eee;
\t\t\tz-index: -2;
\t\t\t-webkit-box-shadow: inset 0 0 10px rgba(0,0,0,0.2);
\t\t\t-moz-box-shadow: inset 0 0 10px rgba(0,0,0,0.2);
\t\t\tbox-shadow: inset 0 0 10px rgba(0,0,0,0.2);
\t\t}
\t\t#loading span {
\t\t\tposition: absolute;
\t\t\twidth: 0;
\t\t\theight: 0;
\t\t\tborder-left: 50px solid transparent;
        \tborder-right: 50px solid transparent;
        \tborder-top: 80px solid rgba(0,0,0,0.7);
        \tz-index: -1;
        \ttop: -28px;
        \tleft: 0px;
        \t-webkit-animation: ticktock 5s linear infinite;
        \t-webkit-transform-origin: 50px 80px;
\t\t}
\t\t#loading strong {
\t\t\toverflow: hidden;
\t\t\tdisplay: block;
\t\t\tmargin: 0 auto;
\t\t\t-webkit-animation: expand 2.5s linear infinite;
\t\t\tline-height:100px
\t\t}
\t\t
\t\t@-webkit-keyframes expand {
\t        0% {
\t                width: 0;
\t        }
\t        100% {
\t                width: 60px;
\t        }
\t\t}
\t\t
\t\t@-webkit-keyframes ticktock {
\t        0% {
\t                -webkit-transform: rotate(0);
\t        }
\t        100% {
\t                -webkit-transform: rotate(360deg);
\t        }
\t\t}
\t\t
\t</style>
\t<div style=\"background:white\">
\t<div id=\"loading\"><strong>loading...</strong><span></span></div>
\t</div>";
    }

    public function getTemplateName()
    {
        return "::loading.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
