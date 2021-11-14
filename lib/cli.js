const config = require('./config');
const start = require('./start');
const build = require('./build');
const watch = require('./watch');

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
      console.info('start');
      try {
        await build(config);
        watch();
      } catch (err) {
        throw new Error(err);
      }
      // result = spawn.sync(
      //   "webpack-dev-server",
      //   ["--config", devConfig, "--progress"],
      //   { stdio: "inherit" }
      // );
      break;
    }
    case "build": {
      try {
        await build(config);
      } catch (err) {
        throw new Error(err);
      }
      break;
    }
    default:
      console.warn(`Unknown script "${task}".`);
  }

  if (result?.signal) {
    process.exit(1);
  }

  process.exit(result?.status);
};
