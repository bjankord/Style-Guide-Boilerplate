const config = require('./config');
const build = require('./build');
// const watch = require('./watch');

module.exports = async () => {
  try {
    await build(config);
  } catch (err) {
    throw new Error(err);
  }

  // try {
  //   require('./watch');
  // } catch (err) {
  //   throw new Error(err);
  // }
};
