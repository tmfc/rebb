<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "rule".
 *
 * @property int $id
 * @property int $rule_template_id
 * @property int $scene_id
 * @property string $name
 * @property string|null $description
 * @property int $author_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $author
 * @property RuleTemplate $ruleTemplate
 * @property Scene $scene
 * @property RuleParam[] $ruleParams
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
            ['author_id','default', 'value' =>Yii::$app->user->id],
            [['rule_template_id', 'scene_id', 'name', 'author_id'], 'required'],
            [['rule_template_id', 'scene_id', 'author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['rule_template_id'], 'exist', 'skipOnError' => true, 'targetClass' => RuleTemplate::class, 'targetAttribute' => ['rule_template_id' => 'id']],
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
            'rule_template_id' => Yii::t('app', 'Rule Template ID'),
            'scene_id' => Yii::t('app', 'Scene ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
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
     * Gets query for [[RuleTemplate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRuleTemplate()
    {
        return $this->hasOne(RuleTemplate::class, ['id' => 'rule_template_id']);
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

    /**
     * Gets query for [[RuleParams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRuleParams()
    {
        return $this->hasMany(RuleParam::class, ['rule_id' => 'id']);
    }
}
