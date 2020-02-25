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

/* settings/advanced.html */
class __TwigTemplate_4e3647fb5e36abadf15ce01a99ccb7fe96e1be36039aa0eef8d77e75a1dd9f11 extends \MailPoetVendor\Twig\Template
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
        echo "<table class=\"form-table\">
  <tbody>
    <!-- bounce email -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[bounce_email]\">
          ";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Bounce email address");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your bounced emails will be sent to this address.");
        echo "
          <a href=\"https://kb.mailpoet.com/article/180-how-bounce-management-works-in-mailpoet-3\"
            data-beacon-article=\"58a5a7502c7d3a576d353c78\"
            target=\"_blank\"
          >";
        // line 14
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <input type=\"text\"
            id=\"settings[bounce_email]\"
            name=\"bounce[address]\"
            data-automation-id=\"bounce-address-field\"
            value=\"";
        // line 23
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "bounce", []), "address", []), "html", null, true);
        echo "\"
            placeholder=\"bounce@mydomain.com\"
          />
        </p>
      </td>
    </tr>
    <!-- task scheduler -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 33
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Newsletter task scheduler (cron)");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 36
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select what will activate your newsletter queue.");
        echo "
          <a href=\"https://kb.mailpoet.com/article/129-what-is-the-newsletter-task-scheduler\"
            data-beacon-article=\"57ce0a7a903360649f6e5703\"
            target=\"_blank\"
          >";
        // line 40
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 49
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "wordpress", []), "html", null, true);
        echo "\"
              data-automation-id=\"wordress_cron_radio\"
              ";
        // line 51
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "wordpress", []))) {
            // line 52
            echo "              checked=\"checked\"
              ";
        }
        // line 54
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Visitors to your website (recommended)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 62
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "mailpoet", []), "html", null, true);
        echo "\"
              data-automation-id=\"mailpoet_cron_radio\"
              ";
        // line 64
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "mailpoet", []))) {
            // line 65
            echo "                checked=\"checked\"
                ";
        }
        // line 67
        echo "              />";
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet's own script. Doesn't work with [link]these hosts[/link]."), "https://kb.mailpoet.com/article/131-hosts-which-mailpoet-task-scheduler-wont-work", ["target" => "_blank", "data-beacon-article" => "57ce0b05c6979108399a0456"]);
        // line 70
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 78
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "linux_cron", []), "html", null, true);
        echo "\"
              data-automation-id=\"linux_cron_radio\"
            ";
        // line 80
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "linux_cron", []))) {
            // line 81
            echo "            checked=\"checked\"
            ";
        }
        // line 83
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Server side cron (Linux cron)");
        // line 84
        echo "
          </label>
        </p>
        <div id=\"settings_linux_cron\">
          <p>
            ";
        // line 89
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("To use this option please add this command to your crontab:");
        echo "<br>
            <input
               value=\"php ";
        // line 91
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["linux_cron_path"] ?? null), "html", null, true);
        echo "/mailpoet-cron.php ";
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["ABSPATH"] ?? null), "html", null, true);
        echo "\"
               class=\"large-text\"
               readonly
            />
          <p>
            ";
        // line 96
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("With the frequency of running it every minute:");
        echo "<br>
            <input
               value=\"*/1 * * * *\"
               class=\"large-text\"
               readonly
            />
        </div>
      </td>
    </tr>
    <!-- roles and capabilities -->
    <tr>
      <th scope=\"row\">
        ";
        // line 108
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Roles and capabilities");
        echo "
        <p class=\"description\">
          ";
        // line 110
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage which WordPress roles access which features of MailPoet.");
        echo "
        </p>
      </th>
      <td>
        ";
        // line 114
        if (($context["members_plugin_active"] ?? null)) {
            // line 115
            echo "        <p>
          <a href=\"";
            // line 116
            echo admin_url("users.php?page=roles");
            echo "\">";
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage using the Members plugin");
            echo "</a>
        </p>
        ";
        } else {
            // line 119
            echo "          ";
            echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("Install the plugin [link]Members[/link] (free) to manage permissions."), "https://wordpress.org/plugins/members/", ["target" => "_blank"]);
            // line 122
            echo "
        ";
        }
        // line 124
        echo "      </td>
    </tr>
    <!-- link tracking -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 130
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Open and click tracking");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 133
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enable or disable open and click tracking.");
        echo "
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"tracking[enabled]\"
              data-automation-id=\"tracking-enabled-radio\"
              value=\"1\"
              ";
        // line 144
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            // line 145
            echo "              checked=\"checked\"
              ";
        }
        // line 147
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              name=\"tracking[enabled]\"
              data-automation-id=\"tracking-disabled-radio\"
              value=\"\"
              ";
        // line 156
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            // line 157
            echo "              checked=\"checked\"
              ";
        }
        // line 159
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- inactive subscribers -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 168
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Stop sending to inactive subscribers");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 171
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Gmail, Yahoo and other email providers will treat your emails like spam if your subscribers don't open your emails in the long run. This option will mark your subscribers as Inactive and MailPoet will stop sending to them.");
        echo "
          <a href=\"https://kb.mailpoet.com/article/264-inactive-subscribers\"
            data-beacon-article=\"5cbf19622c7d3a026fd3efe1\"
            target=\"_blank\"
          >";
        // line 175
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td
        class=\"mailpoet_inactive_subscribers_disabled";
        // line 179
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            echo " mailpoet_hidden";
        }
        echo "\"
        data-automation-id=\"inactive-subscribers-disabled\"
      >
        <p><i>";
        // line 182
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This option is disabled because tracking is disabled.");
        echo "</i></p>
      </td>
      <td
        class=\"mailpoet_inactive_subscribers_enabled";
        // line 185
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            echo " mailpoet_hidden";
        }
        echo "\"
        data-automation-id=\"inactive-subscribers-enabled\"
      >
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"\"
              data-automation-id=\"inactive-subscribers-option-never\"
              ";
        // line 195
        if ( !$this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", [])) {
            echo "checked=\"checked\"";
        }
        // line 196
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Never");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"90\"
              ";
        // line 205
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 90)) {
            echo "checked=\"checked\"";
        }
        // line 206
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 3 months (recommended if you send once a day)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"180\"
              data-automation-id=\"inactive-subscribers-default\"
              ";
        // line 216
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 180)) {
            echo "checked=\"checked\"";
        }
        // line 217
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 6 months (default, recommended if you send at least once a month)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"365\"
              ";
        // line 226
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 365)) {
            echo "checked=\"checked\"";
        }
        // line 227
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 12 months");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- share anonymous data? -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 236
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Share anonymous data");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 239
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Share anonymous data and help us improve the plugin. We appreciate your help!");
        echo "
          <a
            href=\"https://kb.mailpoet.com/article/130-sharing-your-data-with-us\"
            data-beacon-article=\"57ce0aaac6979108399a0454\"
            target=\"_blank\"
          >";
        // line 244
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"analytics[enabled]\"
              data-automation-id=\"analytics-yes\"
              value=\"1\"
              ";
        // line 255
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "analytics", []), "enabled", [])) {
            // line 256
            echo "                checked=\"checked\"
              ";
        }
        // line 258
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              name=\"analytics[enabled]\"
              data-automation-id=\"analytics-no\"
              value=\"\"
              ";
        // line 267
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "analytics", []), "enabled", [])) {
            // line 268
            echo "                checked=\"checked\"
              ";
        }
        // line 270
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- captcha settings -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 279
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Protect your forms against spam signups");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 282
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Built-in captcha protects your subscription forms after a second signup attempt by a bot. Alternatively, use reCAPTCHA by Google.");
        echo "
          <a
            href=\"https://www.google.com/recaptcha/admin\"
            target=\"_blank\"
          >";
        // line 286
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign up for an API key pair here.");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"captcha[type]\"
              value=\"built-in\"
              ";
        // line 296
        if ( !($context["built_in_captcha_supported"] ?? null)) {
            // line 297
            echo "                disabled=\"disabled\"
              ";
        }
        // line 299
        echo "              ";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captcha", []), "type", []) == "built-in")) {
            // line 300
            echo "                checked=\"checked\"
              ";
        }
        // line 302
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Built-in captcha (default)");
        echo "
              ";
        // line 303
        if ( !($context["built_in_captcha_supported"] ?? null)) {
            // line 304
            echo "                ";
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("(disabled because GD or FreeType extension is missing)");
            echo "
              ";
        }
        // line 306
        echo "          </label>
          <input type=\"hidden\" name=\"subscription[pages][captcha]\" value=\"";
        // line 307
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "subscription", []), "pages", []), "captcha", []), "html", null, true);
        echo "\" />
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"captcha[type]\"
              value=\"recaptcha\"
              ";
        // line 315
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captcha", []), "type", []) == "recaptcha")) {
            // line 316
            echo "                checked=\"checked\"
              ";
        }
        // line 318
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Google reCAPTCHA");
        echo "
          </label>
        </p>
        <div id=\"settings_recaptcha_tokens\">
          <p>
            <input type=\"text\"
              name=\"captcha[recaptcha_site_token]\"
              value=\"";
        // line 325
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captcha", []), "recaptcha_site_token", []), "html", null, true);
        echo "\"
              placeholder=\"";
        // line 326
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your reCAPTCHA Site Key");
        echo "\"
              class=\"regular-text\"
            />
          </p>
          <p>
            <input type=\"text\"
              name=\"captcha[recaptcha_secret_token]\"
              value=\"";
        // line 333
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captcha", []), "recaptcha_secret_token", []), "html", null, true);
        echo "\"
              placeholder=\"";
        // line 334
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your reCAPTCHA Secret Key");
        echo "\"
              class=\"regular-text\"
            />
          </p>
          <div id=\"settings_recaptcha_tokens_error\" class=\"mailpoet_error_item mailpoet_error\">
            ";
        // line 339
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please fill the reCAPTCHA keys.");
        echo "
          </div>
        </div>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"captcha[type]\"
              value=\"\"
              ";
        // line 348
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captcha", []), "type", [])) {
            // line 349
            echo "                checked=\"checked\"
              ";
        }
        // line 351
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Disable");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- reinstall -->
    <tr>
      <th scope=\"row\">
        <label>";
        // line 359
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reinstall from scratch");
        echo "</label>
        <p class=\"description\">
          ";
        // line 361
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Want to start from the beginning? This will completely delete MailPoet and reinstall it from scratch. Remember: you will lose all of your data!");
        echo "
        </p>
      </th>
      <td>
        <p>
          <a
            id=\"mailpoet_reinstall\"
            class=\"button\"
            href=\"javascript:;\">";
        // line 369
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reinstall now...");
        echo "</a>
        </p>
      </td>
    </tr>
    <!-- logging -->
    <tr>
      <th scope=\"row\">
        <label>";
        // line 376
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Logging");
        echo "</label>
        <p class=\"description\">
          ";
        // line 378
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enables logging for diagnostics of plugin behavior.");
        echo "
      <td>
        <select
          name=\"logging\"
          data-automation-id=\"logging-select-box\"
        >
          <option
            value=\"everything\"
            data-automation-id=\"log-everything\"
            ";
        // line 387
        if (($this->getAttribute(($context["settings"] ?? null), "logging", []) == "everything")) {
            // line 388
            echo "              selected
            ";
        }
        // line 390
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Everything", "In settings: \"Logging: Everything\"");
        echo "
          <option
            value=\"errors\"
            data-automation-id=\"log-errors\"
            ";
        // line 394
        if ((($this->getAttribute(($context["settings"] ?? null), "logging", []) != "nothing") && ($this->getAttribute(($context["settings"] ?? null), "logging", []) != "everything"))) {
            // line 395
            echo "              selected
            ";
        }
        // line 397
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Errors only", "In settings: \"Logging: Errors only\"");
        echo "
          <option
            value=\"nothing\"
            data-automation-id=\"log-nothing\"
            ";
        // line 401
        if (($this->getAttribute(($context["settings"] ?? null), "logging", []) == "nothing")) {
            // line 402
            echo "              selected
            ";
        }
        // line 404
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Nothing", "In settings: \"Logging: Nothing\"");
        echo "
        </select>
  </tbody>
</table>

<script type=\"text/javascript\">
  jQuery(function(\$) {
    \$(function() {
      \$('input[name=\"tracking[enabled]\"]').on('change', function() {
        var trackingEnabled = \$(this).val();
        if (trackingEnabled) {
          \$('.mailpoet_inactive_subscribers_enabled').removeClass('mailpoet_hidden');
          \$('.mailpoet_inactive_subscribers_disabled').addClass('mailpoet_hidden');
        } else {
          \$('.mailpoet_inactive_subscribers_enabled').addClass('mailpoet_hidden');
          \$('.mailpoet_inactive_subscribers_disabled').removeClass('mailpoet_hidden');
        }
      });
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "settings/advanced.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  697 => 404,  693 => 402,  691 => 401,  683 => 397,  679 => 395,  677 => 394,  669 => 390,  665 => 388,  663 => 387,  651 => 378,  646 => 376,  636 => 369,  625 => 361,  620 => 359,  608 => 351,  604 => 349,  602 => 348,  590 => 339,  582 => 334,  578 => 333,  568 => 326,  564 => 325,  553 => 318,  549 => 316,  547 => 315,  536 => 307,  533 => 306,  527 => 304,  525 => 303,  520 => 302,  516 => 300,  513 => 299,  509 => 297,  507 => 296,  494 => 286,  487 => 282,  481 => 279,  468 => 270,  464 => 268,  462 => 267,  449 => 258,  445 => 256,  443 => 255,  429 => 244,  421 => 239,  415 => 236,  402 => 227,  398 => 226,  385 => 217,  381 => 216,  367 => 206,  363 => 205,  350 => 196,  346 => 195,  331 => 185,  325 => 182,  317 => 179,  310 => 175,  303 => 171,  297 => 168,  284 => 159,  280 => 157,  278 => 156,  265 => 147,  261 => 145,  259 => 144,  245 => 133,  239 => 130,  231 => 124,  227 => 122,  224 => 119,  216 => 116,  213 => 115,  211 => 114,  204 => 110,  199 => 108,  184 => 96,  174 => 91,  169 => 89,  162 => 84,  159 => 83,  155 => 81,  153 => 80,  148 => 78,  138 => 70,  135 => 67,  131 => 65,  129 => 64,  124 => 62,  112 => 54,  108 => 52,  106 => 51,  101 => 49,  89 => 40,  82 => 36,  76 => 33,  63 => 23,  51 => 14,  44 => 10,  38 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings/advanced.html", "/mnt/vhosts/mum/public_html/wp-content/plugins/mailpoet/views/settings/advanced.html");
    }
}
