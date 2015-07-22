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
        echo '<li><a href="#sg-'.$filename.'">'.$title.'</a></li>';
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


<?php
$list = new SplDoublyLinkedList();
function listFilesInFolder($dir) {
  $files = scandir($dir);
  sort($files);

  echo '<ul>';
  foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
      $path = $dir . '/' . $file;

      if (is_dir($path)) {
        echo '<li class="sg-parent">';
        renterTitleFromPath($path, false);
        listFilesInFolder($path);
        echo '</li>';
      } else {
        echo '<li>';
        renterTitleFromPath($path, false);
        echo '</li>';
      }
    }
  }
  echo '</ul>';
}

// Recursively render files in specified directory
function renderFilesInFolder($dir) {
  $files = scandir($dir);
  sort($files);

  var_dump($files);

  echo '<div class="sg-section-group">';
  foreach ($files as $file) {
      if ($file != '.' && $file != '..') {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
          renterTitleFromPath($path, true);
          renderFilesInFolder($path);
        } else {
          renderFile($path);
        }
      }
  }
  echo '</div>';
}

function renterTitleFromPath($path, $isHeader) {
  $needlessChars = array("/", "-", "_", ".");
  $filename = str_replace($needlessChars, " ", basename($path));
  $id = str_replace($needlessChars, "-", $path);

  if ($isHeader) {
    echo '<h2 id="#sg-' . $id . '" class="sg-h2 sg-title">'.$filename.'</h2>';
  } else {
    echo '<a href="#sg-' . $id . '">' . $filename . '</a>';
  }
}

function renderFile($path) {
  $content = file_get_contents($path);
  echo '<div class="sg-section">';
  renderFileTitle($path);
  renderFileDoc($path);
  renderFileExample($content);
  renderFileSource($content);
  echo '</div>';
}

function renderFileTitle($path) {
  echo '<div class="sg-sub-section sg-title">';
  renterTitleFromPath($path, true);
  echo '</div>';
}

function renderFileDoc($path) {
  $documentation = 'doc' . strstr($path, "/");

  if (file_exists($documentation)) {
    echo '<div class="sg-sub-section sg-doc">';
    echo '<h3 class="sg-h3">Usage</h3>';
    include($documentation);
    echo '</div>';
  }
}

function renderFileExample($content) {
  if ($content != '') {
    echo '<div class="sg-sub-section sg-example">';
    echo $content;
    echo '</div>';
  }
}

function renderFileSource($content) {
  if ($content != '') {
    echo '<div class="sg-markup-controls"><button type="button" class="sg-btn sg-btn--source">View Source</button> <a class="sg-btn--top" href="#top">Back to Top</a></div>';
    echo '<div class="sg-source sg-animated">';
    echo '<button type="button" class="sg-btn sg-btn--select">Copy Source</button>';
    echo '<pre class="line-numbers"><code class="language-markup">';
    echo htmlspecialchars($content);
    echo '</code></pre>';
    echo '</div>';
  }
}
?>
