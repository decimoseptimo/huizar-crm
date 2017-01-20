Huizar-POS
============================

A basic web front-end for a point-of-sale desktop application.<br>[**Live demo**](http://www.azulacero.mx/demos/huizar-pos/web/)

Requirements
------------
* Yii 2.0.9 (PHP 5.4.0)
* MySQL

Instructions
------------
* Setup database
* Setup /config/db.php file with your db credentials

TODO
----

- [ ] Either provide DB schema, .sql import file, or implement migrations
- [x] Add RESTful API for managing customers and orders
- [ ] Implement ESP APIs to send email
- [ ] Design HTML template(s)
- [x] Add access control
- [ ] Integrate order search to website

API
----
#####Customers
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

#####Orders
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