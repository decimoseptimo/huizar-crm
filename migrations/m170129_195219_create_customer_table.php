<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m170129_195219_create_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(128)->notNull(),
            'last_name' => $this->string(128)->notNull(),
            'email' => $this->string(128)->unique()->notNull(),
            'email_unsuscribed' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ]);

        $this->batchInsert('customer', ['first_name', 'last_name', 'email', 'created_at', 'updated_at'], [
            ['Angel', 'Arteaga', 'angelito@hotmail.com', '2016-05-24 01:11:10', '2016-05-24 01:11:10',],
            ['Braulio', 'Boga', 'braulio.voga@gmail.com', '2016-05-24 02:36:53', '2016-05-24 02:36:53',],
            ['Carlos', 'Corral', 'carlos_2000@yahoo.com.mx', '2016-05-24 02:36:53', '2016-05-24 02:36:53',],
            ['Dora', 'Dorantes', 'dorantes_dora@hotmail.com', '2016-05-28 00:57:44', '2016-05-28 00:57:44',],
            ['Ernesto', 'Esparza', 'ernesto_e@hotmail.com', '2016-05-28 01:40:10', '2016-05-28 01:40:10',],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customer');
    }
}
