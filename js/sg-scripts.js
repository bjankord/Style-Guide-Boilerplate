/**
 * sg-scripts.js
 */
(function (document, undefined) {

  // Add js class to body
  $('body').addClass('js');

  // Cut the mustard
  if( "querySelector" in document && document.addEventListener ){

    // Init prettyprint
    prettyPrint();

    function selectText(node) {
      var doc = document,
          range,
          selection;

      if (doc.body.createTextRange) {
          range = doc.body.createTextRange();
          range.moveToElementText(node);
          range.select();
      } else if (window.getSelection) {
          selection = window.getSelection();
          range = doc.createRange();
          range.selectNodeContents(node);
          selection.removeAllRanges();
          selection.addRange(range);
      }
    }

    // Toggle source code visibility
    function toggleSource() {
      $(this).parent().next('.sg-source').toggleClass('is-active');
    }

    // Highlight source code to be copy to clipboard
    function highlightSource() {
      selectText(this.nextSibling);
      $(this).toggleClass('is-active');
    }

    $(document)
      .on('click', '.sg-btn--source', toggleSource)
      .on('click', '.sg-btn--select', highlightSource);
  }

 })(document);
