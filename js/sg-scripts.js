/**
 * sg-scripts.js
 */
(function (w, undefined) {
  "use strict";

  var d = w.document,
      docEl = d.documentElement,
      sg = {};
    
    // Kicks off out style guide boilerplate js
    sg.init = function() {
      // Cut the mustard
      if ( !Array.prototype.forEach || w.operamini) {
        return;
      } else {
        this.jsEnabled();
        this.toggleSource();
        this.selectCode();
      }
    };


    // Add js class to body
    sg.jsEnabled = function() {
      Apollo.removeClass(docEl, 'no-js');
      Apollo.addClass(docEl, 'js');
    };
    

    // Toggles source code example
    sg.toggleSource = function() {
      
      // Util function for toggling source code examples
      var toggler = function() {
        var sourceCode = this.parentNode.nextElementSibling;
        Apollo.toggleClass(sourceCode, 'is-active');
      };

      // Loops through all "View Source" buttons and attaches toggler function on click
      [].forEach.call( d.querySelectorAll('.sg-btn--source'), function(el) {
        el.addEventListener("click", toggler, false);
      }, false);
    };


    // Toggles source code to be copied
    sg.selectCode = function() {
      
      // Util function to select text for copying to clipboard
      var selectText = function(text) {
        var range,
            selection = w.getSelection();

        if (d.body.createTextRange) {
            range = d.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (w.getSelection) {
            range = d.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
      };
      

      // Util function for toggling selected text to be copied
      var toggler = function() {
        selectText(this.nextSibling);
        Apollo.toggleClass(this, 'is-active');
      };

      // Loops through all "Copy Source" buttons and attaches toggler function on click
      [].forEach.call( d.querySelectorAll('.sg-btn--select'), function(el) {
        el.addEventListener("click", toggler, false);
      }, false);

    };
   
    w.sg = sg;
 
 })(this);