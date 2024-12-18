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

/* modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig */
class __TwigTemplate_0813a9c1e649bb035dc81cf93828512a extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig"));

        // line 28
        yield "
<div class=\"search-api-autocomplete-suggestion\">
  ";
        // line 30
        if (($context["note"] ?? null)) {
            // line 31
            yield "    <span class=\"autocomplete-suggestion-note\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["note"] ?? null), 31, $this->source), "html", null, true);
            yield "</span>
  ";
        }
        // line 33
        yield "  ";
        if (($context["label"] ?? null)) {
            // line 34
            yield "    <span class=\"autocomplete-suggestion-label\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 34, $this->source), "html", null, true);
            yield "</span>
  ";
        }
        // line 36
        yield "  ";
        $___internal_parse_0_ = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 37
            yield "    ";
            if (($context["suggestion_prefix"] ?? null)) {
                // line 38
                yield "      <span class=\"autocomplete-suggestion-suggestion-prefix\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suggestion_prefix"] ?? null), 38, $this->source), "html", null, true);
                yield "</span>
    ";
            }
            // line 40
            yield "    ";
            if (($context["user_input"] ?? null)) {
                // line 41
                yield "      <span class=\"autocomplete-suggestion-user-input\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_input"] ?? null), 41, $this->source), "html", null, true);
                yield "</span>
    ";
            }
            // line 43
            yield "    ";
            if (($context["suggestion_suffix"] ?? null)) {
                // line 44
                yield "      <span class=\"autocomplete-suggestion-suggestion-suffix\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suggestion_suffix"] ?? null), 44, $this->source), "html", null, true);
                yield "</span>
    ";
            }
            // line 46
            yield "  ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($___internal_parse_0_));
        // line 47
        yield "  ";
        if (($context["results_count"] ?? null)) {
            // line 48
            yield "    <span class=\"autocomplete-suggestion-results-count\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["results_count"] ?? null), 48, $this->source), "html", null, true);
            yield "</span>
  ";
        }
        // line 50
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["note", "label", "suggestion_prefix", "user_input", "suggestion_suffix", "results_count"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig";
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
        return array (  113 => 50,  107 => 48,  104 => 47,  102 => 36,  98 => 46,  92 => 44,  89 => 43,  83 => 41,  80 => 40,  74 => 38,  71 => 37,  68 => 36,  62 => 34,  59 => 33,  53 => 31,  51 => 30,  47 => 28,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig", "/var/www/html/catalog/web/modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 30, "apply" => 36);
        static $filters = array("escape" => 31, "spaceless" => 36);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'apply'],
                ['escape', 'spaceless'],
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
