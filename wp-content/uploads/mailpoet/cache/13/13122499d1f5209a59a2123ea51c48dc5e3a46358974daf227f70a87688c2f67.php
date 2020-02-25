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

/* premium.html */
class __TwigTemplate_6bb363c3071bb38e1b17149e1e0a94d68ac7d1e662fc445c8d367bb3a202d33f extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "premium.html", 1);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "<div class=\"wrap mailpoet-about-wrap mailpoet-premium-page\">
  <h1>";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We take care of your email, <br> so your email can take care of you", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
  <div class=\"mailpoet-premium-page-intro\">
    <img
      src=\"";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("premium/blue_jay_marbles.png");
        echo "\"
      alt=\"";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Image blue bird");
        echo "\"
      width=400
      height=444
    >
    <div>
      <p>
        ";
        // line 15
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Ready to take your email to the next level?", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        ";
        // line 16
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You’ve built your email list with our free plugin — now grow your business with Premium and Sending features.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
      </p>
      <div class=\"mailpoet-premium-page-intro-link-wrap\">
        <a
          target=\"_blank\"
          href=\"";
        // line 21
        echo $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId((("https://account.mailpoet.com?s=" . ($context["subscriber_count"] ?? null)) . "&utm_source=plugin&utm_medium=premium&utm_campaign=purchase"));
        echo "\"
          class=\"button button-primary mailpoet-button-bigger\"
        >
          ";
        // line 24
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Upgrade", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </a>
      </div>

    </div>
  </div>
  <hr>

  ";
        // line 32
        if ((($context["subscriber_count"] ?? null) < 1000)) {
            // line 33
            echo "  <div class=\"mailpoet-premium-page-text\">
    <h1>";
            // line 34
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("MailPoet Premium is actually yours for free", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
            echo "</h1>
    <h3>
      ";
            // line 36
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Website owners with less than 1,000 subscribers, like you, get the Premium add-on and let MailPoet deliver your emails for free.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
            echo "
    </h3>
    <a
      target=\"_blank\"
      href=\"";
            // line 40
            echo $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId((("https://account.mailpoet.com?s=" . ($context["subscriber_count"] ?? null)) . "&utm_source=plugin&utm_medium=premium&utm_campaign=purchase"));
            echo "\"
      class=\"button button-primary mailpoet-button-bigger\"
    >
      ";
            // line 43
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Sign up for free", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
            echo "
    </a>
  </div>
  <hr>
  ";
        }
        // line 48
        echo "
  <div class=\"mailpoet-premium-page-text mailpoet-premium-page-text-narrow\">
    <h1>";
        // line 50
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Does this sound like you?", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      ";
        // line 52
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I spent hours tweaking my last newsletter and a subscriber told me it landed in their <b>spambox!</b> It’s frustrating and I don’t know what I’m doing wrong.”", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 55
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“<b>I wish I knew</b> how many people were reading my emails and which links they were clicking…”", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 58
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“Ugh… My web host <b>doesn’t support WordPress email.</b>“", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 61
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I have a lot of patience, but my <b>WooCommerce emails failing</b> to send during a busy sales period, like Black Friday, is starting to wear thin.”", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 64
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I need an email plugin for WordPress <b>that just works!</b>”", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
  </div>
  <hr>

  <div class=\"mailpoet-premium-page-text\">
    <h1>";
        // line 70
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Upgrade to MailPoet Premium", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      ";
        // line 72
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Everything you need to create and send emails that look great and land in inboxes every time — guaranteed.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 75
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Upgrade today and enjoy…", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <div class=\"mailpoet-premium-page-features\">
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 79
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Detailed Analytics at a Glance", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 81
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Learn more about your subscribers and see the bigger picture behind your campaign successes and failures.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 82
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("See who opened your emails and which links they clicked.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 83
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Track your results, optimize subject lines and content, and improve your open rate.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 87
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Advanced Email Delivery", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 89
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We built the MailPoet Sending Service to meet the demands of WordPress.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 90
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("It sends 50,000 emails per hour, with unparalleled speed and performance, 99% uptime, and zero loss.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 91
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We’re the only email provider for WordPress that maintains its own email delivery infrastructure.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 95
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Email that scales with you", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 97
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Whether you send 10 or 100,000 emails a day, your emails will always be delivered on time, every time.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 98
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Our advanced email infrastructure routinely handles small business newsletters through to huge mailing lists with tens of thousands of subscribers.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 102
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Industry-Leading Deliverability", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 104
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We monitor the 30+ million emails that pass through our servers each month, ensuring they always reach inboxes.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 105
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("It’s how we maintain our 98.5% deliverability rate, often exceeding industry standards.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 109
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Email Marketing for WooCommerce", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 111
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Let MailPoet fuel your WooCommerce marketing and increase your sales.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 112
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Add products from your store directly to emails and send personalized recommendations to customers based on their purchasing habits.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
      <div class=\"mailpoet-premium-page-feature\">
        <h2>";
        // line 116
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Fast Priority Support", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <p>
          ";
        // line 118
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Enjoy fast, reliable support via email.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 119
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("No interns here — just real email experts applying 30 years of combined experience to help you send better emails for WordPress.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
          ";
        // line 120
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We’re real humans and here to help!", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </p>
      </div>
    </div>
  </div>
  <hr>
  <div class=\"mailpoet-premium-page-text\">
    <h1>";
        // line 127
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Get Started Now", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      ";
        // line 129
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Choose the MailPoet Premium option that’s right for you.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <div class=\"mailpoet-premium-page-options\">
      <div>
        <p><b>";
        // line 133
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Most Flexible", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</b></p>
        <h2>";
        // line 134
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Premium", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <h3>";
        // line 135
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("\$149/year", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h3>
        <ul>
          <li>";
        // line 137
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Unlimited subscribers", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 138
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Send emails via your web host or third party service", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 139
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Faster support", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 140
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Detailed analytics", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 141
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("WooCommerce emails", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
        </ul>
        <a
          target=\"_blank\"
          href=\"";
        // line 145
        echo $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId((("https://account.mailpoet.com?s=" . ($context["subscriber_count"] ?? null)) . "&utm_source=plugin&utm_medium=premium&utm_campaign=purchase"));
        echo "\"
          class=\"button button-primary mailpoet-button-bigger\"
        >
          ";
        // line 148
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Get started", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </a>
      </div>
      <div>
        <p><b>";
        // line 152
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Most Reliable", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</b></p>
        <h2>";
        // line 153
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Premium + Sending", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h2>
        <h3>";
        // line 154
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("From \$12/month", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h3>
        <ul>
          <li>";
        // line 156
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Pay by number of subscribers", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 157
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Send emails via the MailPoet Sending Service", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 158
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Email that scales with you", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 159
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Faster support", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 160
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Detailed analytics", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
          <li>";
        // line 161
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("WooCommerce emails", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</li>
        </ul>
        <a
          target=\"_blank\"
          href=\"";
        // line 165
        echo $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId((("https://account.mailpoet.com?s=" . ($context["subscriber_count"] ?? null)) . "&utm_source=plugin&utm_medium=premium&utm_campaign=purchase"));
        echo "\"
          class=\"button button-primary mailpoet-button-bigger\"
        >
          ";
        // line 168
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Get started", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
        </a>
      </div>
    </div>
  </div>
  <hr>
  <div class=\"mailpoet-premium-page-text\">
    <h3 class=\"mailpoet-premium-page-paragraph-before-heading\">";
        // line 175
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Try MailPoet Premium for 30 days with our", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h3>
    <h1>";
        // line 176
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("100% Satisfaction Guarantee", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      ";
        // line 178
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We’re not happy unless you are.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
      ";
        // line 179
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("That’s why we offer a 30-day money-back guarantee.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
      ";
        // line 180
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("If you’re not 100% happy with MailPoet Premium during the 30 days after your purchase, we’ll happily refund the cost of your license.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 183
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Refunds are only available to Premium customers and doesn’t apply to plans using the MailPoet Sending Service.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
  </div>
  <hr>
  <div class=\"mailpoet-premium-page-text\">
    <h1>";
        // line 188
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("MailPoet works. Here’s the proof.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      <b>
        ";
        // line 191
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("MailPoet is a trusted leader in email for WordPress since 2011. We’re also delighted to have a lot of raving fans! Every month, 5,000 new websites join our community. MailPoet is the stickiest email plugin for WordPress thanks to the reliability and simplicity at the core of our product improvements.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
      </b>
    </p>
    <p>
      <b>
        ";
        // line 196
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("We read our reviews in the WordPress.org plugin repository religiously. It’s a great source of motivation for our team. Your feedback — both positive and negative — and guides us in choosing priorities for our product development.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
      </b>
    </p>
    <p>
      ";
        // line 200
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I cannot imagine an easier way to create, edit and manage newsletters. Thanks!” –  Chrilles", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 203
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“With MailPoet, we save ten hours of work with the creation of newsletters. Every week.” – highfood", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 206
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“Today I sent a question to the support service. I got the solution 15 minutes later. This is what I call a ‘professional service.’ Thanks!” – loogaroo", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 209
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I’ve been a customer for a few years I have received the best support every single time. Thank you guys, you are great.” – disneyfamilytees", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 212
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I had a little problem and Jack wrote me back to help very soon. His way to interact is very kind and professional… Very good customer support in case you have a problem. The plugin works very well and it has a lot of fantastic new features. I’m satisfied!” – anselmo", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 215
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“Hard to fault MailPoet plugin and the support team behind it. Very happy with the speed and quality of help and the regular upgrades.” – tpoulos", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <p>
      ";
        // line 218
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("“I would warmly recommend MailPoet as a mailing list service. Great plugin, easy to use, easy to set up, no coding needed, 2 minutes and you are ready to roll. Plus, their staff is very pleasant and helpful. If you are seeking for great mailing list plugin, use MailPoet.” – ikac86", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <a
      target=\"_blank\"
      href=\"https://wordpress.org/support/plugin/mailpoet/reviews/\"
      class=\"button button-primary mailpoet-button-bigger\"
    >
      ";
        // line 225
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read all the reviews", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </a>
  </div>
  <hr>
  <div class=\"mailpoet-premium-page-text\">
    <h1>";
        // line 230
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Your alternative: keep using the free plugin", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <p>
      ";
        // line 232
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Don’t get us wrong, we WANT you to use our free plugin (we created it, after all!). But imagine being able to grow your email list past 1,000 subscribers and:", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </p>
    <ul class=\"mailpoet-premium-page-free-disadvantages\">
      <li>";
        // line 235
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Never having to wait very long for support.");
        echo "</li>
      <li>";
        // line 236
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Having access to detailed analytics that help you understand your subscribers.");
        echo "</li>
      <li>";
        // line 237
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Boosting your WooCommerce sales with smart and integrated email marketing.");
        echo "</li>
      <li>";
        // line 238
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Not having MailPoet branding in the footer of your emails.");
        echo "</li>
    </ul>
  </div>
  <hr>
  <div class=\"mailpoet-premium-page-text\">
    <h1>";
        // line 243
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Get Started Now", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "</h1>
    <h3>
      ";
        // line 245
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You have nothing to lose and everything to gain — to help you achieve your email marketing goals and grow your business.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </h3>
    <a
      target=\"_blank\"
      href=\"";
        // line 249
        echo $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId((("https://account.mailpoet.com?s=" . ($context["subscriber_count"] ?? null)) . "&utm_source=plugin&utm_medium=premium&utm_campaign=purchase"));
        echo "\"
      class=\"button button-primary mailpoet-button-bigger\"
    >
      ";
        // line 252
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Upgrade now", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium");
        echo "
    </a>
    <p>
      ";
        // line 255
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Already a Premium customer? Login to your [link]MailPoet account[/link] and add your license key in the Settings page.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium"), "https://account.mailpoet.com/login", ["target" => "_blank"]);
        // line 259
        echo "
    </p>
    <p>
      ";
        // line 262
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Don’t need to use the MailPoet Sending Service? Not a problem! You can buy [link]Premium features separately.[/link] Prices start at \$149 per year for 1 website, \$249 for 4 sites, and \$499 for an unlimited number of sites.", "This text resides in the Premium page: /wp-admin/admin.php?page=mailpoet-premium"), "https://www.mailpoet.com/pricing-premium/", ["target" => "_blank"]);
        // line 266
        echo "
    </p>
  </div>
</div>
";
    }

    // line 272
    public function block_after_javascript($context, array $blocks = [])
    {
        // line 273
        echo "<script type=\"text/javascript\">
  MailPoet.trackEvent('Premium page viewed', {
    'MailPoet Free version': window.mailpoet_version
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "premium.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  594 => 273,  591 => 272,  583 => 266,  581 => 262,  576 => 259,  574 => 255,  568 => 252,  562 => 249,  555 => 245,  550 => 243,  542 => 238,  538 => 237,  534 => 236,  530 => 235,  524 => 232,  519 => 230,  511 => 225,  501 => 218,  495 => 215,  489 => 212,  483 => 209,  477 => 206,  471 => 203,  465 => 200,  458 => 196,  450 => 191,  444 => 188,  436 => 183,  430 => 180,  426 => 179,  422 => 178,  417 => 176,  413 => 175,  403 => 168,  397 => 165,  390 => 161,  386 => 160,  382 => 159,  378 => 158,  374 => 157,  370 => 156,  365 => 154,  361 => 153,  357 => 152,  350 => 148,  344 => 145,  337 => 141,  333 => 140,  329 => 139,  325 => 138,  321 => 137,  316 => 135,  312 => 134,  308 => 133,  301 => 129,  296 => 127,  286 => 120,  282 => 119,  278 => 118,  273 => 116,  266 => 112,  262 => 111,  257 => 109,  250 => 105,  246 => 104,  241 => 102,  234 => 98,  230 => 97,  225 => 95,  218 => 91,  214 => 90,  210 => 89,  205 => 87,  198 => 83,  194 => 82,  190 => 81,  185 => 79,  178 => 75,  172 => 72,  167 => 70,  158 => 64,  152 => 61,  146 => 58,  140 => 55,  134 => 52,  129 => 50,  125 => 48,  117 => 43,  111 => 40,  104 => 36,  99 => 34,  96 => 33,  94 => 32,  83 => 24,  77 => 21,  69 => 16,  65 => 15,  56 => 9,  52 => 8,  46 => 5,  43 => 4,  40 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "premium.html", "/mnt/vhosts/mum/public_html/wp-content/plugins/mailpoet/views/premium.html");
    }
}
