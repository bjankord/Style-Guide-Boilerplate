const fs = require('fs').promises;
const path = require('path');
const escapeHtml = require('escape-html');
const marked = require('marked');
const exists = require('../utils/exists');


const generatedMarkup = async(type) => {
  const markupDirecorty = path.join(process.cwd(), 'markup');
  const baseMarkupDirecorty = path.join(markupDirecorty, 'base');
  const patternsMarkupDirecorty = path.join(markupDirecorty, 'patterns');
  const docsDirecorty = path.join(process.cwd(), 'doc');
  const baseDocsDirecorty = path.join(markupDirecorty, 'base');
  const patternsDocsDirecorty = path.join(markupDirecorty, 'patterns');


  const renderTitleFromPath = (filePath) => {
    // Match with separators on *nix
    const unixFileMatch = filePath.match(/markup\/(.*)/);
    // todo check if this works on windows
    const windowsFileMatch = filePath.match(/markup\\(.*)/);
    const relativeMarkupPath = unixFileMatch || windowsFileMatch;
    const id = relativeMarkupPath[1]
      .replace('.html', '')
      .replace(/\//g, '')
      .replace(/\\/g, '')
      .replace('base', '')
      .replace('patterns', '');
    const title = id.replace(/-/g, ' ')
      .replace(/_/g, ' ');
      // todo figure out how to cross OS determine subsection
      // windows may not return / in file path string
      let subSection;
      if (relativeMarkupPath[1].includes('base/')) {
        subSection = 'base';
      }

      if (relativeMarkupPath[1].includes('pattern/')) {
        subSection = 'pattern';
      }

    return `<h2 id="sg-markup-${subSection}-${id}-html" class="sg-h2 sg-title">${title}</h2>`;
  };

  const renderMarkdownDoc = async(filePath) => {
    const isBaseDoc = filePath.includes(path.join('markup', 'base'));
    const isPatternsDoc = filePath.includes(path.join('markup', 'patterns'));
    const baseDocPath = path.join(process.cwd(), 'doc', 'base');
    const patternsDocPath = path.join(process.cwd(), 'doc', 'patterns');

    const markdownMarkup = (markdownContent) => `<div class="sg-sub-section sg-doc">
<div class="markdown-body">
    ${markdownContent}</div>
</div>`;

    if (isBaseDoc && exists(baseDocsDirecorty)) {
      try {
        const relativeMarkupPath = filePath.match(/markup\/(.*)/);
        const fileName = relativeMarkupPath[1]
          .replace('.html', '.md')
          .replace(/\//g, '')
          .replace(/\\/g, '')
          .replace('base', '');


        const markdownDocPath = path.join(baseDocPath, fileName);

        const fileData = await fs.readFile(markdownDocPath, 'utf8');

        // sanitize incoming MD files
        // const sanitizedFileData = sanitizeHtml(fileData);
        return markdownMarkup(marked.parse(fileData));
      } catch(err) {
        throw new Error(err);
      }
    }

    if (isPatternsDoc && exists(patternsDocsDirecorty)) {
      try {
        const relativeMarkupPath = filePath.match(/markup\/(.*)/);
        const fileName = relativeMarkupPath[1]
          .replace('.html', '.md')
          .replace(/\//g, '')
          .replace(/\\/g, '')
          .replace('patterns', '');

        const markdownDocPath = path.join(patternsDocPath, fileName);
        const fileData = await fs.readFile(markdownDocPath, 'utf8');

        // sanitize incoming MD files
        // const sanitizedFileData = sanitizeHtml(fileData);
        return markdownMarkup(marked.parse(fileData));
      } catch(err) {
        throw new Error(err);
      }
    }
  };

  const renderHtmlMarkup = async (path) => {
    try {
      const fileData = await fs.readFile(path, 'utf8');
      const fileExt = path.split('.').pop();

      if (fileExt === 'html') {
        // sanitize incoming HTML files
        // const sanitizedFileData = sanitizeHtml(fileData);

        return `<div class="sg-sub-section sg-example">
        <h3 class="sg-h3 sg-title">Example</h3>
        ${fileData}
      </div>`;
      }
    } catch(err) {
      throw new Error(err);
    }
  };

  const renderHtmlSource = async (path) => {
    try {
      const fileData = await fs.readFile(path, 'utf8');
      const fileExt = path.split('.').pop();

      if (fileExt === 'html') {
        // escape incoming HTML files
        const escapedHtml = escapeHtml(fileData);

        return `<div class="sg-sub-section">
    <div class="sg-markup-controls">
      <button type="button" class="sg-btn sg-btn--source">View Source</button>
      <a class="sg-btn--top" href="#top">Back to Top</a>
    </div>
    <div class="sg-source">
    <button type="button" class="sg-btn sg-btn--select">Copy Source</button>
    <pre class="line-numbers language-markup">${escapedHtml}</pre>
    </div>
  </div>`;
      }
    } catch(err) {
      throw new Error(err);
    }
  };

  const renderMarkupSection = async(path) => {
    try {
      const markupSection = `<div class="sg-section">
      ${renderTitleFromPath(path)}
      ${await renderMarkdownDoc(path)}
      ${await renderHtmlMarkup(path)}
      ${await renderHtmlSource(path)}
      </div>`;

      // ${await renderMarkdownDoc(path)}

      return markupSection;
    } catch (err) {
      throw new Error(err);
    }
  };

/**
 * Takes options directory path and returns an object to be used for navigation link structure
 * @param {Object} options
 * @returns {Object}
 */
const buildDataFromFileNames = async(options) => {
  let fileNames;
  try {
    // Get file names from directory
    fileNames = await fs.readdir(options.dir);

    // Generate full path of file name
    const fullPaths = fileNames.map(fileName => path.join(options.dir, fileName))

    // Generate array of markup from files in directory
    const fileMarkup = await Promise.all(fullPaths.map(async(path) => await renderMarkupSection(path)));

    // Convert markup array into string
    const fileMarkupString = fileMarkup.join('');
    return fileMarkupString;
  } catch (err) {
    throw new Error(err);
  }
}

// Markup string to be used in HTML template
let markup = '';
if (exists(markupDirecorty)) {
  if (type === 'base') {
    if (exists(baseMarkupDirecorty)) {
    const baseOptions = {
      name: 'base',
      dir: baseMarkupDirecorty,
    }
      // Append base markup to existing markup string
      markup += `<h1 id="sg-markup-patterns" class="sg-h1 sg-title">Base</h1>
      <div class="sg-section-group">${await buildDataFromFileNames(baseOptions)}</div>`;
    } else {
      console.log('No base directory found inside of the markup directory in root directory of the project');
    }
  }

  if (type === 'patterns') {
    if (exists(patternsMarkupDirecorty)) {
      const patternsOptions = {
        name: 'patterns',
        dir: patternsMarkupDirecorty,
      }

      // Append patterns markup to existing markup string
      markup += `<h1 id="sg-markup-patterns" class="sg-h1 sg-title">Patterns</h1>
      <div class="sg-section-group">${await buildDataFromFileNames(patternsOptions)}</div>`;
    }
  }
}

return `<div class="sg-section-group">
${markup}
</div>`;
};

module.exports = generatedMarkup;