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

/* themes/contrib/bootstrap5/templates/form/input.html.twig */
class __TwigTemplate_736b5ecfa5bd428dbcc8f127722d94c5 extends Template
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
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/contrib/bootstrap5/templates/form/input.html.twig"));

        // line 13
        yield "
";
        // line 14
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["button"], "method", false, false, true, 14) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["field-add-more-submit"], "method", false, false, true, 14)) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["btn"], "method", false, false, true, 14))) {
            // line 15
            yield "  ";
            // line 16
            $context["classes"] = ["btn", ((CoreExtension::getAttribute($this->env, $this->source,             // line 18
($context["attributes"] ?? null), "hasClass", ["button--danger"], "method", false, false, true, 18)) ? ("btn-danger") : ("")), ((( !CoreExtension::getAttribute($this->env, $this->source,             // line 19
($context["attributes"] ?? null), "hasClass", ["media-library-item__remove"], "method", false, false, true, 19) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["button--danger"], "method", false, false, true, 19))) ? ("btn-primary") : (""))];
            // line 22
            yield "  <input";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 22), "html", null, true);
            yield " />
";
        } else {
            // line 24
            yield "  <input";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
            yield " />
";
        }
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "children"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/bootstrap5/templates/form/input.html.twig";
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
        return array (  70 => 26,  64 => 24,  58 => 22,  56 => 19,  55 => 18,  54 => 16,  52 => 15,  50 => 14,  47 => 13,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/bootstrap5/templates/form/input.html.twig", "/var/www/html/catalog/web/themes/contrib/bootstrap5/templates/form/input.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14, "set" => 16);
        static $filters = array("escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
