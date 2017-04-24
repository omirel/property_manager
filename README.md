property_manager
================

A Symfony project for property management

Install
---------------

1. Entities

php bin/console doctrine:generate:entity --entity="AppBundle:Category" --fields="name:string(255)" --no-interaction

php bin/console doctrine:generate:entity --entity="AppBundle:BlogPost" --fields="title:string(255) body:text draft:boolean" --no-interaction



2. Db - Schema

a.) Create schema: 
php bin/console doctrine:schema:create

b.) Update schema: 
php bin/console doctrine:schema:update --force 
