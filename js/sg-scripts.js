$(document).ready(function() {
  $('body').addClass('js');
  
  // Load up highlight.js
  hljs.tabReplace = '  ';
  hljs.initHighlightingOnLoad();

  // Add functionality for slide in navigation
  var $nav = $('.sg-nav'),
      $navToggle = $('.sg-nav-toggle'),
      $wrap = $('.sg-wrap'),
      $navLinks = $('.sg-nav-inner a');
  
  $navToggle.click(function() {
    $navToggle.toggleClass('active');
    $wrap.toggleClass('active');
      return false;
  });

  $navLinks.click(function() {
    $navToggle.removeClass('active');
    $wrap.removeClass('active');
  });
});