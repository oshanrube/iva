<?php

/* AcmeHomeBundle:Form:fields.html.twig */
class __TwigTemplate_79348f17ca86ca0223904f26e0203a13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field_row' => array($this, 'block_field_row'),
        );
    }

    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('field_row', $context, $blocks);
    }

    public function block_field_row($context, array $blocks = array())
    {
        // line 4
        ob_start();
        // line 5
        echo "\t<div class=\"control-group\">
\t\t";
        // line 6
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"));
        echo "
\t\t<div class=\"controls\">
\t\t\t";
        // line 8
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
         ";
        // line 9
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
\t\t</div>
\t</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "AcmeHomeBundle:Form:fields.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
