<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rule_param}}`.
 */
class m210104_054217_create_rule_param_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rule_param}}', [
            'id' => $this->primaryKey(),
            'rule_id' => $this->integer()->notNull(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(500),
            'type' => $this->integer()->notNull(),
            'default_value' => $this->text(),
            'constraints' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        // creates index for column `rule_id`
        $this->createIndex(
            'idx-rule_param-rule_id',
            '{{%rule_param}}',
            'rule_id'
        );

        // add foreign key for table `rule`
        $this->addForeignKey(
            'fk-rule_param-rule_id',
            '{{%rule_param}}',
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
        $this->dropTable('{{%rule_param}}');
    }
}
