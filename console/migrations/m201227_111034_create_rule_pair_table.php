<?php

use yii\db\Migration;

/**
 * Class m201227_111034_create_rule_pair_table
 */
class m201227_111034_create_rule_pair_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rule_pair}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(500)->notNull(),
            'entrance_code' => $this->string(32)->notNull(),
            'fail_code' => $this->string(32)->notNull(),
            'success_code' => $this->string(32)->notNull(),
            'scene_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        // creates index for column `name`
        $this->createIndex(
            'idx-rule_pair-name',
            '{{%rule_pair}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-rule_pair-scene_id',
            '{{%rule_pair}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-rule_pair-author_id',
            '{{%rule_pair}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-rule_pair-scene_id',
            '{{%rule_pair}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-rule_pair-author_id',
            '{{%rule_pair}}',
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
        $this->dropTable('{{%rule_pair}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201227_111034_create_rule_pair_table cannot be reverted.\n";

        return false;
    }
    */
}
