<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biz_object}}`.
 */
class m201215_045533_create_biz_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biz_object}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(200),
            'scene_id' => $this->integer()->notNull(),
            'definition' => $this->text()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        // creates index for column `name`
        $this->createIndex(
            'idx-biz_object-name',
            '{{%biz_object}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-biz_object-scene_id',
            '{{%biz_object}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-biz_object-author_id',
            '{{%biz_object}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-biz_object-scene_id',
            '{{%biz_object}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-biz_object-author_id',
            '{{%biz_object}}',
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
        $this->dropTable('{{%biz_object}}');
    }
}
