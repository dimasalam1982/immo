## Task
Необходимо реализовать сервис со следующим функционалом на языке PHP с использованием фреймворка Yii2. 
 
В базе данных Mysql/PosgreSql должна быть таблица currency c колонками: 

id — первичный ключ 

name — название валюты 

rate — курс валюты к рублю 

insert_dt – время обновления валюты 
 

Должна быть консольная команда для обновления данных в таблице currency.  

Данные по курсам валют можно взять отсюда: http://www.cbr.ru/scripts/XML_daily.asp 

Таблица в БД должна создаваться через миграции yii. 
 

Реализовать 2 REST API метода: 

GET /currencies — должен возвращать список курсов валют с возможность пагинации 

GET /currency/ — должен возвращать курс валюты для переданного id  

## Recommended requirements
- Linux based Operation System - Ubuntu 20
- Docker https://docs.docker.com/engine/install/ubuntu/
- Docker-Compose https://docs.docker.com/compose/install/

## Deployment

It's recommended to deploy the project with docker-compose. It was tested on Ubuntu 20. But you can use source code separetly. Further steps describes how to deploy the project with docker.

Clone the repo:

`git clone https://github.com/dimasalam1982/immo.git`

Go to the repo dir:

`cd immo`

Build the project:

`docker-compose up -d --build`

Install php dependences by composer:

`docker exec -it immo-fpm bash -c "cd immo; composer install"`

Make migrations:

`docker exec --user root -it immo-fpm bash -c "cd immo; php yii migrate"`

## Updating currency data

Run command:

`docker exec -it immo-fpm bash -c "cd immo; php yii currency/update-currency-list-sbr"` 

## API auth

Authentication requires a token passed in by bearer authorization header

## Swagger

All API's methods are discribed in swagger. You can use token `test_token`

Swagger interface is placed in such route:

http://localhost/openapi/index.html

If you will be do changes in API methods you need to re-build swagger yaml file:

`vendor/bin/openapi --bootstrap config/swagger_params.php --format yaml ./modules/v1 >web/openapi/api.yaml`

or if you are using docker:

`docker exec -it immo-fpm bash -c "cd immo; vendor/bin/openapi --bootstrap config/swagger_params.php --format yaml ./modules/v1 >web/openapi/api.yaml;"`

Congratulations! You have deployed the project!
