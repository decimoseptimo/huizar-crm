<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170129_205129_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'user_notified_at' => $this->dateTime(),
            'finished_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->notNull(),
            'customer_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('ix-customer_id', 'order', 'customer_id');
        $this->addForeignKey('fk-order-customer_id-customer-id', 'order', 'customer_id', 'customer', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('order', ['status', 'created_at', 'user_notified_at', 'finished_at',  'updated_at', 'customer_id'], [
            [0, '2016-05-24 03:30:25', null, null, '2016-05-24 03:30:25', 5,],
            [0, '2016-05-26 01:34:04', null, null, '2016-05-26 01:34:04', 5,],
            [0, '2016-05-26 06:42:05', null, null, '2016-05-26 06:42:05', 1,],
            [1, '2016-06-16 19:22:51', '2016-06-16 22:12:19', null, '2016-06-16 22:12:19', 2,],
            [1, '2017-01-13 03:33:14', '2017-01-16 08:01:42', null, '2017-01-16 08:01:42', 3,],
            [0, '2017-01-13 03:33:33', null, null, '2017-01-13 03:33:33', 1,],
            [1, '2017-01-14 03:33:22', '2017-01-14 06:24:41', null, '2017-01-14 06:24:41', 4,],
            [2, '2017-01-16 21:30:53', '2017-01-18 01:18:30', '2017-01-18 01:19:10', '2017-01-18 01:19:10', 1,],
            [1, '2017-01-18 01:28:27', '2017-01-18 01:48:13', null, '2017-01-18 01:48:13', 2,],
            [2, '2017-01-18 07:19:49', '2017-01-20 05:13:09', '2017-01-20 05:14:14', '2017-01-20 05:14:14', 2,],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
