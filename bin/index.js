#!/usr/bin/env node

// require('../lib/cli')(process.argv.slice(2));
const path = require('path');
const child_process = require('child_process');
const watch = require('../lib/watch');

const config = require('../lib/config');
const start = require('../lib/start');
const build = require('../lib/build');

const serve = () => {};

const main = async (argv) => {
  const task = argv[0];
  console.log(task);
  console.log('main');

  if (task.toLowerCase() === 'serve') {
    try {
      await build(config);
      // serve();
      child_process.spawn(
        'node',
        [path.join(process.cwd(), 'lib', 'server.js')],
        { stdio: 'inherit' },
      );
      watch();
    } catch (err) {
      console.error(err);
      process.exit(1);
    }
  }

  if (task.toLowerCase() === 'build') {
    try {
      await build(config);
    } catch (err) {
      console.error(err);
      process.exit(1);
    }
  }
};

const argv = process.argv.slice(2);
main(argv);

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
/*
const main = async (argv) => {
  let result;
  const task = argv[0];
  switch (task) {
    case "start": {
      console.info('start');
      try {
        // await build(config);
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

const arg = process.argv.slice(2)
main(arg);
*/
