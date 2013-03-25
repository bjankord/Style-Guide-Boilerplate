<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width">
  
  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/sg-style.css">
  <!--[if lt IE 9]><link rel="stylesheet" href="css/sg-ie.css"><![endif]-->
  
  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body id="page">

<div class="sg-header">
  <div class="sg-container">
    <a href="#nav" id="sg-nav-toggle" class="sg-nav-toggle">&#9776;</a>
    <span class="sg-logo">STYLE GUIDE</span>
  </div><!--/.sg-container-->
</div><!--/.sg-header-->

<div id="sg-wrap" class="sg-wrap">

  <nav id="sg-nav" class="sg-nav" role="navigation">
    <div class="sg-nav-inner">
      <h2>Base Styles</h2>
      <ul>
        <?php
        $files = array();
        $handle=opendir('markup/base');
        while (false !== ($file = readdir($handle))):
            if(stristr($file,'.html')):
                $files[] = $file;
            endif;
        endwhile;

        sort($files);
        foreach ($files as $file):
            $filename = preg_replace("/\.html$/i", "", $file);
            $title = preg_replace("/\-/i", " ", $filename);
            echo '<li><a href="#'.$filename.'">'.$title.'</a></li>';
        endforeach;
        ?>
      </ul>
      
      <br>
      <br>
      
      <h2>Pattern Styles</h2>
      <ul>
        <?php
        $files = array();
        $handle=opendir('markup/patterns');
        while (false !== ($file = readdir($handle))):
            if(stristr($file,'.html')):
                $files[] = $file;
            endif;
        endwhile;

        sort($files);
        foreach ($files as $file):
            $filename = preg_replace("/\.html$/i", "", $file);
            $title = preg_replace("/\-/i", " ", $filename);
            echo '<li><a href="#'.$filename.'">'.$title.'</a></li>';
        endforeach;
        ?>
      </ul>
    </div>
  </nav>

  <div class="sg-container">
    <div class="sg-intro">               
      <h1>Your Site's Style Guide</h1>

      <p>Comments and documentation about your style guide. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus nobis enim labore facilis consequuntur! Veritatis neque est suscipit tenetur temporibus enim consequatur deserunt perferendis. Neque nemo iusto minima deserunt amet.<p>

      <h2>Info</h2>    
      <p>Created: 05-05-13</p>
      <p>Modified: 05-07-13</p>
      <p>Version: 1.0.1</p>

      <div class="sg-colors-mod">
        <h2>Colors</h2>
        <ul class="sg-colors">
          <li class="sg-color--a"><span></span></li>
          <li class="sg-color--b"><span></span></li>
          <li class="sg-color--c"><span></span></li>
          <li class="sg-color--d"><span></span></li>
          <li class="sg-color--f"><span></span></li>
        </ul>
      </div><!--/.sg-colors-mod-->
      
      <div class="sg-font-stacks-mod">
        <h2>Font Stacks</h2>
        <div class="sg-font sg-font--a">Ubuntu, sans-serif</div>
        <div class="sg-font sg-font--b">Vollkorn, serif</div>
        <div class="sg-font sg-font--c">HelveticaNeue, Helvetica, Arial, sans-serif</div>
      </div><!--/.sg-font-stacks-mod-->
    </div><!--/.sg-intro-->    

    <div class="sg-styles sg-styles-base">    
      <h1 class="pattern-main-heading">Base Styles</h1>
      <?php
      $files = array();
      $handle=opendir('markup/base');
      while (false !== ($file = readdir($handle))):
          if(stristr($file,'.html')):
              $files[] = $file;
          endif;
      endwhile;

      sort($files);
      foreach ($files as $file):
          $filename = preg_replace("/\.html$/i", "", $file);
          $title = preg_replace("/\-/i", " ", $filename);
          echo '<div class="pattern">';
          echo '<div class="display">';
          echo '<h2 class="pattern-heading"><a name="'.$filename.'">'.$title.'</a></h2>';
          include('markup/base/'.$file);
          echo '</div>';
          echo '<div class="source">';
          echo '<p><a href="markup/base/'.$file.'">'.$file.'</a></p>';
          echo '<pre><code>';
          echo htmlspecialchars(file_get_contents('markup/base/'.$file));
          echo '</code></pre>';
          echo '</div>';
          echo '</div>';
      endforeach;
      ?>
    </div>

    <div class="sg-styles sg-styles-patterns">
      <h1>Pattern Styles</h1>
      <h2>Design and mark-up patterns unique to your site.</h2>
      <?php
      $files = array();
      $handle=opendir('markup/patterns');
      while (false !== ($file = readdir($handle))):
          if(stristr($file,'.html')):
              $files[] = $file;
          endif;
      endwhile;

      sort($files);
      foreach ($files as $file):
          $filename = preg_replace("/\.html$/i", "", $file);
          $title = preg_replace("/\-/i", " ", $filename);
          echo '<div class="pattern">';
          echo '<div class="display">';
          echo '<h2 class="pattern-heading"><a name="'.$filename.'">'.$title.'</a></h2>';
          include('markup/patterns/'.$file);
          echo '</div>';
          echo '<div class="source">';
          echo '<p><a href="markup/patterns/'.$file.'">'.$file.'</a></p>';
          echo '<pre><code>';
          echo htmlspecialchars(file_get_contents('markup/patterns/'.$file));
          echo '</code></pre>';
          echo '</div>';
          echo '</div>';
      endforeach;
      ?>
      </div><!--/.sg-styles-patterns-->
  </div><!--/.container-->
</div><!--/.wrap-->

<script src="js/highlight.min.js"></script>
<script src="js/sg-scripts.js"></script>
</body>
</html>