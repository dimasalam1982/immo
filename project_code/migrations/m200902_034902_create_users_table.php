<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200902_034902_create_users_table extends Migration
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

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(100)->notNull(),
            'username' => $this->string(100),
            'token' => $this->string(200)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ],$tableOptions);

        $this->createIndex(
            'idx-user-token',
            '{{%users}}',
            'token'
        );

        $sql = 'INSERT INTO users (login, token, created_at, updated_at) VALUES ( "api_user", "test_token",  NOW(), NOW())';
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-user-token', '{{%users}}');
        $this->dropTable('{{%users}}');
    }
}
