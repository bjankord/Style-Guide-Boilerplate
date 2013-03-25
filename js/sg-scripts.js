/*!
  * domready (c) Dustin Diaz 2012 - License MIT
  */
!function(a,ctx,b){typeof module!="undefined"?module.exports=b():typeof define=="function"&&typeof define.amd=="object"?define(b):ctx[a]=b()}("domready",this,function(a){function m(a){l=1;while(a=b.shift())a()}var b=[],c,d=!1,e=document,f=e.documentElement,g=f.doScroll,h="DOMContentLoaded",i="addEventListener",j="onreadystatechange",k="readyState",l=/^loade|c/.test(e[k]);return e[i]&&e[i](h,c=function(){e.removeEventListener(h,c,d),m()},d),g&&e.attachEvent(j,c=function(){/^c/.test(e[k])&&(e.detachEvent(j,c),m())}),a=g?function(c){self!=top?l?c():b.push(c):function(){try{f.doScroll("left")}catch(b){return setTimeout(function(){a(c)},50)}c()}()}:function(a){l?a():b.push(a)}});


/**
 * Custom JS for Style Guide Boilerplate
 */
domready(function () {

  (function() {
   // Add js class to body
   document.getElementsByTagName('body')[0].className+='js';
   
   // Load up highlight.js
    hljs.tabReplace = '  ';
    hljs.initHighlightingOnLoad();

    // Add functionality for slide in navigation
    var nav = document.getElementById( 'sg-nav' ),
        navItem = nav,
        navToggle = document.getElementById( 'sg-nav-toggle' ),
        wrap = document.getElementById( 'sg-wrap' );
    
    // Toggle active class on navToggle click
    navToggle.onclick = function() {
      if ( -1 != navToggle.className.indexOf( 'active' ) ) {
        navToggle.className = navToggle.className.replace( ' active', '' );
        wrap.className = wrap.className.replace( 'active', '' );
      } else {
        navToggle.className += ' active';
        wrap.className  += ' active';
      }

      return false;
    };

    // Hide navigation when user clicks on nav item
    navItem.onclick = function() {
      navToggle.className = navToggle.className.replace( ' active', '' );
      wrap.className = wrap.className.replace( 'active', '' );
    };
  })();

}); //DomReady
