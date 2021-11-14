const head = require('./templates/head');
const header = require('./templates/header');
const nav = require('./templates/nav');
const intro = require('./templates/intro');
const colors = require('./templates/colors');
const fonts = require('./templates/fonts');
const markup = require('./templates/markup');
const scripts = require('./templates/scripts');

const buildTemplate = async() => {
  try {
    const html = `<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
${head()}
</head>
<body>
${header()}
<div class="sg-wrapper sg-clearfix">
${nav()}
<div id="main" class="sg-main" role="main">
<div class="sg-container">
<div class="sg-info">
<div class="sg-about sg-section">
${intro()}
</div>
${colors()}
${fonts()}
</div>
${await markup('base')}
${await markup('patterns')}
</div>
</div>
${scripts()}
</body>
</html>
`;

  return html;
  } catch(err) {
    throw new Error(err);
  }

}

module.exports = buildTemplate;
