module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: 'www/css/less/*',
                tasks: ['less:development']
            },
        },
        less: {
            development: {
                files: {
                    "www/css/style.css": "www/css/less/main.less"
                }
            },
            production: {
                files: {
                    "www/css/style.css": "www/css/less/main.less"
                },
                compress: true,
            }
        }
    });


    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build-dev', ['less:development']);
    grunt.registerTask('build-prod', ['less:production']);

};