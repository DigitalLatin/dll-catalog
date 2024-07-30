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

/* themes/custom/dll_catalog/templates/layouts/page.html.twig */
class __TwigTemplate_773f65ea34a812c4fdaf0b2e2a590c8d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        $context["nav_classes"] = ((("navbar navbar-expand-lg navbar-custom" . (((        // line 47
($context["b5_navbar_schema"] ?? null) != "none")) ? ((" navbar-" . $this->sandbox->ensureToStringAllowed(($context["b5_navbar_schema"] ?? null), 47, $this->source))) : (""))) . (((        // line 48
($context["b5_navbar_schema"] ?? null) != "none")) ? ((((($context["b5_navbar_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (""))) . ((((        // line 49
($context["b5_navbar_bg_schema"] ?? null) != "dark") && (($context["b5_navbar_bg_schema"] ?? null) != "none"))) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b5_navbar_bg_schema"] ?? null), 49, $this->source))) : ("")));
        // line 51
        yield "
";
        // line 53
        $context["footer_classes"] = (((" " . (((        // line 54
($context["b5_footer_schema"] ?? null) != "none")) ? ((" footer-" . $this->sandbox->ensureToStringAllowed(($context["b5_footer_schema"] ?? null), 54, $this->source))) : (" "))) . (((        // line 55
($context["b5_footer_schema"] ?? null) != "none")) ? ((((($context["b5_footer_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 56
($context["b5_footer_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b5_footer_bg_schema"] ?? null), 56, $this->source))) : (" ")));
        // line 58
        yield "

<header role=\"banner\">
\t";
        // line 61
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
        yield "

\t";
        // line 63
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 63) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 63)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 63))) {
            // line 64
            yield "\t\t<nav class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_classes"] ?? null), 64, $this->source), "html", null, true);
            yield "\">
\t\t\t<div class=\"";
            // line 65
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b5_top_container"] ?? null), 65, $this->source), "html", null, true);
            yield " d-flex\">
\t\t\t\t";
            // line 66
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
            yield "

\t\t\t\t";
            // line 68
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 68) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 68))) {
                // line 69
                yield "\t\t\t\t\t<button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t</button>

\t\t\t\t\t<div class=\"collapse navbar-collapse justify-content-md-end\" id=\"navbarSupportedContent\">
\t\t\t\t\t\t";
                // line 74
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                yield "
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 77
            yield "\t\t\t</div>
\t\t</nav>
\t";
        }
        // line 80
        yield "
</header>

";
        // line 83
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 125
        yield "
";
        // line 126
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["b5_navbar_schema", "b5_navbar_bg_schema", "b5_footer_schema", "b5_footer_bg_schema", "page", "b5_top_container"]);        return; yield '';
    }

    // line 83
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        yield "\t<main role=\"main\">
\t\t<a id=\"main-content\" tabindex=\"-1\"></a>
\t\t";
        // line 87
        yield "\t\t";
        // line 88
        $context["sidebar_first_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 88) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 88))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 90
        yield "
\t\t";
        // line 92
        $context["sidebar_second_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 92) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 92))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 94
        yield "
\t\t";
        // line 96
        $context["content_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 96) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 96))) ? ("col-12 col-lg-6") : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 96) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 96))) ? ("col-12 col-lg-9") : ("col-12"))));
        // line 98
        yield "

\t\t<div class=\"";
        // line 100
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b5_top_container"] ?? null), 100, $this->source), "html", null, true);
        yield "\">
\t\t\t";
        // line 101
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 101)) {
            // line 102
            yield "\t\t\t\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 102), 102, $this->source), "html", null, true);
            yield "
\t\t\t";
        }
        // line 104
        yield "\t\t\t<div class=\"row g-0\">
\t\t\t\t";
        // line 105
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 105)) {
            // line 106
            yield "\t\t\t\t\t<div class=\"order-2 order-lg-1 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_classes"] ?? null), 106, $this->source), "html", null, true);
            yield "\">
\t\t\t\t\t\t";
            // line 107
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
            yield "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 110
        yield "\t\t\t\t<div class=\"order-1 order-lg-2 ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_classes"] ?? null), 110, $this->source), "html", null, true);
        yield "\">
\t\t\t\t\t";
        // line 111
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("system_messages_block"), "html", null, true);
        yield "
\t\t\t\t\t";
        // line 112
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 115
        yield "\t\t\t\t</div>
\t\t\t\t";
        // line 116
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 116)) {
            // line 117
            yield "\t\t\t\t\t<div class=\"order-3 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_classes"] ?? null), 117, $this->source), "html", null, true);
            yield "\">
\t\t\t\t\t\t";
            // line 118
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
            yield "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 121
        yield "\t\t\t</div>
\t\t</div>
\t</main>
";
        return; yield '';
    }

    // line 112
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 113
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 113), 113, $this->source), "html", null, true);
        yield "
\t\t\t\t\t";
        return; yield '';
    }

    // line 126
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 127
        yield "\t";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 127)) {
            // line 128
            yield "\t\t<footer role=\"contentinfo\" class=\"mt-auto ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_classes"] ?? null), 128, $this->source), "html", null, true);
            yield "\">
\t\t\t<div class=\"";
            // line 129
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b5_top_container"] ?? null), 129, $this->source), "html", null, true);
            yield "\">
\t\t\t\t";
            // line 130
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 130), 130, $this->source), "html", null, true);
            yield "
\t\t\t</div>
\t\t</footer>
\t";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/dll_catalog/templates/layouts/page.html.twig";
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
        return array (  236 => 130,  232 => 129,  227 => 128,  224 => 127,  220 => 126,  213 => 113,  207 => 112,  199 => 121,  193 => 118,  188 => 117,  186 => 116,  183 => 115,  181 => 112,  177 => 111,  172 => 110,  166 => 107,  161 => 106,  159 => 105,  156 => 104,  150 => 102,  148 => 101,  144 => 100,  140 => 98,  138 => 96,  135 => 94,  133 => 92,  130 => 90,  128 => 88,  126 => 87,  122 => 84,  118 => 83,  112 => 126,  109 => 125,  107 => 83,  102 => 80,  97 => 77,  91 => 74,  84 => 69,  82 => 68,  77 => 66,  73 => 65,  68 => 64,  66 => 63,  61 => 61,  56 => 58,  54 => 56,  53 => 55,  52 => 54,  51 => 53,  48 => 51,  46 => 49,  45 => 48,  44 => 47,  43 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/dll_catalog/templates/layouts/page.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/layouts/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 46, "if" => 63, "block" => 83);
        static $filters = array("escape" => 61);
        static $functions = array("drupal_block" => 111);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['escape'],
                ['drupal_block'],
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
