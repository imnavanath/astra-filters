module.exports = function (grunt) {
    grunt.initConfig({
        copy: {
            main: {
                options: {
                    mode: true
                },
                src: [
                    '**',
                    '*.zip',
                    '!node_modules/**',
                    '!build/**',
                    '!css/sourcemap/**',
                    '!.git/**',
                    '!bin/**',
                    '!.gitlab-ci.yml',
                    '!bin/**',
                    '!tests/**',
                    '!phpunit.xml.dist',
                    '!*.sh',
                    '!*.map',
                    '!Gruntfile.js',
                    '!package.json',
                    '!.gitignore',
                    '!phpunit.xml',
                    '!README.md',
                    '!sass/**',
                    '!codesniffer.ruleset.xml',
                    '!vendor/**',
                    '!composer.json',
                    '!composer.lock',
                    '!package-lock.json',
                    '!phpcs.xml.dist',
                ],
                dest: 'astra-filters/'
            }
        },

        compress: {
            main: {
                options: {
                    archive: 'astra-filters.zip',
                    mode: 'zip'
                },
                files: [
                    {
                        src: [
                            './astra-filters/**'
                        ]

                    }
                ]
            }
        },

        clean: {
            main: ["astra-filters"],
            zip: ["astra-filters.zip"],
        },

        makepot: {
            target: {
                options: {
                    domainPath: '/',
                    mainFile: 'astra-filters.php',
                    potFilename: 'languages/astra-filters.pot',
                    potHeaders: {
                        poedit: true,
                        'x-poedit-keywordslist': true
                    },
                    type: 'wp-plugin',
                    updateTimestamp: true
                }
            }
        },
        
        addtextdomain: {
            options: {
                textdomain: 'astra-filters',
            },
            target: {
                files: {
                    src: ['*.php', '**/*.php', '!node_modules/**', '!php-tests/**', '!bin/**', '!asset/bsf-core/**']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-wp-i18n');

    grunt.registerTask('i18n', ['addtextdomain', 'makepot']);
    grunt.registerTask('release', ['clean:zip', 'copy', 'compress', 'clean:main']);
    
};
