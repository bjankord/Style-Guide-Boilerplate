<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000">

  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/sg-style.css">
  <!--[if lt IE 9]><link rel="stylesheet" href="css/sg-style-old-ie.css"><![endif]-->

  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Prisim Syntax Highlighting Styles -->
  <link rel="stylesheet" href="vendor/prisim/prisim.css">
</head>
<body>
  <a href="#main" class="sg-visually-hidden sg-visually-hidden-focusable">Skip to main content</a>

  <div id="top" class="sg-header" role="banner">
    <div class="sg-container">
      <h1 class="sg-logo">
        <span class="sg-logo-initials">SG</span>
        <span class="sg-logo-full">STYLE GUIDE</span> <em>BOILERPLATE</em>
      </h1>
      <button type="button" class="sg-nav-toggle">Menu</button>
    </div>
  </div><!--/.sg-header-->

  <div class="sg-wrapper sg-clearfix">
    <div id="nav" class="sg-sidebar" role="navigation">
      <h2 class="sg-h2 sg-subnav-title">About</h2>
      <ul class="sg-nav-group">
        <li>
          <a href="#sg-about">Getting Started</a>
        </li>
        <li>
          <a href="#sg-colors">Colors</a>
        </li>
        <li>
          <a href="#sg-fontStacks">Fonts</a>
        </li>
      </ul>

      <?php listFilesInFolder('markup'); ?>
    </div><!--/.sg-sidebar-->

    <div id="main" class="sg-main" role="main">
      <div class="sg-container">
        <div class="sg-info">
          <div class="sg-about sg-section">
            <h2 id="sg-about" class="sg-h2">Getting Started</h2>
            <p>A living style guide is a great tool to promote visual consistency, unify UX designers and front-end developers, as well as speed up development times. Add some documentation here on how to get started with your new style guide and start customizing this boilerplate to your liking.</p>
            <p>If you are looking for resources on style guides, check out <a href="http://styleguides.io">styleguides.io</a>. There are a ton of great articles, books, podcasts, talks, and other style guide tools!</p>
          </div><!--/.sg-about-->

          <!-- Manually add your UI colors here. -->
          <div class="sg-colors sg-section">
            <h2 id="sg-colors" class="sg-h2">Colors</h2>
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #1abc9c;"></div>
                <div class="sg-color-name">Turquoise</div>
                <div class="sg-color-value">#1abc9c</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #2ecc71;"></div>
                <div class="sg-color-name">Emerald</div>
                <div class="sg-color-value">#2ecc71</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #3498db;"></div>
                <div class="sg-color-name">Peter River</div>
                <div class="sg-color-value">#3498db</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #9b59b6;"></div>
                <div class="sg-color-name">Amethyst</div>
                <div class="sg-color-value">#9b59b6</div>
              </div>
            </div><!--/.sg-color-grid-->
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #f1c40f;"></div>
                <div class="sg-color-name">Sun Flower</div>
                <div class="sg-color-value">#f1c40f</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #e67e22;"></div>
                <div class="sg-color-name">Carrot</div>
                <div class="sg-color-value">#e67e22</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #e74c3c;"></div>
                <div class="sg-color-name">Alizarin</div>
                <div class="sg-color-value">#e74c3c</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #c0392b;"></div>
                <div class="sg-color-name">Pomegranate</div>
                <div class="sg-color-value">#c0392b</div>
              </div>
            </div><!--/.sg-color-grid-->
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #ecf0f1;"></div>
                <div class="sg-color-name">Clouds</div>
                <div class="sg-color-value">#ecf0f1</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #95a5a6;"></div>
                <div class="sg-color-name">Silver</div>
                <div class="sg-color-value">#95a5a6</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #697374;"></div>
                <div class="sg-color-name">Concrete</div>
                <div class="sg-color-value">#697374</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #111313;"></div>
                <div class="sg-color-name">Obsidian</div>
                <div class="sg-color-value">#111313</div>
              </div>
            </div><!--/.sg-color-grid-->
          </div><!--/.sg-colors-->

          <!-- Manually add your fonts here. -->
          <div class="sg-font-stacks sg-section">
            <h2 id="sg-fontStacks" class="sg-h2">Font Stacks</h2>
            <dl class="sg-font-list">
              <dt>Primary Font:</dt>
              <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

              <dt>Primary Font Italic:</dt>
              <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif; font-style: italic;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

              <dt>Primary Font Bold:</dt>
              <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif; font-weight: 800;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

              <dt>Secondary Font:</dt>
              <dd style='font-family: Georgia, Times, "Times New Roman", serif;'>Georgia, Times, "Times New Roman", serif;</dd>

              <dt>Secondary Font Italic:</dt>
              <dd style='font-family: Georgia, Times, "Times New Roman", serif; font-style: italic;'>Georgia, Times, "Times New Roman", serif;</dd>

              <dt>Secondary Font Bold:</dt>
              <dd style='font-family: Georgia, Times, "Times New Roman", serif; font-weight: 800;'>Georgia, Times, "Times New Roman", serif;</dd>
            </dl>
            <div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
          </div><!--/.sg-font-stacks-->
        </div><!--/.sg-info-->

        <?php renderFilesInFolder('markup'); ?>
      </div><!--/.sg-container-->
    </div><!--/.sg-main-->
  </div><!--/.sg-wrapper-->

  <!--[if gt IE 8]><!--><script src="vendor/prisim/prisim.js"></script><!--<![endif]-->
  <script src="js/sg-scripts.js"></script>
</body>
</html>

