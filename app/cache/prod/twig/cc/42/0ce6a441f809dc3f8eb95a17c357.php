<?php

/* TwigBundle:Exception:traces.html.twig */
class __TwigTemplate_cc420ce6a441f809dc3f8eb95a17c357 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"block\">
    ";
        // line 2
        if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
        if (($_count_ > 0)) {
            // line 3
            echo "        <h2>
            <span><small>[";
            // line 4
            if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, (($_count_ - $_position_) + 1), "html", null, true);
            echo "/";
            if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
            echo twig_escape_filter($this->env, ($_count_ + 1), "html", null, true);
            echo "]</small></span>
            ";
            // line 5
            if (isset($context["exception"])) { $_exception_ = $context["exception"]; } else { $_exception_ = null; }
            echo $this->env->getExtension('code')->abbrClass($this->getAttribute($_exception_, "class"));
            echo ": ";
            if (isset($context["exception"])) { $_exception_ = $context["exception"]; } else { $_exception_ = null; }
            echo $this->env->getExtension('code')->formatFileFromText(strtr(twig_escape_filter($this->env, $this->getAttribute($_exception_, "message")), array("
" => "<br />")));
            echo "&nbsp;
            ";
            // line 6
            ob_start();
            // line 7
            echo "            <a href=\"#\" onclick=\"toggle('traces_";
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, $_position_, "html", null, true);
            echo "', 'traces'); switchIcons('icon_traces_";
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, $_position_, "html", null, true);
            echo "_open', 'icon_traces_";
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, $_position_, "html", null, true);
            echo "_close'); return false;\">
                <img class=\"toggle\" id=\"icon_traces_";
            // line 8
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, $_position_, "html", null, true);
            echo "_close\" alt=\"-\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
            echo (((0 == $_count_)) ? ("display") : ("hidden"));
            echo "\" />
                <img class=\"toggle\" id=\"icon_traces_";
            // line 9
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            echo twig_escape_filter($this->env, $_position_, "html", null, true);
            echo "_open\" alt=\"+\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
            echo (((0 == $_count_)) ? ("hidden") : ("display"));
            echo "; margin-left: -18px\" />
            </a>
            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 12
            echo "        </h2>
    ";
        } else {
            // line 14
            echo "        <h2>Stack Trace</h2>
    ";
        }
        // line 16
        echo "
    <a id=\"traces_link_";
        // line 17
        if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
        echo twig_escape_filter($this->env, $_position_, "html", null, true);
        echo "\"></a>
    <ol class=\"traces list_exception\" id=\"traces_";
        // line 18
        if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
        echo twig_escape_filter($this->env, $_position_, "html", null, true);
        echo "\" style=\"display: ";
        if (isset($context["count"])) { $_count_ = $context["count"]; } else { $_count_ = null; }
        echo (((0 == $_count_)) ? ("block") : ("none"));
        echo "\">
        ";
        // line 19
        if (isset($context["exception"])) { $_exception_ = $context["exception"]; } else { $_exception_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_exception_, "trace"));
        foreach ($context['_seq'] as $context["i"] => $context["trace"]) {
            // line 20
            echo "            <li>
                ";
            // line 21
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
            if (isset($context["trace"])) { $_trace_ = $context["trace"]; } else { $_trace_ = null; }
            $this->env->loadTemplate("TwigBundle:Exception:trace.html.twig")->display(array("prefix" => $_position_, "i" => $_i_, "trace" => $_trace_));
            // line 22
            echo "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['trace'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "    </ol>
</div>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
