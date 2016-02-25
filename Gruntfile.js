module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //jshint: {
    //  files: ['Gruntfile.js', 'js/custom.js'],
    //  options: {
    //    globals: {
    //      jQuery: true
    //    }
    //  }
    //},

    //copy: {
    //  main: {
    //    expand: true,
    //    cwd: 'bower_components/bourbon/app/assets/stylesheets/',
    //    src: '**',
    //    dest: 'sass/bourbon',
    //    flatten: false,
    //    filter: 'isFile'
    //  }
    //},

    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'expanded'
        },
        files: {                         // Dictionary of files
          'css/sass-styles.css': 'sass/style.scss'       // 'destination': 'source'
        }
      }
    },

    concat: {
      options: {
      },
      //javascript: {
      //  src: [ 'bower_components/bootstrap/dist/js/bootstrap.min.js', 'bower_components/jquery-backstretch/jquery.backstretch.min.js', 'js/custom.js' ],
      //  dest: 'js/compiled.js'
      //},
      css: {
        src: ['css/theme-header.css', 'css/sass-styles.css', 'css/main-style.css' ],
        dest: 'style.css'
      }
    },

    //uglify: {
    //  javascript: {
    //    files: {
    //      'meg-n-boots.min.js': ['meg-n-boots.js']
    //    }
    //  }
    //},

    watch: {
      files: ['css/*.css', 'js/*.js', 'sass/**/*.scss'],
      tasks: ['concat', 'sass']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('default', ['sass', 'concat', 'watch']);

};