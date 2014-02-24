<?php
  // Build out URI to reload from form dropdown
  // Need full url for this to work in Opera Mini
  $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

  if (isset($_POST['sg_uri']) && isset($_POST['sg_section_switcher'])) {
     $pageURL .= $_POST[sg_uri].$_POST[sg_section_switcher];
     header("Location: $pageURL");
  }

  // Display title of each markup samples as a select option
  function listMarkupAsOptions ($type) {
    $files = array();
    $handle=opendir('markup/'.$type);
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;

    sort($files);
    foreach ($files as $file):
        $filename = preg_replace("/\.html$/i", "", $file); 
        $title = preg_replace("/\-/i", " ", $filename);
        $title = ucwords($title);
        echo '<option value="#sg-'.$filename.'">'.$title.'</option>';
    endforeach;
  }

  // Display markup view & source
  function showMarkup($type) {
    $files = array();
    $handle=opendir('markup/'.$type);
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;

    sort($files);
    foreach ($files as $file):
        $filename = preg_replace("/\.html$/i", "", $file);
        $title = preg_replace("/\-/i", " ", $filename);
        echo '<div class="sg-markup sg-section">';
        echo '<div class="sg-display">';
        echo '<h2 class="sg-h2"><a id="sg-'.$filename.'" class="sg-anchor">'.$title.'</a></h2>';
        include('markup/'.$type.'/'.$file);
        echo '</div>';
        echo '<div class="sg-markup-controls"><a class="sg-btn sg-btn--source" href="#">View Source</a> <a class="sg-btn--top" href="#top">Back to Top</a> </div>';
        echo '<div class="sg-source sg-animated">';
        echo '<a class="sg-btn sg-btn--select" href="#">Copy Source</a>';
        echo '<pre class="prettyprint linenums"><code>';
        echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
        echo '</code></pre>';
        echo '</div>';
        echo '</div>';
    endforeach;
  }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width">
  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/styleguide.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  
  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/theme.css">
</head>
<body>
    <!-- Fixed navbar -->
       <div class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="#"><strong>Project name</strong> Style Guide</a>
           </div>
           <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
                           <li><a href="#">Link</a></li>
                           <li>
                             <div class="btn-group navbar-btn">
                               <button class="btn btn-danger">Action</button>
                               <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
                               <ul class="dropdown-menu">
                                 <li><a href="#">Action</a></li>
                                 <li><a href="#">Another action</a></li>
                                 <li><a href="#">Something else here</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Separated link</a></li>
                               </ul>
                             </div>
                           </li>
                       </ul>
                       <div class="col-sm-3 col-md-3 pull-right">
                     
             		<form class="navbar-form sg-nav"  id="js-sg-nav" action=""  method="post" >
             	
             			<select id="js-sg-section-switcher" class="sg-section-switcher" name="sg_section_switcher">
             			    <option value="">Jump To Section:</option>
             			    <optgroup label="Intro">
             			      <option value="#sg-about">About</option>
             			      <option value="#sg-colors">Colors</option>
             			      <option value="#sg-fontStacks">Font-Stacks</option>
             			    </optgroup>
             			    <optgroup label="Base Styles">
             			      <?php listMarkupAsOptions('base'); ?>
             			    </optgroup>
             			    <optgroup label="Pattern Styles">
             			      <?php listMarkupAsOptions('patterns'); ?>
             			    </optgroup>
             			</select>
             			<input type="hidden" name="sg_uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
             			<button type="submit" class="sg-submit-btn">Go</button>             			
             		</div>
             		</form>
             		</div>
           </div><!--/.nav-collapse -->
         </div>
       </div>
<div id="top" class="sg-header sg-container">
  <h1 class="sg-logo">STYLE GUIDE <span>BOILERPLATE</span></h1>
  <form id="js-sg-nav" action=""  method="post" class="sg-nav">
    <select id="js-sg-section-switcher" class="sg-section-switcher" name="sg_section_switcher">
        <option value="">Jump To Section:</option>
        <optgroup label="Intro">
          <option value="#sg-about">About</option>
          <option value="#sg-colors">Colors</option>
          <option value="#sg-fontStacks">Font-Stacks</option>
        </optgroup>
        <optgroup label="Base Styles">
          <?php listMarkupAsOptions('base'); ?>
        </optgroup>
        <optgroup label="Pattern Styles">
          <?php listMarkupAsOptions('patterns'); ?>
        </optgroup>
    </select>

  </form><!--/.sg-nav-->
</div><!--/.sg-header-->

<div class="sg-body sg-container">
  <div class="sg-info">               
    <div class="sg-about sg-section">
      <h2 class="sg-h2"><a id="sg-about" class="sg-anchor">About</a></h2>
      <p>Comments and documentation about your style guide. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus nobis enim labore facilis consequuntur! Veritatis neque est suscipit tenetur temporibus enim consequatur deserunt perferendis. Neque nemo iusto minima deserunt amet.</p>
    </div><!--/.sg-about-->
    
    <div class="sg-colors sg-section">
      <h2 class="sg-h2"><a id="sg-colors" class="sg-anchor">Colors</a></h2>
        <div class="sg-color sg-color--a"><span class="sg-color-swatch"><span class="sg-animated">#88ffda</span></span></div>
        <div class="sg-color sg-color--b"><span class="sg-color-swatch"><span class="sg-animated">#4dd3c9</span></span></div>
        <div class="sg-color sg-color--c"><span class="sg-color-swatch"><span class="sg-animated">#339db0</span></span></div>
        <div class="sg-color sg-color--d"><span class="sg-color-swatch"><span class="sg-animated">#2078aa</span></span></div>
        <div class="sg-color sg-color--e"><span class="sg-color-swatch"><span class="sg-animated">#3a517a</span></span></div>
        <div class="sg-color sg-color--f"><span class="sg-color-swatch"><span class="sg-animated">#384355</span></span></div>
        <div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
    </div><!--/.sg-colors-->
    
    <div class="sg-font-stacks sg-section">
      <h2 class="sg-h2"><a id="sg-fontStacks" class="sg-anchor">Font Stacks</a></h2>
      <p class="sg-font sg-font-primary">"HelveticaNeue", "Helvetica", Arial, sans-serif;</p>
      <p class="sg-font sg-font-secondary">Georgia, Times, "Times New Roman", serif;</p>
      <div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
    </div><!--/.sg-font-stacks-->
  </div><!--/.sg-info-->    

  <div class="sg-base-styles">    
    <h1 class="sg-h1">Base Styles</h1>
    <?php showMarkup('base'); ?>
  </div><!--/.sg-base-styles-->

  <div class="sg-pattern-styles">
    <h1 class="sg-h1">Pattern Styles<small> - Design and mark-up patterns unique to your site.</small></h1>
    <?php showMarkup('patterns'); ?>
    </div><!--/.sg-pattern-styles-->
  </div><!--/.sg-body-->

  <script src="js/sg-plugins.js"></script>
  <script src="js/sg-scripts.js"></script>
</body>
</html>