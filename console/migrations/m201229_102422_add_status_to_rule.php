<?php

use yii\db\Migration;

/**
 * Class m201229_102422_add_status_to_rule
 */
class m201229_102422_add_status_to_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rule', 'status', $this->integer()->defaultValue(1) . ' AFTER description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rule', 'status');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201229_102422_add_status_to_rule cannot be reverted.\n";

        return false;
    }
    */
}
