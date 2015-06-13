<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width">
  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/sg-style.css">

  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="#main" class="sg-visually-hidden sg-visually-hidden-focusable">Skip to main content</a>
<div id="top" class="sg-header sg-container">
  <h1 class="sg-logo">STYLE GUIDE <span>BOILERPLATE</span></h1>
  <form id="js-sg-nav" action=""  method="post" class="sg-nav">
    <label for="js-sg-section-switcher" class="sg-visually-hidden">Navigation</label>
    <select id="js-sg-section-switcher" class="sg-section-switcher" name="sg_section_switcher">
        <option value="">Jump To Section:</option>
        <optgroup label="Intro">
          <option value="#sg-about">About</option>
          <option value="#sg-colors">Colors</option>
          <option value="#sg-fontStacks">Font-Stacks</option>
        </optgroup>
        <optgroup label="Base HTML">
          <?php listMarkupAsOptions('base'); ?>
        </optgroup>
        <optgroup label="Patterns">
          <?php listMarkupAsOptions('patterns'); ?>
        </optgroup>
    </select>
    <input type="hidden" name="sg_uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
    <button type="submit" class="sg-submit-btn">Go</button>
  </form><!--/.sg-nav-->
</div><!--/.sg-header-->

<div id="main" class="sg-body sg-container">
  <div class="sg-info">
    <div class="sg-about sg-section">
      <h2 class="sg-h2"><a id="sg-about" class="sg-anchor">About</a></h2>
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
  </div><!--/.sg-body-->

  <script src="js/sg-plugins.js"></script>
  <script src="js/sg-scripts.js"></script>
</body>
</html>

