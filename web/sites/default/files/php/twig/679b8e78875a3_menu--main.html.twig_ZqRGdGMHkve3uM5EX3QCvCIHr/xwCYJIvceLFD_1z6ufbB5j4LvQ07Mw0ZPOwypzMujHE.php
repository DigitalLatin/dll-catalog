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

/* themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig */
class __TwigTemplate_fbd74651fc9675f12db7033eff0f6176 extends Template
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
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig"));

        // line 21
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 22
        yield "
";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_build_menu", $context, 27, $this->getSourceContext())->macro_build_menu(...[($context["items"] ?? null), ($context["attributes"] ?? null), 0]));
        yield "

";
        // line 46
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    // line 29
    public function macro_build_menu($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "items" => $items,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
            $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "build_menu"));

            // line 30
            yield "  ";
            $macros["menus"] = $this;
            // line 31
            yield "  ";
            if (($context["items"] ?? null)) {
                // line 32
                yield "    ";
                // line 33
                $context["ul_classes"] = [(((                // line 34
($context["menu_level"] ?? null) == 0)) ? ("navbar-nav justify-content-end flex-wrap") : ("")), (((                // line 35
($context["menu_level"] ?? null) > 0)) ? ("dropdown-menu") : ("")), ("nav-level-" .                 // line 36
($context["menu_level"] ?? null))];
                // line 39
                yield "    <ul";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["ul_classes"] ?? null)], "method", false, false, true, 39), "html", null, true);
                yield ">
    ";
                // line 40
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 41
                    yield "      ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_add_link", $context, 41, $this->getSourceContext())->macro_add_link(...[$context["item"], CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", [($context["ul_classes"] ?? null)], "method", false, false, true, 41), ($context["menu_level"] ?? null)]));
                    yield "
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                yield "    </ul>
  ";
            }
            
            $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 47
    public function macro_add_link($item = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "item" => $item,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_ad96c2d8979d8d23860453e7c5eb1520 = $this->extensions["Drupal\\tracer\\Twig\\Extension\\TraceableProfilerExtension"];
            $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "add_link"));

            // line 48
            yield "  ";
            $macros["menus"] = $this;
            // line 49
            yield "  ";
            // line 50
            $context["list_item_classes"] = ["nav-item", ((CoreExtension::getAttribute($this->env, $this->source,             // line 52
($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 52)) ? ("dropdown") : (""))];
            // line 55
            yield "  ";
            // line 56
            $context["link_class"] = [(((            // line 57
($context["menu_level"] ?? null) == 0)) ? ("nav-link") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,             // line 58
($context["item"] ?? null), "in_active_trail", [], "any", false, false, true, 58)) ? ("active") : ("")), ((((            // line 59
($context["menu_level"] ?? null) == 0) && (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 59) || CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_collapsed", [], "any", false, false, true, 59)))) ? ("dropdown-toggle") : ("")), (((            // line 60
($context["menu_level"] ?? null) > 0)) ? ("dropdown-item") : (""))];
            // line 63
            yield "  ";
            // line 64
            $context["toggle_class"] = [];
            // line 67
            yield "  <li";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 67), "addClass", [($context["list_item_classes"] ?? null)], "method", false, false, true, 67), "html", null, true);
            yield ">
    ";
            // line 68
            if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 68))) {
                // line 69
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 69), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 69), ["class" => ($context["link_class"] ?? null), "role" => "button", "data-bs-toggle" => "dropdown", "aria-expanded" => "false", "title" => ((t("Expand menu") . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 69))]), "html", null, true);
                yield "
      ";
                // line 70
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_build_menu", $context, 70, $this->getSourceContext())->macro_build_menu(...[CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 70), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)]));
                yield "
    ";
            } else {
                // line 72
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 72), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 72), ["class" => ($context["link_class"] ?? null)]), "html", null, true);
                yield "
    ";
            }
            // line 74
            yield "  </li>
";
            
            $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig";
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
        return array (  186 => 74,  180 => 72,  175 => 70,  170 => 69,  168 => 68,  163 => 67,  161 => 64,  159 => 63,  157 => 60,  156 => 59,  155 => 58,  154 => 57,  153 => 56,  151 => 55,  149 => 52,  148 => 50,  146 => 49,  143 => 48,  126 => 47,  115 => 43,  106 => 41,  102 => 40,  97 => 39,  95 => 36,  94 => 35,  93 => 34,  92 => 33,  90 => 32,  87 => 31,  84 => 30,  67 => 29,  57 => 46,  52 => 27,  49 => 22,  47 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig", "/var/www/html/catalog/web/themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 21, "macro" => 29, "if" => 31, "set" => 33, "for" => 40);
        static $filters = array("escape" => 39, "t" => 69);
        static $functions = array("link" => 69);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'set', 'for'],
                ['escape', 't'],
                ['link'],
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
