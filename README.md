# Huizar-POS

A web GUI with a RESTful API where data can be fed to.

It has two main entry points: `/web` the GUI and `/api` the RESTful server .

## Demo
http://www.azulacero.mx/huizar-pos/

## Requirements
* Yii 2.x (PHP 5.4.0)
* MySQL
* Composer

## Instructions
* Deploy to server and instruct composer to install dependencies
* Setup /config/db.php with your DB credentials
* Setup /config/params.php with your ESP credentials

Either:
* Run migrations in /migrations folder
* Or import /sample.sql (e.g. `mysql -u MYSQL_USER -p DB_NAME < PATH_TO_SAMPLE.SQL`)

## TODO
- [x] Implement migrations
- [x] Add RESTful API for managing customers and orders
- [x] Implement ESP APIs to send email
- [x] Design HTML template(s)
- [x] Add access control
- [ ] Integrate order search to website

## API
##### Customers
* POST /api/v1/customers
* PUT/PATCH /api/v1/customers/{id}
* DELETE /api/v1/customers/{id}

_Model_
```js
Customers {
    id (integer, unique),
    first_name (string),
    last_name (string),
    email (string, unique),
}
```

##### Orders
* POST /api/v1/orders
* PUT/PATCH /api/v1/orders/{id}
* DELETE /api/v1/orders/{id}

_Model_
```js
Orders {
    id (integer, unique),
    status (string, accepted-values=('recibido' | 'finalizado' | 'entregado'), case-sensitive),
    customer_id (integer, referenced 'Customer' must have been submitted),
}
```

Bulk submission is not supported at any API endpoint.