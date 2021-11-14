const fs = require('fs').promises;
const exists = require('./exists');

module.exports = async(dir) => {
  try {
    // generate directory if one does not exist
    if (!await exists(dir)){
      await fs.mkdir(dir);
    }
  } catch(err) {
    throw new Error(err);
  }

}