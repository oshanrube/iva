<?php

/* AcmeTaskBundle:Form:fields.html.twig */
class __TwigTemplate_8c72c5a7ee1666f11b3d8aed72714950 extends Twig_Template
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
        echo "    <div class=\"clearfix\">
        ";
        // line 6
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"));
        echo "
        ";
        // line 7
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
        <div class=\"input\">
        ";
        // line 9
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "AcmeTaskBundle:Form:fields.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
