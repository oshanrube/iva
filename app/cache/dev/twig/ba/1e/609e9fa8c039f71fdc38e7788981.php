<?php

/* AcmeHelloBundle:Default:index.html.php */
class __TwigTemplate_ba1e609e9fa8c039f71fdc38e7788981 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title><?php \$view['slots']->output('title', 'Welcome!') ?></title>
        <?php \$view['slots']->output('stylesheets') ?>
        <link rel=\"shortcut icon\" href=\"<?php echo \$view['assets']->getUrl('favicon.ico') ?>\" />
    </head>
    <body>
        <?php \$view['slots']->output('_content') ?>
        <?php \$view['slots']->output('stylesheets') ?>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "AcmeHelloBundle:Default:index.html.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
