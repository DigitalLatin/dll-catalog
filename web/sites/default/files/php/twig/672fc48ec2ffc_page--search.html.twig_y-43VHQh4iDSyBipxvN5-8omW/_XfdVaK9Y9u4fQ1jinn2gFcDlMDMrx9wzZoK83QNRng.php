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
use Twig\TemplateWrapper;

/* themes/custom/dll_catalog/templates/layouts/page--search.html.twig */
class __TwigTemplate_949f165a10dd738ea3e4a19301f3e38c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 7
        return "page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/custom/dll_catalog/templates/layouts/page--search.html.twig"));

        $this->parent = $this->loadTemplate("page.html.twig", "themes/custom/dll_catalog/templates/layouts/page--search.html.twig", 7);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 9
        yield "\t\t";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 9)) {
            // line 10
            yield "\t\t\t<div class=\"page__content\">
\t\t\t\t";
            // line 12
            yield "\t\t\t\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("views_exposed_filter_block:main_solr_search-search"), "html", null, true);
            yield "

\t\t\t\t";
            // line 15
            yield "                ";
            if (Twig\Extension\CoreExtension::testEmpty(views_get_view_result("main_solr_search", "search"))) {
                // line 16
                yield "\t\t\t\t\t<div></div>
\t\t\t\t";
            } else {
                // line 18
                yield "\t\t\t\t\t<div class=\"container search-container\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t";
                // line 21
                yield "\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t<div class=\"search-sidebar\">
\t\t\t\t\t\t\t\t\t<h3>Filter(s)</h3>
\t\t\t\t\t\t\t\t\t<h4>Content type</h4>
\t\t\t\t\t\t\t\t\t";
                // line 25
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("facet_block:content_type"), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t<h4>Time period</h4>
\t\t\t\t\t\t\t\t\t";
                // line 27
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("facet_block:time_period"), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t<h4>Authorized name</h4>
\t\t\t\t\t\t\t\t\t";
                // line 29
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("facet_block:authorized_name"), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                // line 34
                yield "\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<h3>Search Results</h3>
                                ";
                // line 36
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("main_solr_search", "search"), "html", null, true);
                yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 40
            yield "\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 43
        yield "    ";
        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/dll_catalog/templates/layouts/page--search.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  132 => 43,  127 => 40,  120 => 36,  116 => 34,  109 => 29,  104 => 27,  99 => 25,  93 => 21,  89 => 18,  85 => 16,  82 => 15,  76 => 12,  73 => 10,  70 => 9,  60 => 8,  42 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/dll_catalog/templates/layouts/page--search.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/layouts/page--search.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("extends" => 7, "if" => 9);
        static $filters = array("escape" => 12);
        static $functions = array("drupal_block" => 12, "drupal_view_result" => 15, "drupal_view" => 36);

        try {
            $this->sandbox->checkSecurity(
                ['extends', 'if'],
                ['escape'],
                ['drupal_block', 'drupal_view_result', 'drupal_view'],
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
