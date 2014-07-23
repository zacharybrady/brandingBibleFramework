module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //Watching Functionality
    watch: {
      options: {
        livereload: true,
      },
      scripts: {
        files: ['js/jsSrc/*.js','js/jsSrc/*/*.js'],
        tasks: ['jshint', 'uglify'],
        options: {
          spawn: false
        }
      },
      css: {
        files: ['css/sass/*.scss','css/sass/*/*.scss'],
       tasks: ['compass'],
        options: {
          spawn: false,
        }
      },
      images: {
        files: ['images/imagesSrc/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
          spawn: false,
        }
      }
    },

     //JS Hinting
    jshint: {
      all: ['Gruntfile.js', 'js/jsSrc/functions.js', 'js/jsSrc/global.js']
    },

    //Uglify for JS
    uglify: {
      dist:{
        files:{
          'js/global.min.js' : ['js/jsSrc/polyfills/classlist.js','js/jsSrc/functions.js', 'js/jsSrc/global.js'],
          'js/polyfills/html5.js' : 'js/jsSrc/polyfills/html5.js'

        }
      }
    },

    //Compass for SCSS
    compass: {                 
      dist: { 
        options: {    
          config: 'config.rb',       
          sassDir: 'css/sass',
          cssDir: 'css',
          environment: 'development'
        }
      }
    },

    //Image Optimization
    imagemin: {  
      standard: {                  
        files: [{
          expand: true,    
          src: ['**/*.{png,jpg,gif}'],
          cwd: 'images/imagesSrc',
          dest: 'images/'   
        }]
      }
    }
 
  });

  // Load up pluggins
  grunt.loadNpmTasks('grunt-contrib-watch'); //Update watcher
  grunt.loadNpmTasks('grunt-contrib-uglify'); //Uglify JS
  grunt.loadNpmTasks('grunt-contrib-compass'); //Compress Compass
  grunt.loadNpmTasks('grunt-contrib-jshint'); //JS Hint
  grunt.loadNpmTasks('grunt-contrib-imagemin'); //Image Optimization

  // Default task(s).
  grunt.registerTask('default', ['uglify', 'compass', 'jshint','imagemin']);

};