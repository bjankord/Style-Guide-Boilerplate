const generatedFonts =  () => `<!-- Manually add your fonts here. -->
<!-- Maybe just have this be injected HTML and then make a web component people can use or they can edit the HTML inject to whatever they want -->
<div class="sg-font-stacks sg-section">
  <h2 id="sg-fontStacks" class="sg-h2">Font Stacks</h2>
  <dl class="sg-font-list">
    <dt>Primary Font:</dt>
    <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

    <dt>Primary Font Italic:</dt>
    <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif; font-style: italic;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

    <dt>Primary Font Bold:</dt>
    <dd style='font-family: "HelveticaNeue", Helvetica, Arial, sans-serif; font-weight: 800;'>"HelveticaNeue", Helvetica, Arial, sans-serif;</dd>

    <dt>Secondary Font:</dt>
    <dd style='font-family: Georgia, Times, "Times New Roman", serif;'>Georgia, Times, "Times New Roman", serif;</dd>

    <dt>Secondary Font Italic:</dt>
    <dd style='font-family: Georgia, Times, "Times New Roman", serif; font-style: italic;'>Georgia, Times, "Times New Roman", serif;</dd>

    <dt>Secondary Font Bold:</dt>
    <dd style='font-family: Georgia, Times, "Times New Roman", serif; font-weight: 800;'>Georgia, Times, "Times New Roman", serif;</dd>
  </dl>
  <div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
</div><!--/.sg-font-stacks-->`;

module.exports = generatedFonts;