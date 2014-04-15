<?php
	$project_name = "Project Name";
  // Build out URI to reload from form dropdown
  // Need full url for this to work in Opera Mini
  $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

  if (isset($_POST['sg_uri']) && isset($_POST['sg_section_switcher'])) {
     $pageURL .= $_POST[sg_uri].$_POST[sg_section_switcher];
     header("Location: $pageURL");
  }
 // Display title of each markup samples as a select option
  function listElementsAsOptions ($type) {
    $files = array();
    $handle=opendir($type.'/');
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;
echo '<li role="presentation" class="divider"></li><li role="presentation" class="dropdown-header">'.$type.'</li>';
    sort($files);
    foreach ($files as $file):
        $filename = preg_replace("/\.html$/i", "", $file); 
        $title = preg_replace("/\-/i", " ", $filename);
        $title = ucwords($title);
        echo '<li><a href="#sg-'.$filename.'">'.$title.'</a></li>';
    endforeach;
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
    // Display foundation elements
    function showDocs() {
      $files = array();
      $handle=opendir('docs/');
      while (false !== ($file = readdir($handle))):
          if(stristr($file,'.html')):
              $files[] = $file;
          endif;
      endwhile;
  
      sort($files);
      foreach ($files as $file):
          $filename = preg_replace("/\.html$/i", "", $file);
          $title = preg_replace("/\-/i", " ", $filename);
          echo '<div class="col-lg-12 sg-section" id="sg-'.$filename.'">';
          echo '<div class="sg-display">';
          echo '<h2 class="sg-h2">'.$title.'</h2>';
          include('docs/'.$file);
          echo '</div><!--/.sg-display-->';
          echo '</div><!--/.sg-section-->';
      endforeach;
    }
  // Display foundation elements
  function showFoundation() {
    $files = array();
    $handle=opendir('foundation/');
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;

    sort($files);
    foreach ($files as $file):
        $filename = preg_replace("/\.html$/i", "", $file);
        $title = preg_replace("/\-/i", " ", $filename);
        echo '<div class="col-lg-12 sg-section" id="sg-'.$filename.'">';
        echo '<div class="sg-display">';
        echo '<h2 class="sg-h2">'.$title.'</h2>';
        include('foundation/'.$file);
        echo '</div><!--/.sg-display-->';
        echo '</div><!--/.sg-section-->';
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
        echo '<div class="col-lg-12 sg-section" id="sg-'.$filename.'">';
        echo '<div class="sg-display">';
        echo '<h2 class="sg-h2">'.$title.'</h2>';
        include('markup/'.$type.'/'.$file);
        echo '</div><!--/.sg-display-->';
        echo '<div class="sg-markup-controls"><a class="btn btn-primary sg-btn sg-btn--source" href="#">View Source</a> <a class="sg-btn--top" href="#top">Back to Top</a> </div>';
        echo '<div class="sg-source sg-animated">';
        echo '<a class="btn btn-default sg-btn sg-btn--select" href="#">Copy Source</a>';
        echo '<pre class="prettyprint linenums"><code>';
        echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
        echo '</code></pre>';
        echo '</div><!--/.sg-source-->';
        echo '</div><!--/.sg-section-->';
    endforeach;
  }
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title><?php echo($project_name)?>Style Guide</title>
<meta name="viewport" content="width=device-width">
<!-- Style Guide Boilerplate Styles -->
<link rel="stylesheet" href="css/styleguide.css">
<link rel="stylesheet" href="css/bootstrap.css">

<!-- Replace below stylesheet with your own stylesheet -->
<link rel="stylesheet" href="css/theme.css">
</head>
<body   data-spy="scroll" data-target=".navbar-default" data-offset="60" >
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="#"><strong><?php echo($project_name)?></strong> Style Guide</a> </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown active"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select an element: <b class="caret"></b></a>
        <ul class="dropdown-menu  scroll-menu sg-sect">
          <?php listElementsAsOptions('docs'); ?>
          <?php listElementsAsOptions('foundation'); ?>
          <li role="presentation" class="divider"></li>
          <li role="presentation" class="dropdown-header">Base Styles</li>
          <?php listMarkupAsOptions('base'); ?>
          <li role="presentation" class="divider"></li>
          <li role="presentation" class="dropdown-header">Patterns</li>
          <?php listMarkupAsOptions('patterns'); ?>
        </ul>
      </li>
    </ul>
  </div>
</div>
<!--/.sg-header-->

<div class="sg-body sg-container container">
<div class="row">
  <h1 class="page-header">Style Guide Documentation</h1>
  <?php showDocs(); ?>
</div>
<!--/.row-->
<div class="row">
  <h1 class="page-header">Foundation</h1>
  <?php showFoundation(); ?>
</div>
<!--/.row-->

<div class="row sg-base-styles">
  <h1 class="page-header">Base Styles</h1>
  <?php showMarkup('base'); ?>
  <!--</div>/.sg-base-styles-->
  
  <div class="sg-pattern-styles">
    <h1 class="page-header">Patterns<small> - Design and mark-up patterns unique to your site.</small></h1>
    <?php showMarkup('patterns'); ?>
  </div>
  <!--/.sg-pattern-styles--> 
</div>
<!--/.sg-body--> 
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
<script src="js/scrollspy.js"></script> 
<script src="js/dropdown.js"></script> 
<script src="js/sg-plugins.js"></script> 
<script src="js/sg-scripts.js"></script>
</body>
</html>