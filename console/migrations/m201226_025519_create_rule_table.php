<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rule}}`.
 */
class m201226_025519_create_rule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rule}}', [
            'id' => $this->primaryKey(),
            'scene_id' => $this->integer()->notNull(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(500)->notNull(),
            'definition' => $this->text()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        // creates index for column `name`
        $this->createIndex(
            'idx-rule-name',
            '{{%rule}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-rule-scene_id',
            '{{%rule}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-rule-author_id',
            '{{%rule}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-rule-scene_id',
            '{{%rule}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-rule-author_id',
            '{{%rule}}',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rule}}');
    }
}
