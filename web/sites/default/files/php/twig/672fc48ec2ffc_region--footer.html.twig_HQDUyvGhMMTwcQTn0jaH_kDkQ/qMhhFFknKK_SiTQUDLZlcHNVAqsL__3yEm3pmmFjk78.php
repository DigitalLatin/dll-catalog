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

/* themes/custom/dll_catalog/templates/layouts/region--footer.html.twig */
class __TwigTemplate_b8c46fb149bfa53ad35dfbe71a30b55e extends Template
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
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->enter($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/custom/dll_catalog/templates/layouts/region--footer.html.twig"));

        // line 16
        $context["classes"] = ["region", ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 18
($context["region"] ?? null), 18, $this->source)))];
        // line 21
        yield "
  <div";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
        yield ">
    <div class=\"container\">
      <div class=\"row align-items-start\">
        <div id=\"footer-menu\" class=\"col-md\">
        ";
        // line 27
        yield "          ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalMenu("menu-footer-menu"), "html", null, true);
        yield "
        </div>
        <div id=\"social-media-icons\" class=\"col-md\">
          <!-- Social Media Icons by NiftyButtons https://niftybuttons.com -->
          <div style=\"display: grid\">
            <a href=\"https://www.facebook.com/digitallatin\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-icon\">
              <svg class=\"niftybutton-facebook\" style=\"display:block;fill:currentColor\" data-donate=\"true\" data-tag=\"fac\" data-name=\"Facebook\" viewbox=\"0 0 512 512\" preserveaspectratio=\"xMidYMid meet\">
                <title>Facebook social icon</title>
                <path d=\"M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z\"></path>
              </svg>
            </a>
            <a href=\"https://x.com/digitallatin\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-icon\">
              <svg class=\"niftybutton-twitter\" style=\"display:block;fill:currentColor\" data-donate=\"true\" data-tag=\"twi\" data-name=\"Twitter\" viewbox=\"0 0 512 512\" preserveaspectratio=\"xMidYMid meet\">
                <title>Twitter social icon</title>
                <path d=\"M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z\"></path>
              </svg>
            </a>
            <a href=\"https://www.youtube.com/@DigitalLatinLibrary\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-icon\">
              <svg class=\"niftybutton-youtube\" style=\"display:block;fill:currentColor\" data-donate=\"true\" data-tag=\"you\" data-name=\"YouTube\" viewbox=\"0 0 512 512\" preserveaspectratio=\"xMidYMid meet\">
                <title>YouTube social icon</title>
                <path d=\"M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z\"></path>
              </svg>
            </a>
            <a href=\"https://catalog.digitallatin.org/rss\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-icon\">
              <svg class=\"niftybutton-rss\" style=\"display:block;fill:currentColor\" data-donate=\"true\" data-tag=\"rss\" data-name=\"RSS\" viewbox=\"0 0 512 512\" preserveaspectratio=\"xMidYMid meet\">
                <title>RSS icon</title>
                <path d=\"M201.8 347.2c0 20.3-16.5 36.8-36.8 36.8 -20.3 0-36.8-16.5-36.8-36.8s16.5-36.8 36.8-36.8C185.3 310.4 201.8 326.8 201.8 347.2zM128.2 204.7v54.5c68.5 0.7 124 56.3 124.7 124.7h54.5C306.7 285.3 226.9 205.4 128.2 204.7zM128.2 166.6c57.9 0.3 112.3 22.9 153.2 63.9 41 41 63.7 95.5 63.9 153.5h54.5c-0.3-149.9-121.7-271.4-271.6-271.9V166.6L128.2 166.6z\"></path>
              </svg>
            </a>
          </div>
        </div>
        <div id=\"contact\" class=\"col-md\">
          ";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block_content", 2), "html", null, true);
        yield "
          <div id=\"copyright\">
            © ";
        // line 61
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Digital Latin Library
          </div>
        </div>
      </div>
    </div>
  </div>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["region", "attributes"]);        
        $__internal_ad96c2d8979d8d23860453e7c5eb1520->leave($__internal_ad96c2d8979d8d23860453e7c5eb1520_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/dll_catalog/templates/layouts/region--footer.html.twig";
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
        return array (  101 => 61,  96 => 59,  60 => 27,  53 => 22,  50 => 21,  48 => 18,  47 => 16,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/dll_catalog/templates/layouts/region--footer.html.twig", "/var/www/html/catalog/web/themes/custom/dll_catalog/templates/layouts/region--footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16);
        static $filters = array("clean_class" => 18, "escape" => 22, "date" => 61);
        static $functions = array("drupal_menu" => 27, "drupal_entity" => 59);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class', 'escape', 'date'],
                ['drupal_menu', 'drupal_entity'],
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
