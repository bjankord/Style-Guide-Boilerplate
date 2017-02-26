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
  <!-- <link rel="stylesheet" href="vendor/prism/prism.css"> -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  
  <!-- Google Font Lato -->
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

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
                <div class="sg-color-swatch" style="background-color: #6bccb3;"></div>
                <div class="sg-color-name">Aqua</div>
                <div class="sg-color-value">#6bccb3</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #7e4082"></div>
                <div class="sg-color-name">Purple Haze</div>
                <div class="sg-color-value">#7e4082</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #402b56;"></div>
                <div class="sg-color-name">Deep Purple</div>
                <div class="sg-color-value">#402b56</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #2b4c59"></div>
                <div class="sg-color-name">Emerald C</div>
                <div class="sg-color-value">#2b4c59</div>
              </div>
            </div><!--/.sg-color-grid-->
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #E56A54;"></div>
                <div class="sg-color-name">Salmon C</div>
                <div class="sg-color-value">#E56A54</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #4EC3E0;"></div>
                <div class="sg-color-name">Charter</div>
                <div class="sg-color-value">#4EC3E0</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #f6dc6b;"></div>
                <div class="sg-color-name">Canary</div>
                <div class="sg-color-value">#f6dc6b</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #2a343e;"></div>
                <div class="sg-color-name">Obsidian</div>
                <div class="sg-color-value">#2a343e</div>
              </div>
            </div><!--/.sg-color-grid-->
            <div class="sg-color-grid">
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #5c6670;"></div>
                <div class="sg-color-name">Slate</div>
                <div class="sg-color-value">#5c6670</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #a4a9ad;"></div>
                <div class="sg-color-name">Smog</div>
                <div class="sg-color-value">#a4a9ad</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #d1d3d3;"></div>
                <div class="sg-color-name">Smoke</div>
                <div class="sg-color-value">#d1d3d3</div>
              </div>
              <div class="sg-color">
                <div class="sg-color-swatch" style="background-color: #eaeaea;"></div>
                <div class="sg-color-name">Haze</div>
                <div class="sg-color-value">#eaeaea</div>
              </div>
            </div><!--/.sg-color-grid-->
          </div><!--/.sg-colors-->

          <!-- Manually add your fonts here. -->
          <div class="sg-font-stacks sg-section">
            <h2 id="sg-fontStacks" class="sg-h2">Font Stacks</h2>
            <dl class="sg-font-list">
              <dt>Primary Font:</dt>
              <dd style='font-family: "Lato", Arial, sans-serif;'>"Lato", Arial, sans-serif;</dd>

              <dt>Primary Font Italic:</dt>
              <dd style='font-family: "Lato", Arial, sans-serif; font-style: italic;'>"Lato", Arial, sans-serif;</dd>

              <dt>Primary Font Bold:</dt>
              <dd style='font-family: "Lato", Arial, sans-serif; font-weight: 700;'>"Lato", Arial, sans-serif;</dd>

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

