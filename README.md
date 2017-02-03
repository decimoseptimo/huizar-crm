Huizar-POS
============================

A basic web front-end for a point-of-sale desktop application.
It's composed of two parts: the GUI (/web) and the RESTful API server (/api).
<br>[**Live demo**](http://www.azulacero.mx/demos/huizar-pos/web/)

Requirements
------------
* Yii 2.x (PHP 5.4.0)
* MySQL

Instructions
------------
* Setup database
* Setup /config/db.php with your db credentials
* Setup /config/params.php with your ESP credentials
* Run migrations in /migrations folder


TODO
----

- [x] Implement migrations
- [x] Add RESTful API for managing customers and orders
- [x] Implement ESP APIs to send email
- [x] Design HTML template(s)
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

Bulk submission is not supported at any API endpoint.