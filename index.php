<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <title>Style Guide Boilerplate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Style Guide Boilerplate Styles -->
  <link rel="stylesheet" href="css/sg-style.css">
  <!--[if lt IE 9]><link rel="stylesheet" href="css/sg-ie.css"><![endif]-->
  
  <!-- Replace below stylesheet with your own stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Highlight.js Styles and Scripts -->
  <link rel="stylesheet" href="http://softwaremaniacs.org/media/soft/highlight/styles/github.css">
  <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
</head>
<body>

<div class="sg-header">
  <div class="sg-container">
      <a href="#nav" class="sg-nav-toggle"><img src="images/navicon.png" width="30" alt=""></a>
    <span class="sg-logo">STYLE GUIDE</span>
  </div><!--/.sg-container-->
</div><!--/.sg-header-->

<div class="sg-wrap">
  
  <nav class="sg-nav" role="navigation">
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
  
  <div class="sg-main sg-container" role="main">
    <div class="sg-intro">               
      <h1 class="sg-heading-primary">Your Site's Style Guide</h1>

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
      <h1 class="sg-heading-primary">Base Styles</h1>
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
          echo '<div class="sg-pattern">';
          echo '<div class="sg-display">';
          echo '<h2 class="sg-heading-secondary"><a name="'.$filename.'">'.$title.'</a></h2>';
          include('markup/base/'.$file);
          echo '</div>';
          echo '<div class="sg-source">';
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
      <h1 class="sg-heading-primary">Pattern Styles</h1>
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
          echo '<div class="sg-pattern">';
          echo '<div class="sg-display">';
          echo '<h2 class="sg-heading-secondary"><a name="'.$filename.'">'.$title.'</a></h2>';
          include('markup/patterns/'.$file);
          echo '</div>';
          echo '<div class="sg-source">';
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="js/sg-scripts.js"></script>
</body>
</html>