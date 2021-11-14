const fs = require('fs');
const path = require('path');
const exists = require('../utils/exists');

const generatedNav = () => {
const markupDirecorty = path.join(process.cwd(), 'markup');
const baseDirecorty = path.join(markupDirecorty, 'base');
const patternsDirecorty = path.join(markupDirecorty, 'patterns');
let nav = '';

/**
 * Takes directory path and returns an object to be used for navigation link structure
 * @param {string} dir
 * @returns {Object}
 */
const buildLinksFromFileNames = (dir) => {
  let fileNames;
  try {
    fileNames = fs.readdirSync(dir);
  } catch (err) {
    console.log(err);
  }

  const buildUrlAnchor = (fileName) => {
    const cleanedFileName = fileName.replace('.html', '');
    return `#${cleanedFileName}`;
  }

  const buildUrlText = (fileName) => {
    const cleanedFileName = fileName
      .replace('.html', '')
      .replace(/-/g, ' ')
      .replace(/-/g, ' ');
    return cleanedFileName;
  }

  const links = fileNames.map(file => ({
    url: buildUrlAnchor(file),
    text: buildUrlText(file),
  }))

  return links;
}

const renderNavSection = (sectionName, links) => {
  const generatedLinks = links.map(link =>  `<li>
  <a href="${link.url}">${link.text}</a>
</li>`).join('\r\n');

  return `${'\r\n'}<h2 class="sg-h2 sg-subnav-title">${sectionName}</h2>
<ul class="sg-nav-group">
  ${generatedLinks}
</ul>`;
};

if (exists(markupDirecorty)) {
  if (exists(baseDirecorty)) {
    const baseLinks = buildLinksFromFileNames(baseDirecorty);
    nav += `${renderNavSection('Base', baseLinks)}`;
  } else {
    console.log('No base directory found inside of the markup directory in root directory of the project');
  }

  // Patterns directory is optional
  if (exists(patternsDirecorty)) {
    const patternLinks = buildLinksFromFileNames(patternsDirecorty);
    nav += `${renderNavSection('Base', patternLinks)}`;
  }
} else {
  console.log('No markup directory found in root directory of the project');
}

return `<div id="nav" class="sg-sidebar" role="navigation">
  <!-- TODO Make this auto generated intro nav based on config -->
  <h2 class="sg-h2 sg-subnav-title">About</h2>
  <ul class="sg-nav-group">
    <li>
      <a href="#sg-about">Getting Started</a>
    </li>
    <li>
      <a href="#sg-colors">Colors</a>
    </li>
    <li>
      <a href="#sg-fontStacks">Fonts</a>
    </li>
  </ul>
${nav}
</div><!--/.sg-sidebar-->`;
};

module.exports = generatedNav;