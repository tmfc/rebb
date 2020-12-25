<?php

namespace app\models;

use app\models\enums\EnableStatus;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "scene".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Scene extends ActiveRecord
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
            [['name', 'status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['status'], 'integer'],
            ['status', 'default', 'value' => EnableStatus::ENABLED],
            ['status', 'in', 'range' => EnableStatus::getConstantsByName()],
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getBizObjects()
    {
        return $this->hasMany(BizObject::class, ['scene_id' => 'id']);
    }

    public function setStatus(EnableStatus $status)
    {
        $this->status = $status->getValue();
    }

    public function getStatus()
    {
        return $this->status;
    }

    static public function getEnabledSceneList()
    {
        return Scene::find()->where(['status' => EnableStatus::ENABLED])->orderBy('name')->asArray()->all();
    }
}
