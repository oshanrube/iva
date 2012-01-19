<?php

/* AcmeHomeBundle:Form:quickFields.html.twig */
class __TwigTemplate_c52b2f4110899e7de3f387cb1514dacd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field_row' => array($this, 'block_field_row'),
            'field_widget' => array($this, 'block_field_widget'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('field_row', $context, $blocks);
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('field_widget', $context, $blocks);
        // line 15
        echo "
";
        // line 16
        $this->displayBlock('checkbox_widget', $context, $blocks);
    }

    // line 1
    public function block_field_row($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "        ";
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "     
        ";
        // line 4
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 8
    public function block_field_widget($context, array $blocks = array())
    {
        // line 9
        ob_start();
        // line 10
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter($this->getContext($context, "type"), "text")) : ("text"));
        // line 11
        echo "    ";
        $context["value"] = ((array_key_exists("value", $context)) ? (_twig_default_filter($this->getContext($context, "value"), "")) : (""));
        // line 12
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo "\" class=\"field\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "label"), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" />
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 16
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 17
        ob_start();
        // line 18
        echo "\t<label class=\"label_check ";
        if ($this->getContext($context, "checked")) {
            echo "c_on";
        } else {
            echo "c_off";
        }
        echo "\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "id"), "html", null, true);
        echo "\" onClick=\"check_it(this)\">
\t\t<input type=\"checkbox\" ";
        // line 19
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "\"";
        }
        if ($this->getContext($context, "checked")) {
            echo " checked=\"checked\"";
        }
        echo " >
\t";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "label"), "html", null, true);
        echo "
\t</label>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "AcmeHomeBundle:Form:quickFields.html.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
