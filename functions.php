<?php

  // Display title of each markup samples as a list item
  function listMarkupAsListItems ($type) {
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
        if($type === 'pages'):
          echo '<li><a href="markup/pages/'.$filename.'.html" target="_blank">'.$title.'</a></li>';
        else:
          echo '<li><a href="#sg-'.$filename.'">'.$title.'</a></li>';
        endif;
    endforeach;
  }

  // Display markup view and source
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
        $documentation = 'doc/'.$type.'/'.$file;
        echo '<div class="sg-markup sg-section">';
        echo '<div class="sg-display">';
        echo '<h2 id="sg-'.$filename.'" class="sg-h2">'.$title.'</h2>';
        if (file_exists($documentation)) {
          echo '<div class="sg-doc">';
          echo '<h3 class="sg-h3">Usage</h3>';
          include($documentation);
          echo '</div>';
        }
        echo '<h3 class="sg-h3">Example</h3>';
        include('markup/'.$type.'/'.$file);
        echo '</div>';
        echo '<div class="sg-markup-controls"><button type="button" class="sg-btn sg-btn--source">View Source</button> <a class="sg-btn--top" href="#top">Back to Top</a></div>';
        echo '<div class="sg-source sg-animated">';
        echo '<button type="button" class="sg-btn sg-btn--select">Copy Source</button>';
        echo '<pre class="line-numbers"><code class="language-markup">';
        echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
        echo '</code></pre>';
        echo '</div>';
        echo '</div>';
    endforeach;
  }
?>
