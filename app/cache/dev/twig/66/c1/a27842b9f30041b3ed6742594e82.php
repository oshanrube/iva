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
        echo "<script type=\"text/javascript\" >
\$(function(){
\t\$('#news-feed').loading();
\t\$.ajax({
\t\turl: '";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("AcmeNewsBundle_ajax_panel"), "html", null, true);
        echo "',
\t\tsuccess: function(r){
\t\t\t\t\$('#news-feed').html(r.page);
\t\t}
\t},loadnewsFeed());
});
function loadnewsFeed(){
\t\$('#news-feed').vTicker({ 
\t\tspeed: 500,
\t\tpause: 3000,
\t\tanimation: 'fade',
\t\tmousePause: false,
\t\tshowItems: 3,
\t\theight: 300
\t});
}
</script>
<div id=\"news-feed\" class=\"border\"></div>";
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
