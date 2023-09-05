FREEFORMATTER.COM
Search tools...
Free Online Tools For Developers
Buy Me A Coffee
Formatters
XML Formatter
JSON Formatter
HTML Formatter
SQL Formatter
Validators
XML Validator
JSON Validator
HTML Validator
XPath Tester
Credit Card Number Generator & Validator
Regular Expression Tester
Java Regular Expression Tester
Cron Expression Generator (Quartz)
Converters
XSD Generator
XSLT (XSL Transformer)
XML to JSON Converter
JSON to XML Converter
CSV to XML Converter
CSV to JSON Converter
YAML to JSON Converter
JSON to YAML Converter
Epoch Timestamp To Date
Encoders / Cryptography
Url Encoder & Decoder
Base 64 Encoder & Decoder
Convert File Encoding
Message Digester (MD5, SHA-256, SHA-512)
HMAC Generator
QR Code Generator
Code Minifiers / Beautifier
JavaScript Beautifier
JavaScript Minifier
CSS Beautifier
CSS Minifier
String Escaper & Utilities
String Utilities
HTML Escape
XML Escape
Java and .Net Escape
JavaScript Escape
JSON Escape
CSV Escape
SQL Escape
Web Resources
Lorem Ipsum Generator
List of MIME types
HTML Entities
Url Parser / Query String Splitter
I18N Standards / Code Snippets
HTML Formatter
Formatters
HTML Formatter
Formats a HTML string/file with your desired indentation level. The formatting rules are not configurable but are already optimized for the best possible output. Note that the formatter will keep spaces and tabs between content tags such as div and span as it's considered to be valid content.

Option 1: Copy-paste your HTML here
<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= images_folder('logos/logo.png'); ?>" alt="" class="logo">
      </a>

      <div>
        <!-- .navbar -->
        <nav id="navbar" class="navbar">
          <a href="<?= base_url() . 'es' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/es.png'); ?>" alt="Español" /></a>
          <a href="<?= base_url() . 'en' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/en.png'); ?>" alt="English" /></a>
          <a href="https://gruposyasa.com/home/" class="btn-siges">Siges</a>

          <!-- .Menu -->
          <!-- partial:index.partial.html -->
          <div class="hamburger-menu">
              <input id="menu__toggle" type="checkbox" />
              <label class="menu__btn" for="menu__toggle">
                <span></span>
              </label>

              <ul class="menu__box">
                <li><a class="menu__item" href="#">Главная</a></li>
                <li><a class="menu__item" href="#">Проекты</a></li>
                <li><a class="menu__item" href="#">Команда</a></li>
                <li><a class="menu__item" href="#">Блог</a></li>
                <li><a class="menu__item" href="#">Контакты</a></li>
              </ul>
          </div>
          <!-- partial -->
          <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu" class="align-items-center">
              <li><a href="<?= site_url(); ?>">Home</a></li>
              <li><a href="<?= site_url('nosotros'); ?>"><?= localized('about_us');?></a></li>
              <li><a href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a></li>
              <li><a href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a></li>
              <li><a href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a></li>
              <li><a href="https://gruposyasa.com/home/" class="btn btn-primary btn-siges-mobile">Siges</a></li>
            </ul>
          </div>
          <!-- .Menu -->
        </nav><!-- .navbar -->
  
      </div>
    </div>
  </header><!-- End Header -->
Option 2: Or upload your HTML fileSin archivos seleccionados
File encoding
UTF-8
Indentation level
4 spaces per indent level
 
-Formatted HTML-
 
<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= images_folder('logos/logo.png'); ?>" alt="" class="logo">
        </a>
        <div>
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <a href="<?= base_url() . 'es' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/es.png'); ?>" alt="Español" /></a>
                <a href="<?= base_url() . 'en' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/en.png'); ?>" alt="English" /></a>
                <a href="https://gruposyasa.com/home/" class="btn-siges">Siges</a>
                <!-- .Menu -->
                <!-- partial:index.partial.html -->
                <div class="hamburger-menu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                    <span></span>
                    </label>
                    <ul class="menu__box">
                        <li><a href="<?= site_url(); ?>">Home</a></li>
                        <li><a href="<?= site_url('nosotros'); ?>"><?= localized('about_us');?></a></li>
                        <li><a href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a></li>
                        <li><a href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a></li>
                        <li><a href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a></li>
                        <li><a href="https://gruposyasa.com/home/" class="btn btn-primary btn-siges-mobile">Siges</a></li>
                    </ul>
                </div>
                <!-- partial -->
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul id="menu" class="align-items-center">
                        <li><a href="<?= site_url(); ?>">Home</a></li>
                        <li><a href="<?= site_url('nosotros'); ?>"><?= localized('about_us');?></a></li>
                        <li><a href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a></li>
                        <li><a href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a></li>
                        <li><a href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a></li>
                        <li><a href="https://gruposyasa.com/home/" class="btn btn-primary btn-siges-mobile">Siges</a></li>
                    </ul>
                </div>
                <!-- .Menu -->
            </nav>
            <!-- .navbar -->
        </div>
    </div>
</header>
<!-- End Header -->
© FreeFormatter.com - FREEFORMATTER is a d/b/a of 10174785 Canada Inc. - Copyright Notice - Privacy Statement - Terms of Use - Contact