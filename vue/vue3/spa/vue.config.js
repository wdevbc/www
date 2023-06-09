const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
  transpileDependencies: true,
});
module.exports = {
  publicPath: process.env.BASE_URL,
  devServer: {
    compress: true,
    allowedHosts: "all",
    host: "0.0.0.0",
    port: process.env.VUE_APP_PORT,
  },
};