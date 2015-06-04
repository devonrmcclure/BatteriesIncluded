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
        },
        'ftp-deploy': {
          build: {
            auth: {
              host: 'ftp1.ehosting.ca',
              port: 21,
              authKey: 'key1'
            },
            src: '/',
            dest: '/batteriesincluded.ca',
            exclusions: ['www/img/catalog/', '.env.local.php', 'envtemplate.php', 'package.json', 'Gruntfile.js', '.ftppass', '.bowerrc', 'node_modules/', '.gitattributes', '.gitignore', 'bower.json']
          }
        }
    });


    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-ftp-deploy');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build-dev', ['less:development']);
    grunt.registerTask('build-prod', ['less:production']);

};