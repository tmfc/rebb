<?php

namespace app\models;

use app\models\behaviors\EnableStatusBehavior;
use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "rule_pair".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $entrance_code
 * @property string $fail_code
 * @property string $success_code
 * @property int $scene_id
 * @property int $author_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $author
 * @property Scene $scene
 */
class RulePair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rule_pair';
    }

    /**
    * Use TimestampBehavior to handle created_at and updated_at
    */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
            EnableStatusBehavior::class,
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
            ['author_id','default', 'value' =>Yii::$app->user->id],
            [['name', 'description', 'entrance_code', 'fail_code', 'success_code', 'scene_id', 'author_id'], 'required'],
            [['scene_id', 'author_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['entrance_code', 'fail_code', 'success_code'], 'string', 'max' => 32],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['scene_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scene::class, 'targetAttribute' => ['scene_id' => 'id']],
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
            'entrance_code' => Yii::t('app', 'Entrance Code'),
            'fail_code' => Yii::t('app', 'Fail Code'),
            'success_code' => Yii::t('app', 'Success Code'),
            'scene_id' => Yii::t('app', 'Scene ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Scene]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScene()
    {
        return $this->hasOne(Scene::class, ['id' => 'scene_id']);
    }
}
