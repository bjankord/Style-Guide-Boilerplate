const fs = require('fs').promises;
const fse = require('fs-extra');
const path = require('path');
const prismPkg = require('prismjs/package.json');
const githubMarkdownCssPkg = require('github-markdown-css/package.json');
const pkg = require('../package.json');
const makeDir = require('./utils/makeDir');
const templateBuilder = require('./templateBuilder');

module.exports = async (config) => {
  console.info('Building style-guide-boilerplate files...');
  const buildDirectory = config.buildDir || 'sgbBuild';

  // Generate build directory and related child directories
  try {
    await makeDir(buildDirectory);
    await makeDir(path.join(process.cwd(), buildDirectory));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-css'));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-js'));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-vendor'));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-vendor', 'prism'));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-vendor', 'github-markdown-css'));
    await makeDir(path.join(process.cwd(), buildDirectory, 'sg-images'));
  } catch (err) {
    throw new Error(err);
  }

  // Vendor assets
  const prismDir = path.dirname(require.resolve('prismjs'));
  const prismStyles = path.join(prismDir, 'themes', 'prism.css');
  const prismStylesBuildPath = path.join(process.cwd(), buildDirectory, 'sg-vendor', 'prism', `prism-${prismPkg.version}.css`);
  const prismScripts = path.join(prismDir, 'prism.js');
  const prismScriptsBuildPath = path.join(process.cwd(), buildDirectory, 'sg-vendor', 'prism', `prism-${prismPkg.version}.js`);

  const githubMarkdownStylesDir = path.dirname(require.resolve('github-markdown-css'));
  const githubMarkdownStyles = path.join(githubMarkdownStylesDir, 'github-markdown.css');
  const githubMarkdownStylesBuildPath = path.join(process.cwd(), buildDirectory, 'sg-vendor', 'github-markdown-css', `github-markdown-${githubMarkdownCssPkg.version}.css`);

  // CSS assets path
  const sgStyles = path.join(__dirname, 'assets', 'sg-css', 'sg-style.css');
  const sgStylesBuildPath = path.join(process.cwd(), buildDirectory, 'sg-css', `sg-style-${pkg.version}.css`);

  // JS assets paths
  const sgScripts = path.join(__dirname, 'assets', 'sg-js', 'sg-scripts.js');
  const sgScriptsBuildPath = path.join(process.cwd(), buildDirectory, 'sg-js', `sg-scripts-${pkg.version}.js`);

  // Image asset paths
  const videoPoster = path.join(__dirname, 'assets', 'sg-images', 'video-poster.jpg');
  const videoPosterBuildPath = path.join(process.cwd(), buildDirectory, 'sg-images', 'video-poster.jpg');

  // Copy over custom static assets to build directory
  if (config.staticAssetsDirs && config.staticAssetsDirs.length) {
    config.staticAssetsDirs.forEach((dir) => {
      fse.copy(dir, path.join(config.buildDir, dir))
        .then(() => console.info(`Copying static assets from ${dir} to ${path.join(config.buildDir, dir)}!`))
        .catch((err) => { throw new Error(err); });
    });
  }

  try {
    // Copy CSS assets
    await fs.copyFile(sgStyles, sgStylesBuildPath);
    await fs.copyFile(githubMarkdownStyles, githubMarkdownStylesBuildPath);
    await fs.copyFile(prismStyles, prismStylesBuildPath);

    // Copy JS assets
    await fs.copyFile(sgScripts, sgScriptsBuildPath);
    await fs.copyFile(prismScripts, prismScriptsBuildPath);

    // Copy Image assets
    await fs.copyFile(videoPoster, videoPosterBuildPath);
  } catch (err) {
    throw new Error(err);
  }

  try {
    // write index.html to build directory
    const template = await templateBuilder(config);
    const data = template;
    await fs.writeFile(path.join(buildDirectory, 'index.html'), data);
    console.info('Build complete!');
  } catch (err) {
    throw new Error(err);
  }

  // TODO - look into what spawn.sync is
  // result = spawn.sync(
  //   "webpack",
  //   ["--config", prodConfig, "--progress"],
  //   { stdio: "inherit" }
  // );
};
