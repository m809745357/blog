<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'www.xxig.com.cn');

// Project repository
set('repository', 'git@github.com:m809745357/blog.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts

host('121.42.34.238')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/data/www/{{application}}');

task('php-fpm:restart', function () {
    run('sudo systemctl restart php7.2-fpm.service');
});

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

after('deploy:symlink', 'php-fpm:restart');
