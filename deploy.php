<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'laravel-datagrid');

// Project repository
set('repository', 'https://github.com/wdev-rs/laravel-datagrid-demo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('laravel-datagrid.wdev.rs')
    ->set('labels', ['stage' => 'production'])
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '/var/www/vhosts/laravel-datagrid.wdev.rs')
    ->set('branch', 'main')
    ->set('keep_releases', '2');

// Tasks

task('build', function () {
    runLocally('npm run build');
    runLocally('git add -A && git commit -m "Build assets"');
    runLocally('git push');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

before('deploy', 'build');
