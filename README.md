Huizar-POS
============================

A basic web front-end for a point-of-sale desktop application.<br>[**Live demo**](http://www.azulacero.mx/demos/huizar-pos/web/)

Requirements
------------
- Yii 2.0.9 (PHP 5.4.0)
- MySQL

Instructions
------------
- Setup database
- Setup /config/db.php file with your db credentials

TODO
----
- Either provide DB schema, .sql import file, or implement migrations
- Add RESTful API for managing customers and orders
- Implement ESP APIs to send email
- Design HTML template(s)
- Add access control

API
----
- POST /api/v1/customers
- PUT/PATCH, DELETE /api/v1/customers/{id}