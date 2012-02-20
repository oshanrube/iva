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
\tsetInterval(loadnewsFeed, 1500);
\t//\$(\"#news-feed\").click(function(){loadnewsFeed();});
});
function loadnewsFeed(){

\tvar scroll = \$(\"#news-feed\").scrollTop()+25;
\tif(230 <= scroll){scroll=0;}
\t\$(\"#news-feed\").stop().animate({
\t\t\tscrollTop: scroll
\t\t}, 1500,'easeInOutExpo');
}
</script>
<div id=\"news-feed\"  style=\"height: 200px;overflow: hidden;margin-bottom: 0;\" class=\"border\"></div>";
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
