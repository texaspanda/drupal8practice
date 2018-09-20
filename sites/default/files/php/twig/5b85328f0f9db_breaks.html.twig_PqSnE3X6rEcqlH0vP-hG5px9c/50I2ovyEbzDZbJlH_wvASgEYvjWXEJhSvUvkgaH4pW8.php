<?php

/* modules/custom/time_watcher/templates/breaks.html.twig */
class __TwigTemplate_116da53ad38cad4a8b8ad90a1798ca10279a592519671e420f07f7ec3dbcb3bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 2);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 2
        echo "    ";
        if ($this->getAttribute(($context["content"] ?? null), "top", array())) {
            // line 3
            echo "        <div class=\"watcher-top\">
            ";
            // line 4
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "top", array()), "html", null, true));
            echo "
        </div>
    ";
        }
        // line 7
        echo "
";
        // line 9
        echo "    ";
        if (($this->getAttribute(($context["content"] ?? null), "left", array()) && $this->getAttribute(($context["content"] ?? null), "right", array()))) {
            // line 10
            echo "        <div class=\"watcher-left\">
            ";
            // line 11
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "left", array()), "html", null, true));
            echo "
        </div>
        <div class=\"watcher-right\">
            ";
            // line 14
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "right", array()), "html", null, true));
            echo "
        </div>
    ";
        }
        // line 17
        echo "
";
        // line 21
        echo "    ";
        if (($this->getAttribute(($context["content"] ?? null), "left", array()) && ($this->getAttribute(($context["content"] ?? null), "right", array()) == false))) {
            // line 22
            echo "        <div class=\"watcher-middle\">
            ";
            // line 23
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "left", array()), "html", null, true));
            echo "
        </div>
    ";
        } elseif (($this->getAttribute(        // line 25
($context["content"] ?? null), "right", array()) && ($this->getAttribute(($context["content"] ?? null), "left", array()) == false))) {
            // line 26
            echo "        <div class=\"watcher-middle\">
            ";
            // line 27
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "right", array()), "html", null, true));
            echo "
        </div>
    ";
        }
        // line 30
        echo "
";
        // line 32
        echo "    ";
        if ($this->getAttribute(($context["content"] ?? null), "bottom", array())) {
            // line 33
            echo "        <div class=\"watcher-bottom\">
            ";
            // line 34
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "bottom", array()), "html", null, true));
            echo "
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "modules/custom/time_watcher/templates/breaks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 34,  107 => 33,  104 => 32,  101 => 30,  95 => 27,  92 => 26,  90 => 25,  85 => 23,  82 => 22,  79 => 21,  76 => 17,  70 => 14,  64 => 11,  61 => 10,  58 => 9,  55 => 7,  49 => 4,  46 => 3,  43 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# if top region is set and have content #}
    {% if content.top %}
        <div class=\"watcher-top\">
            {{ content.top }}
        </div>
    {% endif %}

{# if 'right' and 'left' regions are enabled, template will make bricks-style display #}
    {% if content.left and content.right %}
        <div class=\"watcher-left\">
            {{ content.left }}
        </div>
        <div class=\"watcher-right\">
            {{ content.right }}
        </div>
    {% endif %}

{# if just one of the regions had content (only right or left)
create a new div class \"watcher-middle\"
with just one of the regions #}
    {% if content.left and content.right == false %}
        <div class=\"watcher-middle\">
            {{ content.left }}
        </div>
    {% elseif content.right and content.left == false %}
        <div class=\"watcher-middle\">
            {{ content.right }}
        </div>
    {% endif %}

{# if bottom region set and have content #}
    {% if content.bottom %}
        <div class=\"watcher-bottom\">
            {{ content.bottom }}
        </div>
    {% endif %}", "modules/custom/time_watcher/templates/breaks.html.twig", "/var/www/shop.me/web/modules/custom/time_watcher/templates/breaks.html.twig");
    }
}
