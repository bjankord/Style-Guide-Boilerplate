module.exports = (config) => {
  const title = config.title || '<span class="sg-logo-initials">SG</span><span class="sg-logo-full">STYLE GUIDE</span> <em>BOILERPLATE</em>';
  return `<a href="#main" class="sg-visually-hidden sg-visually-hidden-focusable">Skip to main content</a>
<div id="top" class="sg-header" role="banner">
  <div class="sg-container">
    <h1 class="sg-logo">${title}</h1>
    <button type="button" class="sg-nav-toggle">Menu</button>
  </div>
</div>`;
};
