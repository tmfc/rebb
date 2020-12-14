<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scene}}`.
 */
class m201214_081545_create_scene_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scene}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'description' => $this->string((500)),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%scene}}');
    }
}
