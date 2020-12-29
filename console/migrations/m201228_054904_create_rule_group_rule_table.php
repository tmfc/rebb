<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rule_group_rule}}`.
 */
class m201228_054904_create_rule_group_rule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rule_group_rule}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'rule_id' => $this->integer()->notNull(),

        ]);
        // creates index for column `group_id`
        $this->createIndex(
            'idx-rule_group_rule-group_id',
            '{{%rule_group_rule}}',
            'group_id'
        );

        // add foreign key for table `group_id`
        $this->addForeignKey(
            'fk-rule_group_rule-group_id',
            '{{%rule_group_rule}}',
            'group_id',
            'rule_group',
            'id',
            'CASCADE'
        );

        // creates index for column `rule_id`
        $this->createIndex(
            'idx-rule_group_rule-rule_id',
            '{{%rule_group_rule}}',
            'rule_id'
        );

        // add foreign key for table `rule_id`
        $this->addForeignKey(
            'fk-rule_group_rule-rule_id',
            '{{%rule_group_rule}}',
            'rule_id',
            'rule',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rule_group_rule}}');
    }
}
