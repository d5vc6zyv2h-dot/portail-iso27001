#!/bin/sh
set -e

php artisan db:seed --class=DatabaseSeeder --force

exec apache2-foreground
