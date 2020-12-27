<?php

use yii\db\Migration;

/**
 * Class m201225_065918_add_status_to_scene
 */
class m201225_065918_add_status_to_scene extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('scene', 'status', $this->integer() . ' AFTER description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('scene', 'status');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201225_065918_add_status_to_scene cannot be reverted.\n";

        return false;
    }
    */
}
