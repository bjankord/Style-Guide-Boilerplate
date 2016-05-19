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

  <!-- https://github.com/sindresorhus/github-markdown-css -->
  <link rel="stylesheet" href="css/github-markdown.css">
  
  <!-- prism Syntax Highlighting Styles -->
  <link rel="stylesheet" href="vendor/prism/prism.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- Makes pretty Mark up -->
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=sunburst"></script>
  
  <!-- CUSTOM CSS --- THEME CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body onload="prettyPrint()">
  <a href="#main" class="sg-visually-hidden sg-visually-hidden-focusable">Skip to main content</a>

  <div id="top" class="sg-header" role="banner">
    <div class="sg-container">
      <h1 class="sg-logo">
        <span class="sg-logo-initials">FT</span>
        <span class="sg-logo-full">Frontline Education</span> <em>Style Guide</em>
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
            <p>Welcome to frontline’s awesome we guideline. This tool is to help unify our web designers and developers around a consistent style but in turn also speed up development. </p>
          </div><!--/.sg-about-->

          <!-- Manually add your UI colors here. -->
          <div class="sg-colors sg-section">
            <h2 id="sg-colors" class="sg-h2">Colors</h2>
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #6ECEB2;"></div>
                <div class="sg-color-name">Pantone 338 C</div>
                <div class="sg-color-value">#6ECEB2</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #7A4183"></div>
                <div class="sg-color-name">Pantone 7662 C</div>
                <div class="sg-color-value">#7A4183</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #E56A54;"></div>
                <div class="sg-color-name">Pantone 7416 C</div>
                <div class="sg-color-value">#E56A54</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #3F2A56"></div>
                <div class="sg-color-name">Pantone 669 C</div>
                <div class="sg-color-value">#3F2A56</div>
              </div>
            </div><!--/.sg-color-grid-->
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #2E4D58;"></div>
                <div class="sg-color-name">Pantone 2216 C</div>
                <div class="sg-color-value">#2E4D58</div>
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
                <div class="sg-color-swatch" style="background-color: #D0D3D4;"></div>
                <div class="sg-color-name">Silver</div>
                <div class="sg-color-value">#D0D3D4</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #A2AAAD;"></div>
                <div class="sg-color-name">Concrete</div>
                <div class="sg-color-value">#A2AAAD</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #5B6770;"></div>
                <div class="sg-color-name">Obsidian</div>
                <div class="sg-color-value">#5B6770</div>
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

  <!--[if gt IE 8]><!--><script src="vendor/prism/prism.js"></script><!--<![endif]-->
  <script src="js/sg-scripts.js"></script>
</body>
</html>

