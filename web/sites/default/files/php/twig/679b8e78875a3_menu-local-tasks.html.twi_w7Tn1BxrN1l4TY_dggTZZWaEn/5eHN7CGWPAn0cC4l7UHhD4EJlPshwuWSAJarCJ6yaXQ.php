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

/* core/themes/claro/templates/menu-local-tasks.html.twig */
class __TwigTemplate_488beaa6a12f3ac9de6b1bc241d73964 extends Template
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
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "core/themes/claro/templates/menu-local-tasks.html.twig"));

        // line 16
        if (($context["primary"] ?? null)) {
            // line 17
            yield "  <h2 id=\"primary-tabs-title\" class=\"visually-hidden\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Primary tabs"));
            yield "</h2>
  <nav role=\"navigation\" class=\"tabs-wrapper is-horizontal is-collapsible\" aria-labelledby=\"primary-tabs-title\" data-drupal-nav-tabs>
    <ul class=\"tabs tabs--primary clearfix\" data-drupal-nav-tabs-target>";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["primary"] ?? null), "html", null, true);
            yield "</ul>
  </nav>
";
        }
        // line 22
        if (($context["secondary"] ?? null)) {
            // line 23
            yield "  <h2 id=\"secondary-tabs-title\" class=\"visually-hidden\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Secondary tabs"));
            yield "</h2>
  <nav role=\"navigation\" class=\"tabs-wrapper tabs-wrapper--secondary is-horizontal is-collapsible\" aria-labelledby=\"secondary-tabs-title\" data-drupal-nav-tabs>
    <ul class=\"tabs tabs--secondary clearfix\" data-drupal-nav-tabs-target>";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["secondary"] ?? null), "html", null, true);
            yield "</ul>
  </nav>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["primary", "secondary"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/menu-local-tasks.html.twig";
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
        return array (  69 => 25,  63 => 23,  61 => 22,  55 => 19,  49 => 17,  47 => 16,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/claro/templates/menu-local-tasks.html.twig", "/var/www/html/catalog/web/core/themes/claro/templates/menu-local-tasks.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16);
        static $filters = array("t" => 17, "escape" => 19);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
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
