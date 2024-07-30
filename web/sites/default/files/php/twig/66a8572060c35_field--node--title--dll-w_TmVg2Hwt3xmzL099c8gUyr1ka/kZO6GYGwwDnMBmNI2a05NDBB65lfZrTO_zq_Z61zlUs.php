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

/* themes/custom/dll_catalog/templates/field/field--node--title--dll-work.html.twig */
class __TwigTemplate_464532ef20243e8f30431605fa8e4832 extends Template
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
        if ( !($context["is_inline"] ?? null)) {
            // line 29
            yield "\t";
            yield from             $this->loadTemplate("field.html.twig", "themes/custom/dll_catalog/templates/field/field--node--title--dll-work.html.twig", 29)->unwrap()->yield($context);
        } else {
            // line 31
            yield "\t";
            // line 32
            $context["classes"] = ["field", ("field--name-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(            // line 34
($context["field_name"] ?? null), 34, $this->source))), ("field--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(            // line 35
($context["field_type"] ?? null), 35, $this->source))), ("field--label-" . $this->sandbox->ensureToStringAllowed(            // line 36
($context["label_display"] ?? null), 36, $this->source))];
            // line 40
            $context["id"] = ("dll-work-" . \Drupal\Component\Utility\Html::getId($this->sandbox->ensureToStringAllowed(($context["field_name"] ?? null), 40, $this->source)));
            // line 42
            yield "\t<span";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 42), "setAttribute", ["id", ($context["id"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
            yield ">";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 44
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            yield "</span>
";
        }
        // line 48
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["is_inline", "field_name", "field_type", "label_display", "attributes", "items"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/dll_catalog/templates/field/field--node--title--dll-work.html.twig";
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
        return array (  73 => 48,  69 => 46,  63 => 44,  59 => 43,  55 => 42,  53 => 40,  51 => 36,  50 => 35,  49 => 34,  48 => 32,  46 => 31,  42 => 29,  40 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/dll_catalog/templates/field/field--node--title--dll-work.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/field/field--node--title--dll-work.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 28, "include" => 29, "set" => 32, "for" => 43);
        static $filters = array("clean_class" => 34, "clean_id" => 40, "escape" => 42);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include', 'set', 'for'],
                ['clean_class', 'clean_id', 'escape'],
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
