<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rule_group}}`.
 */
class m201228_025213_create_rule_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rule_group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(500)->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'scene_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);


        // creates index for column `name`
        $this->createIndex(
            'idx-rule_group-name',
            '{{%rule_group}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-rule_group-scene_id',
            '{{%rule_group}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-rule_group-author_id',
            '{{%rule_group}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-rule_group-scene_id',
            '{{%rule_group}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-rule_group-author_id',
            '{{%rule_group}}',
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
        $this->dropTable('{{%rule_group}}');
    }
}
