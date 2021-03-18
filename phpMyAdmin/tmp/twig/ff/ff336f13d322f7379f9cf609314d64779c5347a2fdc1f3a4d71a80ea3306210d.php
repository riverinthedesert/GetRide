<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* database/central_columns/main.twig */
class __TwigTemplate_cbadce193af098313d972f053c73649d5def1bc782716f472a129cfa6463d044 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<div id=\"add_col_div\" class=\"topmargin\">
    <a href=\"#\">
        <span>";
        // line 4
        echo (((1 === twig_compare(($context["total_rows"] ?? null), 0))) ? ("+") : ("-"));
        echo "</span>";
        echo _gettext("Add new column");
        // line 5
        echo "    </a>
    <form id=\"add_new\" class=\"new_central_col";
        // line 6
        echo (((0 !== twig_compare(($context["total_rows"] ?? null), 0))) ? (" hide") : (""));
        echo "\"
        method=\"post\" action=\"db_central_columns.php\">
        ";
        // line 8
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
        <input type=\"hidden\" name=\"add_new_column\" value=\"add_new_column\">
        <div class=\"responsivetable\">
            <table>
                <thead>
                    <tr>
                        <th class=\"\"></th>
                        <th class=\"hide\"></th>
                        <th class=\"\" title=\"\" data-column=\"name\">
                            ";
        // line 17
        echo _gettext("Name");
        // line 18
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"type\">
                            ";
        // line 21
        echo _gettext("Type");
        // line 22
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"length\">
                            ";
        // line 25
        echo _gettext("Length/Value");
        // line 26
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"default\">
                            ";
        // line 29
        echo _gettext("Default");
        // line 30
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"collation\">
                            ";
        // line 33
        echo _gettext("Collation");
        // line 34
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"attribute\">
                            ";
        // line 37
        echo _gettext("Attribute");
        // line 38
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"isnull\">
                            ";
        // line 41
        echo _gettext("Null");
        // line 42
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"extra\">
                            ";
        // line 45
        echo _gettext("A_I");
        // line 46
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td name=\"col_name\" class=\"nowrap\">
                            ";
        // line 54
        $this->loadTemplate("columns_definitions/column_name.twig", "database/central_columns/main.twig", 54)->display(twig_to_array(["column_number" => 0, "ci" => 0, "ci_offset" => 0, "column_meta" => [], "cfg_relation" => ["centralcolumnswork" => false], "max_rows" =>         // line 62
($context["max_rows"] ?? null)]));
        // line 64
        echo "                        </td>
                        <td name=\"col_type\" class=\"nowrap\">
                            ";
        // line 66
        $this->loadTemplate("columns_definitions/column_type.twig", "database/central_columns/main.twig", 66)->display(twig_to_array(["column_number" => 0, "ci" => 1, "ci_offset" => 0, "type_upper" => "", "column_meta" => []]));
        // line 73
        echo "                        </td>
                        <td class=\"nowrap\" name=\"col_length\">
                            ";
        // line 75
        $this->loadTemplate("columns_definitions/column_length.twig", "database/central_columns/main.twig", 75)->display(twig_to_array(["column_number" => 0, "ci" => 2, "ci_offset" => 0, "length_values_input_size" => 8, "length_to_display" => ""]));
        // line 82
        echo "                        </td>
                        <td class=\"nowrap\" name=\"col_default\">
                            ";
        // line 84
        $this->loadTemplate("columns_definitions/column_default.twig", "database/central_columns/main.twig", 84)->display(twig_to_array(["column_number" => 0, "ci" => 3, "ci_offset" => 0, "default_value" => "", "column_meta" => [], "char_editing" =>         // line 90
($context["char_editing"] ?? null)]));
        // line 92
        echo "                        </td>
                        <td name=\"collation\" class=\"nowrap\">
                          <select lang=\"en\" dir=\"ltr\" name=\"field_collation[0]\" id=\"field_0_4\">
                            <option value=\"\"></option>
                            ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 97
            echo "                              <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 97), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 97), "html", null, true);
            echo "\">
                                ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 98));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 99
                echo "                                  <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 99), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 99), "html", null, true);
                echo "\">";
                // line 100
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 100), "html", null, true);
                // line 101
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "                              </optgroup>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "                          </select>
                        </td>
                        <td class=\"nowrap\" name=\"col_attribute\">
                            ";
        // line 108
        $this->loadTemplate("columns_definitions/column_attribute.twig", "database/central_columns/main.twig", 108)->display(twig_to_array(["column_number" => 0, "ci" => 5, "ci_offset" => 0, "extracted_columnspec" => [], "column_meta" => [], "submit_attribute" => false, "attribute_types" =>         // line 115
($context["attribute_types"] ?? null)]));
        // line 117
        echo "                        </td>
                        <td class=\"nowrap\" name=\"col_isNull\">
                            ";
        // line 119
        $this->loadTemplate("columns_definitions/column_null.twig", "database/central_columns/main.twig", 119)->display(twig_to_array(["column_number" => 0, "ci" => 6, "ci_offset" => 0, "column_meta" => []]));
        // line 125
        echo "                        </td>
                        <td class=\"nowrap\" name=\"col_extra\">
                            ";
        // line 127
        $this->loadTemplate("columns_definitions/column_extra.twig", "database/central_columns/main.twig", 127)->display(twig_to_array(["column_number" => 0, "ci" => 7, "ci_offset" => 0, "column_meta" => []]));
        // line 133
        echo "                        </td>
                        <td>
                            <input id=\"add_column_save\" class=\"btn btn-primary\" type=\"submit\" value=\"Save\">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
";
        // line 143
        if ((0 >= twig_compare(($context["total_rows"] ?? null), 0))) {
            // line 144
            echo "    <fieldset>
        ";
            // line 145
            echo _gettext("The central list of columns for the current database is empty");
            // line 146
            echo "    </fieldset>
";
        } else {
            // line 148
            echo "    <table style=\"display:inline-block;max-width:49%\" class=\"navigation nospacing nopadding\">
        <tr>
            <td class=\"navigation_separator\"></td>
            ";
            // line 151
            if ((0 <= twig_compare((($context["pos"] ?? null) - ($context["max_rows"] ?? null)), 0))) {
                // line 152
                echo "                <td>
                    <form action=\"db_central_columns.php\" method=\"post\">
                        ";
                // line 154
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"pos\" value=\"";
                // line 155
                echo twig_escape_filter($this->env, (($context["pos"] ?? null) - ($context["max_rows"] ?? null)), "html", null, true);
                echo "\">
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 156
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        <input class=\"btn btn-secondary ajax\" type=\"submit\" name=\"navig\" value=\"&lt\">
                    </form>
                </td>
            ";
            }
            // line 161
            echo "            ";
            if ((1 === twig_compare(($context["tn_nbTotalPage"] ?? null), 1))) {
                // line 162
                echo "                <td>
                    <form action=\"db_central_columns.php\" method=\"post\">
                        ";
                // line 164
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 165
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        ";
                // line 166
                echo ($context["tn_page_selector"] ?? null);
                echo "
                    </form>
                </td>
            ";
            }
            // line 170
            echo "            ";
            if ((-1 === twig_compare((($context["pos"] ?? null) + ($context["max_rows"] ?? null)), ($context["total_rows"] ?? null)))) {
                // line 171
                echo "                <td>
                    <form action=\"db_central_columns.php\" method=\"post\">
                        ";
                // line 173
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"pos\" value=\"";
                // line 174
                echo twig_escape_filter($this->env, (($context["pos"] ?? null) + ($context["max_rows"] ?? null)), "html", null, true);
                echo "\">
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 175
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        <input class=\"btn btn-secondary ajax\" type=\"submit\" name=\"navig\" value=\"&gt\">
                    </form>
                </td>
            ";
            }
            // line 180
            echo "            <td class=\"navigation_separator\"></td>
            <td>
                <span>";
            // line 182
            echo _gettext("Filter rows");
            echo ":</span>
                <input type=\"text\" class=\"filter_rows\" placeholder=\"";
            // line 183
            echo _gettext("Search this table");
            echo "\">
            </td>
            <td class=\"navigation_separator\"></td>
        </tr>
    </table>
";
        }
        // line 190
        echo "<table class=\"central_columns_add_column\" class=\"navigation nospacing nopadding\">
    <tr>
        <td class=\"navigation_separator largescreenonly\"></td>
        <td class=\"central_columns_navigation\">
            ";
        // line 194
        echo PhpMyAdmin\Util::getIcon("centralColumns_add", _gettext("Add column"));
        echo "
            <form id=\"add_column\" action=\"db_central_columns.php\" method=\"post\">
                ";
        // line 196
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
                <input type=\"hidden\" name=\"add_column\" value=\"add\">
                <input type=\"hidden\" name=\"pos\" value=\"";
        // line 198
        echo twig_escape_filter($this->env, ($context["pos"] ?? null), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"total_rows\" value=\"";
        // line 199
        echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
        echo "\">
                ";
        // line 201
        echo "                <select name=\"table-select\" id=\"table-select\">
                    <option value=\"\" disabled=\"disabled\" selected=\"selected\">
                        ";
        // line 203
        echo _gettext("Select a table");
        // line 204
        echo "                    </option>
                    ";
        // line 205
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 206
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["table"]);
            echo "\">";
            echo twig_escape_filter($this->env, $context["table"]);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 208
        echo "                </select>
                <select name=\"column-select\" id=\"column-select\">
                    <option value=\"\" selected=\"selected\">";
        // line 210
        echo _gettext("Select a column.");
        echo "</option>
                </select>
                <input class=\"btn btn-primary\" type=\"submit\" value=\"";
        // line 212
        echo _gettext("Add");
        echo "\">
            </form>
        </td>
        <td class=\"navigation_separator largescreenonly\"></td>
    </tr>
</table>
";
        // line 218
        if ((1 === twig_compare(($context["total_rows"] ?? null), 0))) {
            // line 219
            echo "    <form method=\"post\" id=\"del_form\" action=\"db_central_columns.php\">
        ";
            // line 220
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
            echo "
        <input id=\"del_col_name\" type=\"hidden\" name=\"col_name\" value=\"\">
        <input type=\"hidden\" name=\"pos\" value=\"";
            // line 222
            echo twig_escape_filter($this->env, ($context["pos"] ?? null), "html", null, true);
            echo "\">
        <input type=\"hidden\" name=\"delete_save\" value=\"delete\">
    </form>
    <div id=\"tableslistcontainer\">
        <form name=\"tableslistcontainer\">
            <table id=\"table_columns\" class=\"tablesorter\" class=\"data\">
                ";
            // line 228
            $context["class"] = "column_heading";
            // line 229
            echo "                ";
            $context["title"] = _gettext("Click to sort.");
            // line 230
            echo "                <thead>
                    <tr>
                        <th class=\"";
            // line 232
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\"></th>
                        <th class=\"hide\"></th>
                        <th class=\"column_action\" colspan=\"2\">";
            // line 234
            echo _gettext("Action");
            echo "</th>
                        <th class=\"";
            // line 235
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"name\">
                            ";
            // line 236
            echo _gettext("Name");
            // line 237
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 239
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"type\">
                            ";
            // line 240
            echo _gettext("Type");
            // line 241
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 243
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"length\">
                            ";
            // line 244
            echo _gettext("Length/Value");
            // line 245
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 247
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"default\">
                            ";
            // line 248
            echo _gettext("Default");
            // line 249
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 251
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"collation\">
                            ";
            // line 252
            echo _gettext("Collation");
            // line 253
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 255
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"attribute\">
                            ";
            // line 256
            echo _gettext("Attribute");
            // line 257
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 259
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"isnull\">
                            ";
            // line 260
            echo _gettext("Null");
            // line 261
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 263
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"extra\">
                            ";
            // line 264
            echo _gettext("A_I");
            // line 265
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 270
            $context["row_num"] = 0;
            // line 271
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 272
                echo "                        ";
                // line 273
                echo "                        <tr data-rownum=\"";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, ("f_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\">
                            ";
                // line 274
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                            <input type=\"hidden\" name=\"edit_save\" value=\"save\">
                            <td class=\"nowrap\">
                                <input type=\"checkbox\" class=\"checkall\" name=\"selected_fld[]\"
                                value=\"";
                // line 278
                echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["row"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["col_name"] ?? null) : null), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, ("checkbox_row_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\">
                            </td>
                            <td id=\"";
                // line 280
                echo twig_escape_filter($this->env, ("edit_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\" class=\"edit center\">
                                <a href=\"#\"> ";
                // line 281
                echo PhpMyAdmin\Util::getIcon("b_edit", _gettext("Edit"));
                echo "</a>
                            </td>
                            <td class=\"del_row\" data-rownum = \"";
                // line 283
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\">
                                <a hrf=\"#\">";
                // line 284
                echo PhpMyAdmin\Util::getIcon("b_drop", _gettext("Delete"));
                echo "</a>
                                <input type=\"submit\" data-rownum = \"";
                // line 285
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" class=\"btn btn-secondary edit_cancel_form\" value=\"Cancel\">
                            </td>
                            <td id=\"";
                // line 287
                echo twig_escape_filter($this->env, ("save_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\" class=\"hide\">
                                <input type=\"submit\" data-rownum=\"";
                // line 288
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" class=\"btn btn-primary edit_save_form\" value=\"Save\">
                            </td>
                            <td name=\"col_name\" class=\"nowrap\">
                                <span>";
                // line 291
                echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["row"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["col_name"] ?? null) : null), "html", null, true);
                echo "</span>
                                <input name=\"orig_col_name\" type=\"hidden\" value=\"";
                // line 292
                echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["row"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["col_name"] ?? null) : null), "html", null, true);
                echo "\">
                                ";
                // line 293
                $this->loadTemplate("columns_definitions/column_name.twig", "database/central_columns/main.twig", 293)->display(twig_to_array(["column_number" =>                 // line 294
($context["row_num"] ?? null), "ci" => 0, "ci_offset" => 0, "column_meta" => ["Field" => (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 =                 // line 298
$context["row"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["col_name"] ?? null) : null)], "cfg_relation" => ["centralcolumnswork" => false], "max_rows" =>                 // line 303
($context["max_rows"] ?? null)]));
                // line 305
                echo "                            </td>
                            <td name = \"col_type\" class=\"nowrap\">
                                <span>";
                // line 307
                echo twig_escape_filter($this->env, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["row"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["col_type"] ?? null) : null), "html", null, true);
                echo "</span>
                                ";
                // line 308
                $this->loadTemplate("columns_definitions/column_type.twig", "database/central_columns/main.twig", 308)->display(twig_to_array(["column_number" =>                 // line 309
($context["row_num"] ?? null), "ci" => 1, "ci_offset" => 0, "type_upper" => (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 =                 // line 312
($context["types_upper"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[($context["row_num"] ?? null)] ?? null) : null), "column_meta" => []]));
                // line 315
                echo "                            </td>
                            <td class=\"nowrap\" name=\"col_length\">
                                <span>";
                // line 317
                (((($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["row"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["col_length"] ?? null) : null)) ? (print (twig_escape_filter($this->env, (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["row"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["col_length"] ?? null) : null), "html", null, true))) : (print ("")));
                echo "</span>
                                ";
                // line 318
                $this->loadTemplate("columns_definitions/column_length.twig", "database/central_columns/main.twig", 318)->display(twig_to_array(["column_number" =>                 // line 319
($context["row_num"] ?? null), "ci" => 2, "ci_offset" => 0, "length_values_input_size" => 8, "length_to_display" => (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 =                 // line 323
$context["row"]) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["col_length"] ?? null) : null)]));
                // line 325
                echo "                            </td>
                            <td class=\"nowrap\" name=\"col_default\">
                                ";
                // line 327
                if (twig_get_attribute($this->env, $this->source, $context["row"], "col_default", [], "array", true, true, false, 327)) {
                    // line 328
                    echo "                                    <span>";
                    echo twig_escape_filter($this->env, (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = $context["row"]) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386["col_default"] ?? null) : null), "html", null, true);
                    echo "</span>
                                ";
                } else {
                    // line 330
                    echo "                                    <span>None</span>
                                ";
                }
                // line 332
                echo "                                ";
                $this->loadTemplate("columns_definitions/column_default.twig", "database/central_columns/main.twig", 332)->display(twig_to_array(["column_number" =>                 // line 333
($context["row_num"] ?? null), "ci" => 3, "ci_offset" => 0, "default_value" => (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 =                 // line 336
($context["default_values"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[($context["row_num"] ?? null)] ?? null) : null), "column_meta" => (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae =                 // line 337
($context["rows_meta"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[($context["row_num"] ?? null)] ?? null) : null), "char_editing" =>                 // line 338
($context["char_editing"] ?? null)]));
                // line 340
                echo "                            </td>
                            <td name=\"collation\" class=\"nowrap\">
                                <span>";
                // line 342
                echo twig_escape_filter($this->env, (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = $context["row"]) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["col_collation"] ?? null) : null), "html", null, true);
                echo "</span>
                                <select lang=\"en\" dir=\"ltr\" name=\"field_collation[";
                // line 343
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_4\">
                                  <option value=\"\"></option>
                                  ";
                // line 345
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                    // line 346
                    echo "                                    <optgroup label=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 346), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 346), "html", null, true);
                    echo "\">
                                      ";
                    // line 347
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 347));
                    foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                        // line 348
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 348), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 348), "html", null, true);
                        echo "\"";
                        // line 349
                        echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 349), (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = $context["row"]) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40["col_collation"] ?? null) : null)))) ? (" selected") : (""));
                        echo ">";
                        // line 350
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 350), "html", null, true);
                        // line 351
                        echo "</option>
                                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 353
                    echo "                                    </optgroup>
                                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 355
                echo "                                </select>
                            </td>
                            <td class=\"nowrap\" name=\"col_attribute\">
                                <span>";
                // line 358
                (((($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = $context["row"]) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f["col_attribute"] ?? null) : null)) ? (print (twig_escape_filter($this->env, (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = $context["row"]) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760["col_attribute"] ?? null) : null), "html", null, true))) : (print ("")));
                echo "</span>
                                ";
                // line 359
                $this->loadTemplate("columns_definitions/column_attribute.twig", "database/central_columns/main.twig", 359)->display(twig_to_array(["column_number" =>                 // line 360
($context["row_num"] ?? null), "ci" => 5, "ci_offset" => 0, "extracted_columnspec" => [], "column_meta" => (($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce =                 // line 364
$context["row"]) && is_array($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce) || $__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce instanceof ArrayAccess ? ($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce["col_attribute"] ?? null) : null), "submit_attribute" => false, "attribute_types" =>                 // line 366
($context["attribute_types"] ?? null)]));
                // line 368
                echo "                            </td>
                            <td class=\"nowrap\" name=\"col_isNull\">
                                <span>";
                // line 370
                echo twig_escape_filter($this->env, (((($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b = $context["row"]) && is_array($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b) || $__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b instanceof ArrayAccess ? ($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b["col_isNull"] ?? null) : null)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
                echo "</span>
                                ";
                // line 371
                $this->loadTemplate("columns_definitions/column_null.twig", "database/central_columns/main.twig", 371)->display(twig_to_array(["column_number" =>                 // line 372
($context["row_num"] ?? null), "ci" => 6, "ci_offset" => 0, "column_meta" => ["Null" => (($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c =                 // line 376
$context["row"]) && is_array($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c) || $__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c instanceof ArrayAccess ? ($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c["col_isNull"] ?? null) : null)]]));
                // line 379
                echo "                            </td>
                            <td class=\"nowrap\" name=\"col_extra\">
                                <span>";
                // line 381
                echo twig_escape_filter($this->env, (($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 = $context["row"]) && is_array($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972) || $__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 instanceof ArrayAccess ? ($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972["col_extra"] ?? null) : null), "html", null, true);
                echo "</span>
                                ";
                // line 382
                $this->loadTemplate("columns_definitions/column_extra.twig", "database/central_columns/main.twig", 382)->display(twig_to_array(["column_number" =>                 // line 383
($context["row_num"] ?? null), "ci" => 7, "ci_offset" => 0, "column_meta" => ["Extra" => (($__internal_df39c71428eaf37baa1ea2198679e0077f3699bdd31bb5ba10d084710b9da216 =                 // line 387
$context["row"]) && is_array($__internal_df39c71428eaf37baa1ea2198679e0077f3699bdd31bb5ba10d084710b9da216) || $__internal_df39c71428eaf37baa1ea2198679e0077f3699bdd31bb5ba10d084710b9da216 instanceof ArrayAccess ? ($__internal_df39c71428eaf37baa1ea2198679e0077f3699bdd31bb5ba10d084710b9da216["col_extra"] ?? null) : null)]]));
                // line 390
                echo "                            </td>
                        </tr>
                        ";
                // line 392
                $context["row_num"] = (($context["row_num"] ?? null) + 1);
                // line 393
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 394
            echo "                </tbody>
            </table>
            ";
            // line 397
            echo "            ";
            $this->loadTemplate("select_all.twig", "database/central_columns/main.twig", 397)->display(twig_to_array(["pma_theme_image" =>             // line 398
($context["pmaThemeImage"] ?? null), "text_dir" =>             // line 399
($context["text_dir"] ?? null), "form_name" => "tableslistcontainer"]));
            // line 402
            echo "            ";
            echo PhpMyAdmin\Util::getButtonOrImage("edit_central_columns", "mult_submit change_central_columns", _gettext("Edit"), "b_edit", "edit central columns");
            // line 408
            echo "
            ";
            // line 409
            echo PhpMyAdmin\Util::getButtonOrImage("delete_central_columns", "mult_submit", _gettext("Delete"), "b_drop", "remove_from_central_columns");
            // line 415
            echo "
        </form>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "database/central_columns/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  769 => 415,  767 => 409,  764 => 408,  761 => 402,  759 => 399,  758 => 398,  756 => 397,  752 => 394,  746 => 393,  744 => 392,  740 => 390,  738 => 387,  737 => 383,  736 => 382,  732 => 381,  728 => 379,  726 => 376,  725 => 372,  724 => 371,  720 => 370,  716 => 368,  714 => 366,  713 => 364,  712 => 360,  711 => 359,  707 => 358,  702 => 355,  695 => 353,  688 => 351,  686 => 350,  683 => 349,  677 => 348,  673 => 347,  666 => 346,  662 => 345,  655 => 343,  651 => 342,  647 => 340,  645 => 338,  644 => 337,  643 => 336,  642 => 333,  640 => 332,  636 => 330,  630 => 328,  628 => 327,  624 => 325,  622 => 323,  621 => 319,  620 => 318,  616 => 317,  612 => 315,  610 => 312,  609 => 309,  608 => 308,  604 => 307,  600 => 305,  598 => 303,  597 => 298,  596 => 294,  595 => 293,  591 => 292,  587 => 291,  581 => 288,  577 => 287,  572 => 285,  568 => 284,  564 => 283,  559 => 281,  555 => 280,  548 => 278,  541 => 274,  534 => 273,  532 => 272,  527 => 271,  525 => 270,  518 => 265,  516 => 264,  510 => 263,  506 => 261,  504 => 260,  498 => 259,  494 => 257,  492 => 256,  486 => 255,  482 => 253,  480 => 252,  474 => 251,  470 => 249,  468 => 248,  462 => 247,  458 => 245,  456 => 244,  450 => 243,  446 => 241,  444 => 240,  438 => 239,  434 => 237,  432 => 236,  426 => 235,  422 => 234,  417 => 232,  413 => 230,  410 => 229,  408 => 228,  399 => 222,  394 => 220,  391 => 219,  389 => 218,  380 => 212,  375 => 210,  371 => 208,  360 => 206,  356 => 205,  353 => 204,  351 => 203,  347 => 201,  343 => 199,  339 => 198,  334 => 196,  329 => 194,  323 => 190,  314 => 183,  310 => 182,  306 => 180,  298 => 175,  294 => 174,  290 => 173,  286 => 171,  283 => 170,  276 => 166,  272 => 165,  268 => 164,  264 => 162,  261 => 161,  253 => 156,  249 => 155,  245 => 154,  241 => 152,  239 => 151,  234 => 148,  230 => 146,  228 => 145,  225 => 144,  223 => 143,  211 => 133,  209 => 127,  205 => 125,  203 => 119,  199 => 117,  197 => 115,  196 => 108,  191 => 105,  184 => 103,  177 => 101,  175 => 100,  169 => 99,  165 => 98,  158 => 97,  154 => 96,  148 => 92,  146 => 90,  145 => 84,  141 => 82,  139 => 75,  135 => 73,  133 => 66,  129 => 64,  127 => 62,  126 => 54,  116 => 46,  114 => 45,  109 => 42,  107 => 41,  102 => 38,  100 => 37,  95 => 34,  93 => 33,  88 => 30,  86 => 29,  81 => 26,  79 => 25,  74 => 22,  72 => 21,  67 => 18,  65 => 17,  53 => 8,  48 => 6,  45 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/central_columns/main.twig", "D:\\studypro\\XAMP\\htdocs\\web\\GerRideProjet\\GetRide\\phpMyAdmin\\templates\\database\\central_columns\\main.twig");
    }
}
