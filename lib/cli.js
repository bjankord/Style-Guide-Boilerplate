const fs = require('fs').promises;
const path = require('path');
const resolveFrom = require('resolve-from');
const makeDir = require('./utils/makeDir');
const templateBuilder = require('./templateBuilder');

// Optional config
const configFileName = 'sgb.config.js';
const configPath = resolveFrom.silent(process.cwd(), configFileName) || path.join(process.cwd(), configFileName);

let config = {};

if (configPath) {
  config = require(configPath);
}

console.log(config);

/**
 * Usage
  “scripts”: {
    “dev”: “sgb start”, // this starts the development server
    “build”: “sgb build” // this builds style-guide-boilerplate as a static HTML page
  }
 */

/**
 * @param argv
 * @returns {Promise}
 */
module.exports = async (argv) => {
  let result;
  const task = argv[0];
  switch (task) {
    case "start": {
      console.log('start');
      // result = spawn.sync(
      //   "webpack-dev-server",
      //   ["--config", devConfig, "--progress"],
      //   { stdio: "inherit" }
      // );
      break;
    }
    case "build": {
      console.log('Building style-guide-boilerplate files...');
      const buildDirectory = config.buildDir || 'sgbBuild';

      // Generate build directory
      try {
        await makeDir(buildDirectory);
      } catch (err) {
        throw new Error(err);
      }

      // CSS assets path
      const sgStyles = path.join(__dirname, 'assets', 'css', 'sg-style.css');
      const sgStylesBuildPath = path.join(process.cwd(), buildDirectory, 'css', 'sg-style.css');
      const githubMarkdownStyles = path.join(__dirname, 'assets', 'css', 'github-markdown.css');
      const githubMarkdownStylesBuildPath = path.join(process.cwd(), buildDirectory, 'css', 'github-markdown.css');
      const prismStyles = path.join(__dirname, 'assets', 'vendor', 'prism', 'prism.css');
      const prismStylesBuildPath = path.join(process.cwd(), buildDirectory, 'vendor', 'prism', 'prism.css');

      // JS assets paths
      const sgScripts = path.join(__dirname, 'assets', 'js', 'sg-scripts.js');
      const sgScriptsBuildPath = path.join(process.cwd(), buildDirectory, 'js', 'sg-scripts.js');
      const prismScripts = path.join(__dirname, 'assets', 'vendor', 'prism', 'prism.js');
      const prismScriptsBuildPath = path.join(process.cwd(), buildDirectory, 'vendor', 'prism', 'prism.js');

      // Image asset paths
      const videoPoster = path.join(__dirname, 'assets', 'images', 'video-poster.jpg');
      const videoPosterBuildPath = path.join(process.cwd(), buildDirectory, 'images', 'video-poster.jpg');

      try {
        // Create asset directories in build directory
        await makeDir(path.join(process.cwd(), buildDirectory));
        await makeDir(path.join(process.cwd(), buildDirectory, 'css'));
        await makeDir(path.join(process.cwd(), buildDirectory, 'js'));
        await makeDir(path.join(process.cwd(), buildDirectory, 'vendor'));
        await makeDir(path.join(process.cwd(), buildDirectory, 'vendor', 'prism'));
        await makeDir(path.join(process.cwd(), buildDirectory, 'images'));

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
        const template = await templateBuilder();
        const data = template;
        await fs.writeFile(path.join(buildDirectory, 'index.html'), data);
        console.log('Build complete!');
      } catch (err) {
        throw new Error(err);
      }
      // TODO - look into what spawn.sync is
      // result = spawn.sync(
      //   "webpack",
      //   ["--config", prodConfig, "--progress"],
      //   { stdio: "inherit" }
      // );
      break;
    }
    default:
      console.log(`Unknown script "${task}".`);
  }

  if (result?.signal) {
    process.exit(1);
  }

  process.exit(result?.status);
};
