# back-end
<h1 align="center">Welcome to enjoy-rennes 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-0.1.0-blue.svg?cacheSeconds=2592000" />
</p>

> Symfony application

## 💾 Install

```sh
composer install
```
install the dependency.

```sh
symfony check:requirements
```

```sh
composer require symfony/dotenv
```

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
php bin/console doctrine:database:create
```
Create the database.

```sh
php bin/console doctrine:migrations:migrate
```
Create the table on datatbase.

## Routes
```sh
 -------------------------- ---------- -------- ------ ----------------------------------- 
  Name                       Method     Scheme   Host   Path                               
 -------------------------- ---------- -------- ------ ----------------------------------- 
  actuality_list             GET        ANY      ANY    /actuality_list
  actuality                  GET        ANY      ANY    /actuality
  actuality_add              ANY        ANY      ANY    /actuality/add
  actuality_update           GET|POST   ANY      ANY    /actuality/update/{id}
  actuality_show             ANY        ANY      ANY    /actuality/{id}
  actuality_delete           DELETE     ANY      ANY    /actuality/delete/{id}
  address_list               GET        ANY      ANY    /address_list
  address                    GET        ANY      ANY    /address
  address_add                ANY        ANY      ANY    /address/add
  address_update             GET|POST   ANY      ANY    /address/update/{id}
  address_show               ANY        ANY      ANY    /address/{id}
  address_delete             DELETE     ANY      ANY    /address/delete/{id}
  advantage_list             GET        ANY      ANY    /advantage_list
  advantage                  GET        ANY      ANY    /advantage
  advantage_add              ANY        ANY      ANY    /advantage/add
  advantage_update           GET|POST   ANY      ANY    /advantage/update/{id}
  advantage_show             ANY        ANY      ANY    /advantage/{id}
  advantage_delete           DELETE     ANY      ANY    /advantage/delete/{id}
  card_list                  GET        ANY      ANY    /card_list
  card                       GET        ANY      ANY    /card
  shop                       GET        ANY      ANY    /shop
  card_add                   ANY        ANY      ANY    /card/add
  card_update                GET|POST   ANY      ANY    /card/update/{id}
  card_show                  ANY        ANY      ANY    /card/{id}
  card_delete                DELETE     ANY      ANY    /card/delete/{id}
  help                       GET        ANY      ANY    /help
  help_list                  GET        ANY      ANY    /help_list
  help_five                  GET        ANY      ANY    /help_five
  help_add                   ANY        ANY      ANY    /help/add
  help_update                GET|POST   ANY      ANY    /help/update/{id}
  help_show                  ANY        ANY      ANY    /help/{id}
  help_delete                DELETE     ANY      ANY    /help/delete/{id}
  payment                    ANY        ANY      ANY    /payment
  user_registration          ANY        ANY      ANY    /register
  requirement_list           GET        ANY      ANY    /requirement_list
  requirement                GET        ANY      ANY    /requirement
  requirement_add            ANY        ANY      ANY    /requirement/add
  requirement_update         GET|POST   ANY      ANY    /requirement/update/{id}
  requirement_show           ANY        ANY      ANY    /requirement/{id}
  requirement_delete         DELETE     ANY      ANY    /requirement/delete/{id}
  app_login                  ANY        ANY      ANY    /login
  app_logout                 ANY        ANY      ANY    /logout
  place_list                 GET        ANY      ANY    /place_list
  place                      GET        ANY      ANY    /place
  society_list               GET        ANY      ANY    /society_list
  app_homepage               GET        ANY      ANY    /society
  society_add                ANY        ANY      ANY    /society/add
  society_update             GET|POST   ANY      ANY    /society/update/{id}
  society_show               ANY        ANY      ANY    /society/{id}
  society_delete             DELETE     ANY      ANY    /society/delete/{id}
  tag                        GET        ANY      ANY    /tag
  tag_list                   GET        ANY      ANY    /tag_list
  tag_add                    ANY        ANY      ANY    /tag/add
  tag_update                 GET|POST   ANY      ANY    /tag/update/{id}
  tag_show                   ANY        ANY      ANY    /tag/{id}
  tag_delete                 DELETE     ANY      ANY    /tag/delete/{id}
  user_list                  ANY        ANY      ANY    /user
  user_show                  ANY        ANY      ANY    /user/{id}
  user_update                GET|POST   ANY      ANY    /user/update/{id}
  user_delete                DELETE     ANY      ANY    /user/delete/{id}
  login                      GET|POST   ANY      ANY    /login
 -------------------------- ---------- -------- ------ -----------------------------------

```
## Com

👤 **NDIAYE Ibrahima**

* Github: [@ndibrahima](https://github.com/ndibrahima)
