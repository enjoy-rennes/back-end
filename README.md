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

## Routes
   -------------------------- ---------- -------- ------ -----------------------------------
  Name                       Method     Scheme   Host   Path                          
 -------------------------- ---------- -------- ------ -----------------------------------
  
  address_list               GET        ANY      ANY    /address_list
  address_add                ANY        ANY      ANY    /address/add
  address_update             GET|POST   ANY      ANY    /address/update/{id}
  address_show               ANY        ANY      ANY    /address/{id}
  address_delete             DELETE     ANY      ANY    /address/delete/{id}
  category_list              GET        ANY      ANY    /category_list
  category_add               ANY        ANY      ANY    /category/add
  category_update            GET|POST   ANY      ANY    /category/update/{id}
  category_show              ANY        ANY      ANY    /category/{id}
  category_delete            DELETE     ANY      ANY    /category/delete/{id}
  contact                    ANY        ANY      ANY    /contact
  help_list                  GET        ANY      ANY    /help_list
  help_add                   ANY        ANY      ANY    /help/add
  help_update                GET|POST   ANY      ANY    /help/update/{id}
  help_show                  ANY        ANY      ANY    /help/{id}
  help_delete                DELETE     ANY      ANY    /help/delete/{id}
  requirement_list           GET        ANY      ANY    /requirement_list
  requirement_add            ANY        ANY      ANY    /requirement/add
  requirement_update         GET|POST   ANY      ANY    /requirement/update/{id}
  requirement_show           ANY        ANY      ANY    /requirement/{id}
  requirement_delete         DELETE     ANY      ANY    /requirement/delete/{id}
  security                   ANY        ANY      ANY    /security
  show_society               ANY        ANY      ANY    /show/society
  society_list               GET        ANY      ANY    /society_list
  society_add                ANY        ANY      ANY    /society/add
  society_update             GET|POST   ANY      ANY    /society/update/{id}
  society_show               ANY        ANY      ANY    /society/{id}
  society_delete             DELETE     ANY      ANY    /society/delete/{id}
 -------------------------- ---------- -------- ------ -----------------------------------

## Author

👤 **NDIAYE Ibrahima**

* Github: [@ndibrahima](https://github.com/ndibrahima)


