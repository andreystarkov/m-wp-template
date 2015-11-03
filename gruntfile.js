module.exports = function(grunt) {

  grunt.initConfig({
    ftpsync: {
      local: './dist/',
      remote: '/www/dev.m-vkusno.ru/wp-content/themes/m-restorator',
      host: "m-vkusno.ru",
      port: 21,
      user: "vkusno",
      pass: "sYr65g@_",
      connections: 1,
      ignore: [
        ".htaccess"
      ]
    },
  });

  grunt.loadNpmTasks('grunt-ftpsync');

  grunt.registerTask('default');
};