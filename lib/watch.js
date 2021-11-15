// const crypto = require('crypto');
// const fs = require('fs');
// const watch = require('node-watch');
const path = require('path');
const chokidar = require('chokidar');

const watch = () => {
  console.log('start watcher');
  // Watches file, dir, glob, or array
  const sgbConfig = path.join(process.cwd(), 'sgb.config.js');
  const watcher = chokidar.watch(sgbConfig, {
    persistent: true,
  });

  watcher
    .on('add', (filePath) => console.log(`File ${filePath} has been added`))
    .on('change', (filePath) => console.log(`File ${filePath} has been changed`))
    .on('unlink', (filePath) => console.log(`File ${filePath} has been removed`));
};

// const watcher = () => {
//   const sgbConfig = path.join(process.cwd(), 'sgb.config.js');
//   console.log(`Watching for changes to ${sgbConfig}`);
//   watch(sgbConfig, { recursive: true }, (evt, name) => {
//     console.log('%s changed.', name);
//   });
// };
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

// watch();

module.exports = watch;
