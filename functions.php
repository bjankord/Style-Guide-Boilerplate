<?php

  // Display title of each markup samples as a list item
  function listFilesInFolder($dir) {
    $files = scandir($dir);
    sort($files);

    echo '<ul class="sg-nav-group">';
    foreach ($files as $file) {
      if ($file != '.' && $file != '..') {
        $path = $dir.'/'.$file;
        if (is_dir($path)) {
          echo '<li class="sg-subnav-parent">';
          renderTitleFromPath($path, 'h2');
          listFilesInFolder($path);
          echo '</li>';
        } else {
          echo '<li>';
          renderTitleFromPath($path, '');
          echo '</li>';
        }
      }
    }
    echo '</ul>';
  }

  // Scan specified directory recursively and render files
  function renderFilesInFolder($dir) {
    $files = scandir($dir);
    sort($files);

    echo '<div class="sg-section-group">';
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
          $path = $dir.'/'.$file;
          if (is_dir($path)) {
            renderTitleFromPath($path, 'h1');
            renderFilesInFolder($path);
          } else {
            renderFile($path);
          }
        }
    }
    echo '</div>';
  }

  function renderTitleFromPath($path, $parent) {
    $unwantedChars = array("/", "-", "_", ".");
    $filename = pathinfo($path, PATHINFO_FILENAME); // filename without extension
    $filename = str_replace($unwantedChars, " ", $filename);
    $id = str_replace($unwantedChars, "-", $path);

    if ($parent) {
      echo '<'.$parent.' id="sg-'.$id.'" class="sg-'.$parent.' sg-title">'.$filename.'</'.$parent.'>';
    } else {
      echo '<a href="#sg-'.$id.'">'.$filename.'</a>';
    }
  }

  function renderFile($path) {
    $content = file_get_contents($path);
    echo '<div class="sg-section">';
    renderTitleFromPath($path, 'h2');
    renderFileDoc($path);
    renderFileExample($content);
    renderFileSource($content);
    echo '</div>';
  }

  function renderFileDoc($path) {
    $documentation = 'doc'.strstr($path, "/");
    if (file_exists($documentation)) {
      echo '<div class="sg-sub-section sg-doc">';
      echo '<h3 class="sg-h3 sg-title">Usage</h3>';
      include($documentation);
      echo '</div>';
    }
  }

  function renderFileExample($content) {
    if ($content != '') {
      echo '<div class="sg-sub-section sg-example">';
      echo '<h3 class="sg-h3 sg-title">Example</h3>';
      echo $content;
      echo '</div>';
    }
  }

  function renderFileSource($content) {
    if ($content != '') {
      echo '<div class="sg-sub-section">';
      echo '<div class="sg-markup-controls">';
      echo '<button type="button" class="sg-btn sg-btn--source">View Source</button>';
      echo '<a class="sg-btn--top" href="#top">Back to Top</a>';
      echo '</div>';
      echo '<div class="sg-source">';
      echo '<button type="button" class="sg-btn sg-btn--select">Copy Source</button>';
      echo '<pre class="line-numbers"><code class="language-markup">';
      echo htmlspecialchars($content);
      echo '</code></pre>';
      echo '</div>';
      echo '</div>';
    }
  }
?>
