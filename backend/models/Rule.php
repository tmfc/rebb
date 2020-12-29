<?php

namespace app\models;

use app\models\behaviors\EnableStatusBehavior;
use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "rule".
 *
 * @property int $id
 * @property int $scene_id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $definition
 * @property int $author_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $author
 * @property Scene $scene
 */
class Rule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rule';
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
            [['scene_id', 'name', 'description', 'definition', 'author_id'], 'required'],
            [['scene_id', 'author_id', 'status'], 'integer'],
            [['definition'], 'string'],
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
            ['author_id','default', 'value' =>Yii::$app->user->id],
            'id' => Yii::t('app', 'ID'),
            'scene_id' => Yii::t('app', 'Scene ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'definition' => Yii::t('app', 'Definition'),
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

    public function getRuleGroups()
    {
        return $this->hasMany(RuleGroup::class, ['id' => 'group_id'])
            ->viaTable('rule_group_rule', ['rule_id' => 'id']);
    }

    public function findAllByScene($scene_id)
    {
       return $this->find()->where(['scene_id' => $scene_id])->all();
    }

}
