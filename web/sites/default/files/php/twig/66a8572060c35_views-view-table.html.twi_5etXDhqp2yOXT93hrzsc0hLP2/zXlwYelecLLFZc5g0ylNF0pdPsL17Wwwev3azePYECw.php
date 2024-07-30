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

/* themes/contrib/bootstrap5/templates/views/views-view-table.html.twig */
class __TwigTemplate_cfd173b45129e38bd1650b492f26d2ae extends Template
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
        // line 34
        $context["classes"] = ["table", "table-striped", "views-table", "views-view-table", ("cols-" . Twig\Extension\CoreExtension::length($this->env->getCharset(), $this->sandbox->ensureToStringAllowed(        // line 39
($context["header"] ?? null), 39, $this->source))), ((        // line 40
($context["responsive"] ?? null)) ? ("responsive-enabled") : ("")), ((        // line 41
($context["sticky"] ?? null)) ? ("sticky-enabled") : (""))];
        // line 44
        yield "<table";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 44), 44, $this->source), "html", null, true);
        yield ">
  ";
        // line 45
        if (($context["caption_needed"] ?? null)) {
            // line 46
            yield "    <caption>
    ";
            // line 47
            if (($context["caption"] ?? null)) {
                // line 48
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 48, $this->source), "html", null, true);
                yield "
    ";
            } else {
                // line 50
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 50, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 52
            yield "    ";
            if (( !Twig\Extension\CoreExtension::testEmpty(($context["summary"] ?? null)) ||  !Twig\Extension\CoreExtension::testEmpty(($context["description"] ?? null)))) {
                // line 53
                yield "      <details>
        ";
                // line 54
                if ( !Twig\Extension\CoreExtension::testEmpty(($context["summary"] ?? null))) {
                    // line 55
                    yield "          <summary>";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary"] ?? null), 55, $this->source), "html", null, true);
                    yield "</summary>
        ";
                }
                // line 57
                yield "        ";
                if ( !Twig\Extension\CoreExtension::testEmpty(($context["description"] ?? null))) {
                    // line 58
                    yield "          ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 58, $this->source), "html", null, true);
                    yield "
        ";
                }
                // line 60
                yield "      </details>
    ";
            }
            // line 62
            yield "    </caption>
  ";
        }
        // line 64
        yield "  ";
        if (($context["header"] ?? null)) {
            // line 65
            yield "    <thead>
      <tr>
        ";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 68
                yield "          ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 68)) {
                    // line 69
                    yield "            ";
                    // line 70
                    $context["column_classes"] = ["views-field", ("views-field-" . $this->sandbox->ensureToStringAllowed((($__internal_compile_0 =                     // line 72
($context["fields"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), 72, $this->source))];
                    // line 75
                    yield "          ";
                }
                // line 76
                yield "          <th";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 76), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 76), "setAttribute", ["scope", "col"], "method", false, false, true, 76), 76, $this->source), "html", null, true);
                yield ">";
                // line 77
                if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 77)) {
                    // line 78
                    yield "<";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
                    yield ">";
                    // line 79
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 79)) {
                        // line 80
                        yield "<a href=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                        yield "\" title=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                        yield "\" rel=\"nofollow\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                        yield "</a>";
                    } else {
                        // line 82
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
                    }
                    // line 84
                    yield "</";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
                    yield ">";
                } else {
                    // line 86
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 86)) {
                        // line 87
                        yield "<a href=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                        yield "\" title=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                        yield "\" rel=\"nofollow\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                        yield "</a>";
                    } else {
                        // line 89
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
                    }
                }
                // line 92
                yield "</th>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            yield "      </tr>
    </thead>
  ";
        }
        // line 97
        yield "  <tbody>
    ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 99
            yield "      <tr";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
            yield ">
        ";
            // line 100
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "columns", [], "any", false, false, true, 100));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 101
                yield "          ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 101)) {
                    // line 102
                    yield "            ";
                    // line 103
                    $context["column_classes"] = ["views-field"];
                    // line 107
                    yield "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "fields", [], "any", false, false, true, 107));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 108
                        yield "              ";
                        $context["column_classes"] = Twig\Extension\CoreExtension::merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null), 108, $this->source), [("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"], 108, $this->source))]);
                        // line 109
                        yield "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 110
                    yield "          ";
                }
                // line 111
                yield "          <td";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 111), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 111), 111, $this->source), "html", null, true);
                yield ">";
                // line 112
                if (CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 112)) {
                    // line 113
                    yield "<";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 113), 113, $this->source), "html", null, true);
                    yield ">
              ";
                    // line 114
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 114));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 115
                        yield "                ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
                        yield "
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 117
                    yield "              </";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
                    yield ">";
                } else {
                    // line 119
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 119));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 120
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 123
                yield "          </td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            yield "      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        yield "  </tbody>
</table>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["header", "responsive", "sticky", "attributes", "caption_needed", "caption", "title", "summary", "description", "fields", "rows"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/contrib/bootstrap5/templates/views/views-view-table.html.twig";
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
        return array (  278 => 127,  271 => 125,  264 => 123,  256 => 120,  252 => 119,  247 => 117,  237 => 115,  233 => 114,  228 => 113,  226 => 112,  222 => 111,  219 => 110,  213 => 109,  210 => 108,  205 => 107,  203 => 103,  201 => 102,  198 => 101,  194 => 100,  189 => 99,  185 => 98,  182 => 97,  177 => 94,  170 => 92,  165 => 89,  155 => 87,  153 => 86,  148 => 84,  144 => 82,  134 => 80,  132 => 79,  128 => 78,  126 => 77,  122 => 76,  119 => 75,  117 => 72,  116 => 70,  114 => 69,  111 => 68,  107 => 67,  103 => 65,  100 => 64,  96 => 62,  92 => 60,  86 => 58,  83 => 57,  77 => 55,  75 => 54,  72 => 53,  69 => 52,  63 => 50,  57 => 48,  55 => 47,  52 => 46,  50 => 45,  45 => 44,  43 => 41,  42 => 40,  41 => 39,  40 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap5/templates/views/views-view-table.html.twig", "/var/www/html/catalog/web/themes/contrib/bootstrap5/templates/views/views-view-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "if" => 45, "for" => 67);
        static $filters = array("length" => 39, "escape" => 44, "merge" => 108);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['length', 'escape', 'merge'],
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
