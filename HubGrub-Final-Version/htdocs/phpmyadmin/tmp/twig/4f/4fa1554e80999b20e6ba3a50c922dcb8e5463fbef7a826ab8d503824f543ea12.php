<?php

/* privileges/privileges_summary_row.twig */
class __TwigTemplate_d0c6857a246303338b653c4769073e9e2264cfd3e74654c583a88684addb3020 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<tr>
    <td>";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</td>
    <td><code>";
        // line 3
        echo ($context["privileges"] ?? null);
        echo "</code></td>
    <td>";
        // line 4
        echo twig_escape_filter($this->env, ((($context["grant"] ?? null)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
        echo "</td>

    ";
        // line 6
        if ((($context["type"] ?? null) == "database")) {
            // line 7
            echo "        <td>";
            echo twig_escape_filter($this->env, ((($context["table_privs"] ?? null)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
            echo "</td>
    ";
        } elseif ((        // line 8
($context["type"] ?? null) == "table")) {
            // line 9
            echo "        <td>";
            echo twig_escape_filter($this->env, ((($context["column_privs"] ?? null)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
            echo "</td>
    ";
        }
        // line 11
        echo "
    <td>";
        // line 12
        echo ($context["edit_link"] ?? null);
        echo "</td>
    <td>";
        // line 13
        echo ($context["revoke_link"] ?? null);
        echo "</td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "privileges/privileges_summary_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 13,  53 => 12,  50 => 11,  44 => 9,  42 => 8,  37 => 7,  35 => 6,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "privileges/privileges_summary_row.twig", "C:\\Apache24\\htdocs\\phpmyadmin\\templates\\privileges\\privileges_summary_row.twig");
    }
}
