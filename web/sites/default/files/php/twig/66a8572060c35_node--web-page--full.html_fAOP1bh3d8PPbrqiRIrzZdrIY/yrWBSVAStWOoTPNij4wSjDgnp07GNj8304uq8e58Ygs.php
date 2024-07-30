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

/* themes/custom/dll_catalog/templates/content/node--web-page--full.html.twig */
class __TwigTemplate_5f014a2795d90445218e597fad403d71 extends Template
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
        // line 71
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 73
($context["node"] ?? null), "bundle", [], "any", false, false, true, 73), 73, $this->source))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 74
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 74)) ? ("node--promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 75
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 75)) ? ("node--sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 76
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 76)) ? ("node--unpublished") : ("")), ((        // line 77
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 77, $this->source)))) : (""))];
        // line 81
        $context["id"] = "web-page";
        // line 83
        yield "
";
        // line 84
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap5/node"), "html", null, true);
        yield "
<article";
        // line 85
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 85), "setAttribute", ["id", ($context["id"] ?? null)], "method", false, false, true, 85), 85, $this->source), "html", null, true);
        yield ">


\t";
        // line 88
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 88, $this->source), "html", null, true);
        yield "
\t";
        // line 89
        if ((($context["label"] ?? null) &&  !($context["page"] ?? null))) {
            // line 90
            yield "\t\t<h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 90, $this->source), "html", null, true);
            yield ">
\t\t\t<a href=\"";
            // line 91
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 91, $this->source), "html", null, true);
            yield "\" rel=\"bookmark\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 91, $this->source), "html", null, true);
            yield "</a>
\t\t</h2>
\t";
        }
        // line 94
        yield "\t";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 94, $this->source), "html", null, true);
        yield "

\t<div";
        // line 96
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node__content"], "method", false, false, true, 96), 96, $this->source), "html", null, true);
        yield ">
\t\t";
        // line 97
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 97, $this->source), "html", null, true);
        yield "
\t\t<hr/>
\t\t<p class=\"structured-data\">
\t\t\t<em>This content is also available as
\t\t\t\t<a href=\"";
        // line 101
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 101, $this->source), "html", null, true);
        yield "?format=json-ld\">structured data (JSON-LD)</a>
\t\t\t</em>.
\t\t</p>
\t</div>

</article>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "title_prefix", "label", "page", "title_attributes", "url", "title_suffix", "content_attributes", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/dll_catalog/templates/content/node--web-page--full.html.twig";
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
        return array (  98 => 101,  91 => 97,  87 => 96,  81 => 94,  73 => 91,  68 => 90,  66 => 89,  62 => 88,  56 => 85,  52 => 84,  49 => 83,  47 => 81,  45 => 77,  44 => 76,  43 => 75,  42 => 74,  41 => 73,  40 => 71,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/dll_catalog/templates/content/node--web-page--full.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/content/node--web-page--full.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 71, "if" => 89);
        static $filters = array("clean_class" => 73, "escape" => 84);
        static $functions = array("attach_library" => 84);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                ['attach_library'],
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
