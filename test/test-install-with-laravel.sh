#!/bin/sh -xe

laravel_version=${1:-9}
dir="test-$laravel_version"

mkdir -p tmp
cd tmp
rm -rf $dir

composer create-project laravel/laravel $dir "^$laravel_version"
cd $dir
composer config repositories.dev path ../../
composer require upcloudltd/upcloud-php-api @dev
