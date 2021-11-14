const fs = require('fs').promises;
const prismPkg = require('prismjs/package.json');
const githubMarkdownCssPkg = require('github-markdown-css/package.json');
const pkg = require('../../package.json');

const generatedHead = async (config) => {
  const title = config.title || 'Style Guide Boilerplate';
  const viewport = config.viewport || 'width=device-width, initial-scale=1.0';
  const customHead = async () => {
    let customHeadContent = '';
    if (config.customHead) {
      try {
        customHeadContent = await fs.readFile(config.customHead, 'utf8');
      } catch (err) {
        throw new Error(err);
      }
    }
    return customHeadContent;
  };

  return `<meta charset="utf-8">
<title>${title}</title>
<meta name="viewport" content="${viewport}">
<link rel="stylesheet" href="sg-css/sg-style-${pkg.version}.css">
<link rel="stylesheet" href="sg-vendor/github-markdown-css/github-markdown-${githubMarkdownCssPkg.version}.css">
<link rel="stylesheet" href="sg-vendor/prism/prism-${prismPkg.version}.css">
${await customHead(config)}`;
};

module.exports = generatedHead;
