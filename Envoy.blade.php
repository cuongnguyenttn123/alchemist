@servers(['server' => 'alc'])

@task('deploy', ['on' => 'server'])

cd /var/www/html/dev/

git pull origin develop


php artisan migrate
@endtask

