<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* form/templatesLegacy/settings/values.hbs */
class __TwigTemplate_1490419e2b8379da985ee4757e24cfe32148f1c0b127481b63e1c3d1f02f6a76 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"mailpoet_multiple_values\">
  <ul></ul>
  {{#ifCond type 'in' 'radio,select'}}
    <a href=\"javascript:;\" class=\"add\"><span></span>";
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add item");
        echo "</a>
  {{/ifCond}}
</div>
<script type=\"text/javascript\">
jQuery(function(\$) {
  {{#if params.values}}
    var field_values = {{{ json_encode params.values }}};
  {{else}}
    var field_values = [{ value: '' }];
  {{/if}}
  var field_type = \"{{ type }}\";
  var template = Handlebars.compile(\$('#field_settings_values_item').html());

  // set default value for checkbox type if there is no value defined
  if(field_type === 'checkbox' && field_values.length !== 1) {
    if(field_values.length > 1) {
      field_values = [field_values[0]];
    } else {
      // push a default empty value
      field_values = [{}];
    }
  }
  \$(function() {
    // render all values by creating inputs
    for(var i = 0, count = field_values.length; i < count; i++) {
      createInput(template, field_values[i]);
    }
    // set inputs name
    setInputNames();

    // add value
    \$('.mailpoet_multiple_values .add').on('click', function() {
      createInput(template);
      setInputNames();
    });
    // remove value
    \$(document).on('click', '.mailpoet_multiple_values li .remove', function() {
      \$(this).parent('li').remove();
      setInputNames();
    });
    // create an input
    function createInput(template, values) {
      var data = values || {};
      // set field type
      data.type = field_type;
      // add input to selection
      \$('.mailpoet_multiple_values ul').append(template(data));
    }
    // set input names (since their index is based on their position)
    function setInputNames() {
      \$('.mailpoet_multiple_values li').each(function(index, item) {
        \$(item).find('.is_checked').attr('name', 'params[values]['+index+'][is_checked]');
        \$(item).find('.value').attr('name', 'params[values]['+index+'][value]');
      });

      // hide remove button if only one item remains
      if (\$('.mailpoet_multiple_values li').length > 1) {
        \$('.mailpoet_multiple_values .remove').show();
      } else {
        \$('.mailpoet_multiple_values .remove').hide();
      }
    }
    {{#ifCond type '!=' 'checkbox'}}
    \$('.mailpoet_multiple_values').on('click', '.is_checked', function() {
      // get click checkbox's state
      var is_checked = \$(this).is(':checked');
      // uncheck all checkboxes
      \$('.mailpoet_multiple_values .is_checked').removeProp('checked');
      // toggle clicked checkbox
      if(is_checked === false) {
        \$(this).removeProp('checked');
      } else {
        \$(this).prop('checked', 'checked');
      }
    });
    {{/ifCond}}
  });
});
<{{!}}/script>";
    }

    public function getTemplateName()
    {
        return "form/templatesLegacy/settings/values.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templatesLegacy/settings/values.hbs", "/mnt/vhosts/mum/public_html/wp-content/plugins/mailpoet/views/form/templatesLegacy/settings/values.hbs");
    }
}
