const fs = require('fs').promises;

const exists = async (path) => {
  try {
    await fs.access(path)
    return true
  } catch {
    return false
  }
}

module.exports = exists;