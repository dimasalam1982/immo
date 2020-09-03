<?php

use yii\db\Migration;

/**
 * Class m200902_052414_create_table_currency
 */
class m200902_052414_create_table_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()->comment('name of currency'),
            'rate' => $this->float()->notNull()->comment('rate of currency'),
            'insert_dt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('time of updating'),
        ],$tableOptions);

        //Search will be sorted by all fields so it's need indexes for all these fields

        $this->createIndex(
            'idx-name-token',
            '{{%currency}}',
            'name'
        );

        $this->createIndex(
            'idx-rate-token',
            '{{%currency}}',
            'rate'
        );

        $this->createIndex(
            'idx-insert_dt-token',
            '{{%currency}}',
            'insert_dt'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-name-token','{{%currency}}');
        $this->dropIndex('idx-rate-token','{{%currency}}');
        $this->dropIndex('idx-insert_dt-token','{{%currency}}');
        $this->dropTable('{{%currency}}');
    }
}
