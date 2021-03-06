property_manager
================

A Symfony project for property management

Install
---------------

1. Entities

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Address" \
--fields=" \
line1:string(255) \
line2:string(255) \
line3:string(255) \
zipOrPostcode:string(32) \
stateProvinceCounty:string(32) \
country:string(32) \
otherAddressDetails:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:AddressType" \
--fields=" \
title:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Person" \
--fields=" \
firstname:string(255) \
middlename:string(255) \
surname:string(255) \
gender:string(1) \
dateOfBirth:datetime \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:PersonAddress" \
--fields=" \
person \
address \
addressType \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Tenant" \
--fields=" \
firstname:string(255) \
middlename:string(255) \
surname:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:TenantAddress" \
--fields=" \
tenant \
address \
addressType \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Building" \
--fields=" \
fullName:string(255) \
shortName:string(50) \
address \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:ApartmentType" \
--fields=" \
title:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Apartment" \
--fields=" \
fullName:string(255) \
shortName:string(50) \
building \
apartmentType \
" \
--no-interaction;



docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:MeterType" \
--fields=" \
title:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Unit" \
--fields=" \
title:string(255) \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Currency" \
--fields=" \
iso:string(3) \
" \
--no-interaction;


docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Meter" \
--fields=" \
meterType
number:string(255) \
unit \
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Meterreading" \
--fields=" \
meter
date:date()
value:float()
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Tenant" \
--fields=" \
letting
person
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:CostType" \
--fields=" \
title
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Letting" \
--fields=" \
apartment
dateStart:date()
dateEnd:date()
price:float()
currency:float
" \
--no-interaction;

docker exec -it property_manager-dev php bin/console doctrine:generate:entity \
--entity="AppBundle:Lettingsidecost" \
--fields=" \
letting
costType
dateStart:date()
dateEnd:date()
price:float()
currency:float
" \
--no-interaction;


2. Db - Schema

a.) Create schema: 
docker exec -it property_manager-dev php bin/console doctrine:schema:create

b.) Update schema: 
docker exec -it property_manager-dev php bin/console doctrine:schema:update --force 

c.) Create Media files
docker exec -it property_manager-dev php bin/console sonata:easy-extends:generate --dest=src SonataMediaBundle

3. Admin-User

docker exec -it property_manager-
dev php bin/console fos:user:create omirel olaf@mirel.de 12345 --super-admin