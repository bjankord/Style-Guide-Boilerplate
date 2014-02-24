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
        echo '<li><a href="#sg-'.$filename.'">'.$title.'</a></li>';
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
        echo '<h2 class="sg-h2" id="sg-'.$filename.'">'.$title.'</h2>';
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
<body  data-spy="scroll" data-target=".navbar-right">
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
                           <li><a href="#"></a></li>
                           <li>
                             <div class="btn-group navbar-btn">
                               <button class="btn">Jump to Section:</button>
                               <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                               <ul class="dropdown-menu">
                               <li><a href="#sg-about">About</a></li>
                               <li role="presentation" class="divider"></li>
                                 <li role="presentation" class="dropdown-header">Foundation</li>
                                  
                                 
                                 <li><a href="#sg-colors">Colors</a></li>
                                 <li><a href="#sg-colors">Font-Stacks</a></li>
                                  <li role="presentation" class="divider"></li>
                                   <li role="presentation" class="dropdown-header">Base Styles</li>
                                    <?php listMarkupAsOptions('base'); ?>
                                   <li role="presentation" class="divider"></li>
                                    <li role="presentation" class="dropdown-header">Patterns</li>
                                     <?php listMarkupAsOptions('patterns'); ?>
                                 
                               </ul>
                             </div>
                           </li>
                       </ul>
                       
           </div><!--/.nav-collapse -->
         </div>
       </div>
<!--/.sg-header-->

<div class="sg-body sg-container container">
  <div class="sg-info">               
    <div class="sg-about sg-section">
      <h1 class="page-header" id="sg-about">About</h2>
      <p>Comments and documentation about your style guide. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus nobis enim labore facilis consequuntur! Veritatis neque est suscipit tenetur temporibus enim consequatur deserunt perferendis. Neque nemo iusto minima deserunt amet.</p>
    </div><!--/.sg-about-->
    
    <div class="sg-colors sg-section">
    <h1 class="page-header">Foundation</h1>
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
    <h1 class="page-header">Base Styles</h1>
    <?php showMarkup('base'); ?>
  </div><!--/.sg-base-styles-->

  <div class="sg-pattern-styles">
    <h1 class="page-header">Patterns<small> - Design and mark-up patterns unique to your site.</small></h1>
    <?php showMarkup('patterns'); ?>
    </div><!--/.sg-pattern-styles-->
  </div><!--/.sg-body-->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/dropdown.js"></script>
  <script src="js/sg-plugins.js"></script>
  <script src="js/sg-scripts.js"></script>
</body>
</html>