<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Deploying on AWS
``sudo rm -r /var/www/html/*``

``sudo git clone https://mingming424224@bitbucket.org/mingming424224/real-estate.git``

``sudo cp -r /var/www/html/real-estate/* /var/www/html/``

``sudo composer install``

``sudo chmod 777 -R /var/www/html/storage``

``cd public``

``sudo mkdir storage``

``cd storage``

``sudo mkdir uploads``

``cd uploads``

``sudo mkdir property``

## requirements for python module

``pip install requests``

``sudo apt-get install python3-bs4``

## config mysql database

``mysql -u root -p``

``use real_state``

``drop table property``

## Live site

http://ec2-18-219-135-252.us-east-2.compute.amazonaws.com
