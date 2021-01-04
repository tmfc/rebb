<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rule_template}}`.
 */
class m210104_025818_rename_rule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-rule-scene_id','{{%rule}}');
        $this->dropForeignKey('fk-rule-author_id','{{%rule}}');
        $this->dropIndex('idx-rule-name','{{%rule}}');
        $this->dropIndex('idx-rule-scene_id','{{%rule}}');
        $this->dropIndex('idx-rule-author_id','{{%rule}}');
        $this->renameTable('{{%rule}}','{{%rule_template}}');

        // creates index for column `name`
        $this->createIndex(
            'idx-rule_template-name',
            '{{%rule_template}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-rule_template-scene_id',
            '{{%rule_template}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-rule_template-author_id',
            '{{%rule_template}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-rule_template-scene_id',
            '{{%rule_template}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-rule_template-author_id',
            '{{%rule_template}}',
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
        $this->dropIndex('idx-rule_template-name','{{%rule}}');
        $this->dropIndex('idx-rule_template-scene_id','{{%rule}}');
        $this->dropIndex('idx-rule_template-author_id','{{%rule}}');
        $this->dropForeignKey('fk-rule_template-scene_id','{{%rule}}');
        $this->dropForeignKey('fk-rule_template-author_id','{{%rule}}');
        $this->renameTable('{{%rule_template}}', '{{%rule}}');

        // creates index for column `name`
        $this->createIndex(
            'idx-rule-name',
            '{{%rule}}',
            'name'
        );

        // creates index for column `scene_id`
        $this->createIndex(
            'idx-rule-scene_id',
            '{{%rule}}',
            'scene_id'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-rule-author_id',
            '{{%rule}}',
            'author_id'
        );

        // add foreign key for table `scene`
        $this->addForeignKey(
            'fk-rule-scene_id',
            '{{%rule}}',
            'scene_id',
            'scene',
            'id',
            'CASCADE'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-rule-author_id',
            '{{%rule}}',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );
    }
}
