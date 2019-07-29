const CopyWebpackPlugin = require("copy-webpack-plugin");

module.exports = function override(config, env) {
  if (!config.plugins) {
    config.plugins = [];
  }

  // config.plugins.push("babel-plugin-styled-components");
  config.plugins.push(
    process.env.NODE_ENV === "production"
      ? new CopyWebpackPlugin([{ from: "src/logo.svg" }])
      : new CopyWebpackPlugin([{ from: "src/logo.svg", to: "build" }])
  );

  return config;
};
