const fs = require('fs').promises;
const prismPkg = require('prismjs/package.json');
const pkg = require('../../package.json');

const generatedFooter = async (config) => {
  const customFooter = async () => {
    let customFooterContent = '';
    if (config.customFooter) {
      try {
        customFooterContent = await fs.readFile(config.customFooter, 'utf8');
      } catch (err) {
        throw new Error(err);
      }
    }
    return customFooterContent;
  };

  return `<script src="sg-vendor/prism/prism-${prismPkg.version}.js"></script>
<script src="sg-js/sg-scripts-${pkg.version}.js"></script>
${await customFooter()}`;
};

module.exports = generatedFooter;
