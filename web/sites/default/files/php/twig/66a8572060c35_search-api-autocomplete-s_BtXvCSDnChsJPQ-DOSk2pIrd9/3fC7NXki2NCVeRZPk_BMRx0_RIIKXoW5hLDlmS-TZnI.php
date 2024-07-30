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

/* modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig */
class __TwigTemplate_09f6add92721615dc594a91769a2b2e3 extends Template
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
            return; yield '';
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
            ->checkDeprecations($context, ["note", "label", "suggestion_prefix", "user_input", "suggestion_suffix", "results_count"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "modules/contrib/search_api_autocomplete/templates/search-api-autocomplete-suggestion.html.twig";
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
        return array (  106 => 50,  100 => 48,  97 => 47,  95 => 36,  91 => 46,  85 => 44,  82 => 43,  76 => 41,  73 => 40,  67 => 38,  64 => 37,  61 => 36,  55 => 34,  52 => 33,  46 => 31,  44 => 30,  40 => 28,);
    }

    public function getSourceContext()
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
