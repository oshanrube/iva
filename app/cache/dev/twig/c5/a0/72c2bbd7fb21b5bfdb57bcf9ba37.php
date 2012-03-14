<?php

/* FOSUserBundle:Security:quickLogin.html.twig */
class __TwigTemplate_c5a072c2bbd7fb21b5bfdb57bcf9ba37 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form class=\"clearfix\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\"  id=\"form-login\">
  <h1>Member Login</h1>
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "csrf_token"), "html", null, true);
        echo "\" />
    
";
        // line 5
        if ((!twig_test_empty($this->getContext($context, "error")))) {
            // line 6
            echo "<div id=\"message\">
<dd class=\"error message\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getContext($context, "error"), "html", null, true);
            echo "</dd>
</div>
";
        }
        // line 10
        echo "
    <input class=\"field\" type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
    <input class=\"field\" type=\"password\" id=\"password\" name=\"_password\" placeholder=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />

  <label for=\"remember_me\">
    <input type=\"checkbox\"  id=\"rememberme\" name=\"_remember_me\" value=\"on\" />
    ";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
  </label>

    <div class=\"clear\"></div>
    <button type=\"submit\" name=\"Submit\" class=\"btn\">
    ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "
    </button>
    <button type=\"submit\" id=\"google_login\" name=\"Submit\" class=\"btn\" onclick=\"window.location.href='http://192.168.1.10/rbs//?option=com_gapi';\">
      <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/google_login.png"), "html", null, true);
        echo "\">
        <span>Login Using Google</span>
      </button>
    <div class=\"clear\"></div>
    <a class=\"lost-pwd\" href=\"/rbs/edit-profile?layout=default&amp;view=reset\">
    Lost your password?
    </a>
    <span class=\"lost-pwd\"> | </span>
    <a class=\"lost-pwd\" href=\"/rbs/edit-profile?view=remind\">
      Forgot your username?
    </a>
</form>        ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:quickLogin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
