const fs = require('fs').promises;

const customDocs = async (config) => {
  const docs = async () => {
    let docsContent = '';
    if (config.customDocs) {
      try {
        docsContent = await fs.readFile(config.customDocs, 'utf8');
      } catch (err) {
        throw new Error(err);
      }
    }
    return docsContent;
  };

  return `${await docs()}`;
};

module.exports = customDocs;
