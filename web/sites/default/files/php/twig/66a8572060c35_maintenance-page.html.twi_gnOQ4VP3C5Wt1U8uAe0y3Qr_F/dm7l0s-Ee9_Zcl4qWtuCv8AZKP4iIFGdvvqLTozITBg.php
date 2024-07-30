<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/bootstrap5/templates/layout/maintenance-page.html.twig */
class __TwigTemplate_e00a2267512ed11fb94ce696c18623bf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        yield "<div class=\"layout-container d-flex flex-column justify-content-center align-items-center h-100\">

  <header role=\"banner\">
    ";
        // line 15
        if (($context["logo"] ?? null)) {
            // line 16
            yield "      <a class=\"text-center d-block\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front_page"] ?? null), 16, $this->source), "html", null, true);
            yield "\" title=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
            yield "\" rel=\"home\">
        <img src=\"";
            // line 17
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logo"] ?? null), 17, $this->source), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
            yield "\"/>
      </a>
    ";
        }
        // line 20
        yield "
    ";
        // line 21
        if ((($context["site_name"] ?? null) || ($context["site_slogan"] ?? null))) {
            // line 22
            yield "      <div class=\"name-and-slogan\">
        ";
            // line 23
            if (($context["site_name"] ?? null)) {
                // line 24
                yield "         <h1 class=\"site-name\">
           <a href=\"";
                // line 25
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front_page"] ?? null), 25, $this->source), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
                yield "\" rel=\"home\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 25, $this->source), "html", null, true);
                yield "</a>
         </h1>
        ";
            }
            // line 28
            yield "
        ";
            // line 29
            if (($context["site_slogan"] ?? null)) {
                // line 30
                yield "          <div class=\"site-slogan\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_slogan"] ?? null), 30, $this->source), "html", null, true);
                yield "</div>
        ";
            }
            // line 32
            yield "      </div>";
            // line 33
            yield "    ";
        }
        // line 34
        yield "
  </header>

  <main role=\"main\">
    ";
        // line 38
        if (Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["title"] ?? null))))) {
            // line 39
            yield "      <h1 class=\"text-center\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 39, $this->source), "html", null, true);
            yield "</h1>
    ";
        }
        // line 41
        yield "
    ";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
        yield "

    ";
        // line 44
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
        yield "
  </main>

  ";
        // line 47
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 47)) {
            // line 48
            yield "    <aside class=\"layout-sidebar-first\" role=\"complementary\">
      ";
            // line 49
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
            yield "
    </aside>";
            // line 51
            yield "  ";
        }
        // line 52
        yield "
  ";
        // line 53
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 53)) {
            // line 54
            yield "    <aside class=\"layout-sidebar-second\" role=\"complementary\">
      ";
            // line 55
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            yield "
    </aside>";
            // line 57
            yield "  ";
        }
        // line 58
        yield "
  ";
        // line 59
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 59)) {
            // line 60
            yield "    <footer role=\"contentinfo\">
      ";
            // line 61
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
            yield "
    </footer>
  ";
        }
        // line 64
        yield "
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["logo", "front_page", "site_name", "site_slogan", "title", "page"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/contrib/bootstrap5/templates/layout/maintenance-page.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  170 => 64,  164 => 61,  161 => 60,  159 => 59,  156 => 58,  153 => 57,  149 => 55,  146 => 54,  144 => 53,  141 => 52,  138 => 51,  134 => 49,  131 => 48,  129 => 47,  123 => 44,  118 => 42,  115 => 41,  109 => 39,  107 => 38,  101 => 34,  98 => 33,  96 => 32,  90 => 30,  88 => 29,  85 => 28,  75 => 25,  72 => 24,  70 => 23,  67 => 22,  65 => 21,  62 => 20,  54 => 17,  47 => 16,  45 => 15,  40 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap5/templates/layout/maintenance-page.html.twig", "/var/www/html/catalog/web/themes/contrib/bootstrap5/templates/layout/maintenance-page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 15);
        static $filters = array("escape" => 16, "t" => 16, "trim" => 38, "striptags" => 38, "render" => 38);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't', 'trim', 'striptags', 'render'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
