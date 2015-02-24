/**
 * sg-scripts.js
 */
(function (w, undefined) {

  var doc = w.document,
      docEl = doc.documentElement;

  // Cut the mustard
  if (("querySelector" in doc && Array.prototype.forEach) || w.operamini) {

    // Remove no-js class from html element
    docEl.className = docEl.className.replace(/no-js/gi,'');

    // Add js class to html element
    docEl.className+=' js';

    // Init prettyprint
    //prettyPrint();

    // Add functionality to toggle classes on elements
    function hasClass(el, cl) {
      var regex = new RegExp('(?:\\s|^)' + cl + '(?:\\s|$)');
      return !!el.className.match(regex);
    }

    function addClass(el, cl) {
      el.className += ' ' + cl;
    }

    function removeClass(el, cl) {
      var regex = new RegExp('(?:\\s|^)' + cl + '(?:\\s|$)');
      el.className = el.className.replace(regex, ' ');
    }

    function toggleClass(el, cl) {
      hasClass(el, cl) ? removeClass(el, cl) : addClass(el, cl);
    }

    // Toggles source code example
    function toggleSource() {

      // Util function for toggling source code examples
      function toggler() {
        var sourceCode = this.parentNode.nextElementSibling;
        toggleClass(sourceCode, 'is-active');
      }

      // Loops through all "View Source" buttons and attaches toggler function on click
      [].forEach.call( doc.querySelectorAll('.sg-btn--source'), function(el) {
        el.addEventListener("click", toggler, false);
      }, false);
    }


    // Toggles source code to be copied
    function selectCode() {

      // Util function to select text for copying to clipboard
      function selectText(node) {
        var range,
            selection;

        if (doc.body.createTextRange) {
          range = doc.body.createTextRange();
          range.moveToElementText(node);
          range.select();
        } else if (w.getSelection) {
          selection = w.getSelection();
          range = doc.createRange();
          range.selectNodeContents(node);
          selection.removeAllRanges();
          selection.addRange(range);
        }
      }

      // Util function for toggling selected text to be copied
      function toggler() {
        selectText(this.nextSibling);
        toggleClass(this, 'is-active');
      }

      // Loops through all "Copy Source" buttons and attaches toggler function on click
      [].forEach.call( doc.querySelectorAll('.sg-btn--select'), function(el) {
        el.addEventListener("click", toggler, false);
      }, false);

    }


    // Toggles source code to be copied
    function toggleNav() {

      var navToggle = doc.getElementById("sg-nav-toggle");

      // Util function for toggling selected text to be copied
      function toggler( event ) {
        if ( event.preventDefault ) event.preventDefault();
        event.returnValue = false;
        toggleClass(docEl, 'nav-is-active');
        //return false;
      }

      navToggle.addEventListener("click", toggler, false);
    }
  }


  // Init functions
  toggleNav();
  toggleSource();
  selectCode();

 })(this);
