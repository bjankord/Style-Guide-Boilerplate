const head = require('./templates/head');
const header = require('./templates/header');
const nav = require('./templates/nav');
const customDocs = require('./templates/customDocs');
const markup = require('./templates/markup');
const footer = require('./templates/footer');

const buildTemplate = async (config) => {
  const lang = config.lang || 'en';
  const htmlClasses = config.htmlClasses || '';
  try {
    const html = `<!DOCTYPE html>
<html lang="${lang}" class="no-js ${htmlClasses}">
<head>
${await head(config)}
</head>
<body>
${header(config)}
<div class="sg-wrapper sg-clearfix">
${nav(config)}
<main id="main" class="sg-main">
<div class="sg-container">
${await customDocs(config)}
${await markup(config, 'base')}
${await markup(config, 'patterns')}
</main>
</div>
${await footer(config)}
</body>
</html>`;

    return html;
  } catch (err) {
    throw new Error(err);
  }
};

module.exports = buildTemplate;
