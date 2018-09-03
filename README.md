Rent Buddy
============

##How to Install
```
composer install
cd web
npm install
cd ..
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
cd dataLoader
bash load.sh     // change mysql user and pwd according to your configs
cd ..
php bin/console server:start
```
