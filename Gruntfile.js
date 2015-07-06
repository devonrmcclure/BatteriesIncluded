module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: 'www/css/less/*',
                tasks: ['less:development']
            },
            js: {
                files: 'www/js/app/*',
                tasks: ['browserify']
            }
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
        },
        browserify: {
            options: {},
            'www/js/app.js': ['www/js/app/**/*.js']
        }
    });


    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-browserify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build-dev', ['less:development']);
    grunt.registerTask('build-prod', ['less:production']);

};