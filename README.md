# back-end
<h1 align="center">Welcome to enjoy-rennes 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-0.1.0-blue.svg?cacheSeconds=2592000" />
</p>

> Symfony application

## 💾 Requierements
```sh
symfony check:requirements
```
```sh
composer require symfony/dotenv
```

## 💾 Install

```sh
Git pull 
```

composer require symfony/dotenv

## 🔨 Usage

```sh
symfony server:start 
```

## Database connection

Open the file Add this line on the file ```.env``` and replace by your ```db_user```, ```db_password```, ```db_name```.

```sh
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
```

## Database migration

```sh
php bin/console make:migration
```

```sh
php bin/console doctrine:migrations:migrate
```
## Routes
  -------------------------- ---------- -------- ------ ----------------------------------- 
  Name                       Method     Scheme   Host   Path                               
 -------------------------- ---------- -------- ------ ----------------------------------- 
  address_list               GET        ANY      ANY    /address_list
  address_add                ANY        ANY      ANY    /address/add
  address_update             GET|POST   ANY      ANY    /address/update/{id}
  address_show               ANY        ANY      ANY    /address/{id}
  address_delete             DELETE     ANY      ANY    /address/delete/{id}
  card_list                  GET        ANY      ANY    /card_list
  card_add                   ANY        ANY      ANY    /card/add
  card_update                GET|POST   ANY      ANY    /card/update/{id}
  card_show                  ANY        ANY      ANY    /card/{id}
  card_delete                DELETE     ANY      ANY    /card/delete/{id}
  category_list              GET        ANY      ANY    /category_list
  category_add               ANY        ANY      ANY    /category/add
  category_update            GET|POST   ANY      ANY    /category/update/{id}
  category_show              ANY        ANY      ANY    /category/{id}
  category_delete            DELETE     ANY      ANY    /category/delete/{id}
  contact                    ANY        ANY      ANY    /contact
  good_plan_list             GET        ANY      ANY    /good_plan_list
  good_plan_add              ANY        ANY      ANY    /good_plan/add
  good_plan_update           GET|POST   ANY      ANY    /good_plan/update/{id}
  good_plan_show             ANY        ANY      ANY    /good_plan/{id}
  good_plan_delete           DELETE     ANY      ANY    /good_plan/delete/{id}
  help_list                  GET        ANY      ANY    /help_list
  help_add                   ANY        ANY      ANY    /help/add
  help_update                GET|POST   ANY      ANY    /help/update/{id}
  help_show                  ANY        ANY      ANY    /help/{id}
  help_delete                DELETE     ANY      ANY    /help/delete/{id}
  news_list                  GET        ANY      ANY    /news_list
  news_add                   ANY        ANY      ANY    /news/add
  news_update                GET|POST   ANY      ANY    /news/update/{id}
  news_show                  ANY        ANY      ANY    /news/{id}
  news_delete                DELETE     ANY      ANY    /news/delete/{id}
  place_list                 GET        ANY      ANY    /place_list
  place_add                  ANY        ANY      ANY    /place/add
  place_update               GET|POST   ANY      ANY    /place/update/{id}
  place_show                 ANY        ANY      ANY    /place/{id}
  place_delete               DELETE     ANY      ANY    /place/delete/{id}
  user_registration          ANY        ANY      ANY    /register
  requirement_list           GET        ANY      ANY    /requirement_list
  requirement_add            ANY        ANY      ANY    /requirement/add
  requirement_update         GET|POST   ANY      ANY    /requirement/update/{id}
  requirement_show           ANY        ANY      ANY    /requirement/{id}
  requirement_delete         DELETE     ANY      ANY    /requirement/delete/{id}
  app_login                  ANY        ANY      ANY    /login
  app_logout                 ANY        ANY      ANY    /logout
  show_society               ANY        ANY      ANY    /show/society
  society_list               GET        ANY      ANY    /society_list
  society_add                ANY        ANY      ANY    /society/add
  society_update             GET|POST   ANY      ANY    /society/update/{id}
  society_show               ANY        ANY      ANY    /society/{id}
  society_delete             DELETE     ANY      ANY    /society/delete/{id}
  user_list                  ANY        ANY      ANY    /user
  user_show                  ANY        ANY      ANY    /user/{id}
  login                      GET|POST   ANY      ANY    /login
 -------------------------- ---------- -------- ------ -----------------------------------

## Com



👤 **NDIAYE Ibrahima**

* Github: [@ndibrahima](https://github.com/ndibrahima)


