const path = require('path');
const resolveFrom = require('resolve-from');

// Optional config
const configFileName = 'sgb.config.js';
const configPath = resolveFrom.silent(process.cwd(), configFileName) || path.join(process.cwd(), configFileName);

let config = {
  noCustomConfig: true,
};

if (configPath) {
  config = require(configPath);
}

module.exports = config;
