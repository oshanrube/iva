<?php

/* AcmeCalendarBundle:Default:calendarWidget.html.php */
class __TwigTemplate_6a89db7869bfdda69f74245fe7686943 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table>
<tr>
<th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th><th>S</th>
</tr>
<?php
\$d=1
for(\$w=1;\$w<6;\$x++) {
\techo \"<tr>\";
\tfor(\$x=0;\$x<7;\$x++) {
\t\techo \"<td>\".\$d++.\"</td>\";
\t}
\techo \"<tr>\";
}
?>
<table>";
    }

    public function getTemplateName()
    {
        return "AcmeCalendarBundle:Default:calendarWidget.html.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
