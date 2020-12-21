<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "scene".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Scene extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scene';
    }


    /**
     * Use [[yii\behaviors\TimestampBehavior]] to handle created_at and updated_at
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ]
        ];
    }


    /**
     * delete created_at and updated_at for crud generator
     */
    public function safeAttributes()
    {
        $safeAttributes = parent::safeAttributes();
        return array_diff($safeAttributes,['created_at', 'updated_at']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    public function getBizObjects()
    {
        return $this->hasMany(BizObject::class, ['scene_id' => 'id']);
    }
}
