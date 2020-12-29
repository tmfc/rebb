<?php

use yii\db\Migration;

/**
 * Class m201229_102503_add_status_to_rule_pair
 */
class m201229_102503_add_status_to_rule_pair extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rule_pair', 'status', $this->integer()->defaultValue(1) . ' AFTER description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rule_pair', 'status');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201229_102503_add_status_to_rule_pair cannot be reverted.\n";

        return false;
    }
    */
}
