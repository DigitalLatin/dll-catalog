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

/* core/themes/claro/templates/fieldset.html.twig */
class __TwigTemplate_06059738187922e34a995365f3469bda extends Template
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
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "core/themes/claro/templates/fieldset.html.twig"));

        // line 30
        $context["classes"] = ["fieldset", ((CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 32)) ? ("fieldset--group") : ("")), "js-form-item", "form-item", "js-form-wrapper", "form-wrapper"];
        // line 40
        $context["wrapper_classes"] = ["fieldset__wrapper", ((CoreExtension::getAttribute($this->env, $this->source,         // line 42
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 42)) ? ("fieldset__wrapper--group") : (""))];
        // line 46
        $context["legend_span_classes"] = ["fieldset__label", ((CoreExtension::getAttribute($this->env, $this->source,         // line 48
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 48)) ? ("fieldset__label--group") : ("")), ((        // line 49
($context["required"] ?? null)) ? ("js-form-required") : ("")), ((        // line 50
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 54
        $context["legend_classes"] = ["fieldset__legend", (((CoreExtension::getAttribute($this->env, $this->source,         // line 56
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 56) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["form-composite"], "method", false, false, true, 56))) ? ("fieldset__legend--group") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 57
($context["attributes"] ?? null), "hasClass", ["form-composite"], "method", false, false, true, 57)) ? ("fieldset__legend--composite") : ("")), (((        // line 58
($context["title_display"] ?? null) == "invisible")) ? ("fieldset__legend--invisible") : ("fieldset__legend--visible"))];
        // line 62
        $context["description_classes"] = ["fieldset__description"];
        // line 66
        yield "
<fieldset";
        // line 67
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 67), "html", null, true);
        yield ">
  ";
        // line 69
        yield "  ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 69)) {
            // line 70
            yield "  <legend";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "attributes", [], "any", false, false, true, 70), "addClass", [($context["legend_classes"] ?? null)], "method", false, false, true, 70), "html", null, true);
            yield ">
    <span";
            // line 71
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["legend_span"] ?? null), "attributes", [], "any", false, false, true, 71), "addClass", [($context["legend_span_classes"] ?? null)], "method", false, false, true, 71), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 71), "html", null, true);
            yield "</span>
  </legend>
  ";
        }
        // line 74
        yield "
  <div";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["wrapper_classes"] ?? null)], "method", false, false, true, 75), "html", null, true);
        yield ">
    ";
        // line 76
        if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 76))) {
            // line 77
            yield "      <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 77), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 77), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 77), "html", null, true);
            yield "</div>
    ";
        }
        // line 79
        yield "    ";
        if (($context["inline_items"] ?? null)) {
            // line 80
            yield "      <div class=\"container-inline\">
    ";
        }
        // line 82
        yield "
    ";
        // line 83
        if (($context["prefix"] ?? null)) {
            // line 84
            yield "      <span class=\"fieldset__prefix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["prefix"] ?? null), "html", null, true);
            yield "</span>
    ";
        }
        // line 86
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "
    ";
        // line 87
        if (($context["suffix"] ?? null)) {
            // line 88
            yield "      <span class=\"fieldset__suffix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["suffix"] ?? null), "html", null, true);
            yield "</span>
    ";
        }
        // line 90
        yield "    ";
        if (($context["errors"] ?? null)) {
            // line 91
            yield "      <div class=\"fieldset__error-message\">
        ";
            // line 92
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 95
        yield "    ";
        if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 95))) {
            // line 96
            yield "      <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 96), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 96), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 96), "html", null, true);
            yield "</div>
    ";
        }
        // line 98
        yield "
    ";
        // line 99
        if (($context["inline_items"] ?? null)) {
            // line 100
            yield "      </div>
    ";
        }
        // line 102
        yield "  </div>
</fieldset>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "required", "title_display", "legend", "legend_span", "content_attributes", "description_display", "description", "inline_items", "prefix", "children", "suffix", "errors"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/fieldset.html.twig";
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
        return array (  168 => 102,  164 => 100,  162 => 99,  159 => 98,  151 => 96,  148 => 95,  142 => 92,  139 => 91,  136 => 90,  130 => 88,  128 => 87,  123 => 86,  117 => 84,  115 => 83,  112 => 82,  108 => 80,  105 => 79,  97 => 77,  95 => 76,  91 => 75,  88 => 74,  80 => 71,  75 => 70,  72 => 69,  68 => 67,  65 => 66,  63 => 62,  61 => 58,  60 => 57,  59 => 56,  58 => 54,  56 => 50,  55 => 49,  54 => 48,  53 => 46,  51 => 42,  50 => 40,  48 => 32,  47 => 30,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/claro/templates/fieldset.html.twig", "/var/www/html/catalog/web/core/themes/claro/templates/fieldset.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 30, "if" => 69);
        static $filters = array("escape" => 67);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
