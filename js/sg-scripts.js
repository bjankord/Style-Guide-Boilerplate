/**
 * sg-scripts.js
 */
(function (document, undefined) {
  "use strict";

  // Add js class to body
  document.getElementsByTagName('body')[0].className+=' js';


  // Add functionality to toggle classes on elements
  var hasClass = function (el, cl) {
      var regex = new RegExp('(?:\\s|^)' + cl + '(?:\\s|$)');
      return !!el.className.match(regex);
  },

  addClass = function (el, cl) {
      el.className += ' ' + cl;
  },

  removeClass = function (el, cl) {
      var regex = new RegExp('(?:\\s|^)' + cl + '(?:\\s|$)');
      el.className = el.className.replace(regex, ' ');
  },

  toggleClass = function (el, cl) {
      hasClass(el, cl) ? removeClass(el, cl) : addClass(el, cl);
  };

  var selectText = function(text) {
      var doc = document,
          range,
          selection = window.getSelection();

      if (doc.body.createTextRange) {
          range = doc.body.createTextRange();
          range.moveToElementText(text);
          range.select();
      } else if (window.getSelection) {
          range = doc.createRange();
          range.selectNodeContents(text);
          selection.removeAllRanges();
          selection.addRange(range);
      }
  };


  // Cut the mustard
  if ( !Array.prototype.forEach ) {
    
    // Add legacy class for older browsers
    document.getElementsByTagName('body')[0].className+=' legacy';

  } else {

    // View Source Toggle
    [].forEach.call( document.querySelectorAll('.sg-btn--source'), function(el) {
      el.onclick = function() {
        var that = this;
        var sourceCode = that.parentNode.nextElementSibling;
        toggleClass(sourceCode, 'is-active');
        return false;
      };
    }, false);

    // Select Code Button
    [].forEach.call( document.querySelectorAll('.sg-btn--select'), function(el) {
      el.onclick = function() {
        selectText(this.nextSibling);
        toggleClass(this, 'is-active');
        return false;
      };
    }, false);
  }

  
  // Opera Mini has trouble with some enhancements
  // So this allows us to cut mustard
  if (!window.operamini) {
     // Init prettyprint
    prettyPrint();
  }
  else {
  // Add operamini class to body
   document.getElementsByTagName('body')[0].className+=' operamini';
  }
 
 })(document);