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

/* themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig */
class __TwigTemplate_c0fd884df15ab1b7edf0ee18fa803dde extends Template
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
        // line 8
        return "page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig"));

        $this->parent = $this->loadTemplate("page.html.twig", "themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig", 8);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 10
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 10)) {
            // line 11
            yield "\t    <div class=\"page__content\">
            <h1>
                <span class=\"field field--name-title field--type-string field--label-hidden\">";
            // line 13
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalField("title", "node", 32268), "html", null, true);
            yield "</span>
            </h1>
            
            ";
            // line 17
            yield "            ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalField("body", "node", 32268), "html", null, true);
            yield "

            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"leaf author col-sm-5\">
                        <a href=\"/dll-author\">Author Authorities</a>
                    </div>
                    <div class=\"leaf work col-sm-5\">

                        <a href=\"/dll-work\">Work Authorities</a>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"leaf item-record col-sm-5\">
                        <a href=\"/dll-item-record\">Item Records</a>
                    </div>
                    <div class=\"leaf webpage col-sm-5\">
                        <a href=\"/dll-web-page\">Web Pages</a>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        // line 40
        yield "    ";
        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig";
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
        return array (  110 => 40,  83 => 17,  77 => 13,  73 => 11,  70 => 10,  60 => 9,  42 => 8,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/layouts/page--node--32268.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("extends" => 8, "if" => 10);
        static $filters = array("escape" => 13);
        static $functions = array("drupal_field" => 13);

        try {
            $this->sandbox->checkSecurity(
                ['extends', 'if'],
                ['escape'],
                ['drupal_field'],
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
