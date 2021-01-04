<?php

use yii\db\Migration;

/**
 * Class m201229_102735_add_status_to_biz_object
 */
class m201229_102735_add_status_to_biz_object extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('biz_object', 'status', $this->integer()->defaultValue(1) . ' AFTER description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('biz_object', 'status');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201229_102735_add_status_to_biz_object cannot be reverted.\n";

        return false;
    }
    */
}
