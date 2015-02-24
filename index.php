<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en" class="sg-dark-theme no-js">
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000">

  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/sg-style.css">
  <!-- Prisim Syntax Highlighting Styles -->
  <link rel="stylesheet" href="vendor/prisim/prisim.css">

  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="top" class="sg-header">
  <div class="sg-container">
    <h1 class="sg-logo"><span class="sg-logo-initials">SG</span><span class="sg-logo-full">STYLE GUIDE</span> <em>BOILERPLATE</em></h1>
    <a class="sg-nav-toggle" id="sg-nav-toggle" href="#nav">Menu</a>
  </div>
</div><!--/.sg-header-->

<div class="sg-wrapper sg-clearfix">
  <div id="nav" class="sg-sidebar">
    <div class="sg-nav-group">
      <h2 class="sg-h2 sg-subnav-title">About</h2>
      <ul class="sg-navlist">
        <li>
          <a href="#">Getting Started</a>
        </li>
        <li>
          <a href="#">Colors</a>
        </li>
        <li>
          <a href="#">Fonts</a>
        </li>
      </ul>
    </div>
    <div class="sg-nav-group">
      <h2 class="sg-h2 sg-subnav-title">Base HTML</h2>
      <ul class="sg-navlist">
        <?php listMarkupAsListItems('base'); ?>
      </ul>
    </div>
    <div class="sg-nav-group">
      <h2 class="sg-h2 sg-subnav-title">Patterns</h2>
      <ul class="sg-navlist">
        <?php listMarkupAsListItems('patterns'); ?>
      </ul>
    </div>
  </div><!--/.sg-sidebar-->

  <div class="sg-main">
  <div class="sg-container">
    <div class="sg-info">
      <div class="sg-about sg-section">
        <h2 class="sg-h2"><a id="sg-about" class="sg-anchor">Getting Started</a></h2>
        <p>Comments and documentation about your style guide. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus nobis enim labore facilis consequuntur! Veritatis neque est suscipit tenetur temporibus enim consequatur deserunt perferendis. Neque nemo iusto minima deserunt amet.</p>
      </div><!--/.sg-about-->

      <!-- Manually add your UI colors here. -->
      <div class="sg-colors sg-section">
        <h2 class="sg-h2"><a id="sg-colors" class="sg-anchor">Colors</a></h2>
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
        <h2 class="sg-h2"><a id="sg-fontStacks" class="sg-anchor">Font Stacks</a></h2>
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

    <div class="sg-base-styles">
      <h1 class="sg-h1">Base HTML</h1>
      <?php showMarkup('base'); ?>
    </div><!--/.sg-base-styles-->

    <div class="sg-pattern-styles">
      <h1 class="sg-h1">Patterns<small> - Design and markup patterns unique to your site.</small></h1>
      <?php showMarkup('patterns'); ?>
    </div><!--/.sg-pattern-styles-->
    </div>
  </div><!--/.sg-main-->
</div><!--/.sg-wrapper-->

<script src="vendor/prisim/prisim.js"></script>
<script src="js/sg-scripts.js"></script>
</body>
</html>

