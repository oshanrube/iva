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
\tsetInterval(loadnewsFeed, 3000);
\t//\$(\"#news-feed\").click(function(){loadnewsFeed();});
});
function loadnewsFeed(){
\tvar li = \$(\"<li>\"+\$(\"#news-feed-list li\").last().html()+\"</li>\").hide();
\t\$(\"#news-feed-list\").prepend(li);
\tli.fadeIn(\"slow\");
\t\$(\"#news-feed-list li\").last().remove();
\t\t
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
