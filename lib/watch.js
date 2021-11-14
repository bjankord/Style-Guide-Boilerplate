// const crypto = require('crypto');
// const fs = require('fs');
const path = require('path');
const watch = require('node-watch');

const watcher = () => {
  const sgbConfig = path.join(process.cwd(), 'sgb.config.js');
  console.log(`Watching for changes to ${sgbConfig}`);
  watch(sgbConfig, { recursive: true }, (evt, name) => {
    console.log('%s changed.', name);
  });
};
/*
const watch = () => {
  const buttonPressesLogFile = path.join(process.cwd(), 'sgb.config.js');
  console.log('Watching files for changes');

  let md5Previous = null;
  let fsWait = false;
  fs.watch(buttonPressesLogFile, (event, filename) => {
    if (filename) {
      if (fsWait) return;
      fsWait = setTimeout(() => {
        fsWait = false;
      }, 100);
      const md5Current = crypto.createHash('md5').update(fs.readFileSync(buttonPressesLogFile)).digest('hex');
      if (md5Current === md5Previous) {
        return;
      }
      md5Previous = md5Current;
      console.log(`${filename} file Changed`);
    }
  });
};
*/

// watcher();

module.exports = watcher;
