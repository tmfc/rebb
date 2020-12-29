<?php

namespace app\models;

use app\models\enums\EnableStatus;
use common\models\User;
use cornernote\linkall\LinkAllBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "rule_group".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $scene_id
 * @property int $author_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $author
 * @property Scene $scene
 * @property Rule[] $rules
 */
class RuleGroup extends \yii\db\ActiveRecord
{

    public $rule_ids;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rule_group';
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
            LinkAllBehavior::class,
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
            ['author_id', 'default', 'value' => 1],
            ['rule_ids','safe'],
            [['name', 'description', 'status', 'scene_id', 'author_id'], 'required'],
            [['status', 'scene_id', 'author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            ['status', 'default', 'value' => EnableStatus::ENABLED],
            ['status', 'in', 'range' => EnableStatus::getConstantsByName()],
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
            'scene_id' => Yii::t('app', 'Scene ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function setStatus(EnableStatus $status)
    {
        $this->status = $status->getValue();
    }

    public function getStatus()
    {
        return $this->status;
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

   public function getRules()
   {
       return $this->hasMany(Rule::class, ['id' => 'rule_id'])
           ->viaTable('rule_group_rule', ['group_id' => 'id']);
   }

    public function afterSave($insert, $changedAttributes)
    {
        foreach ($this->rule_ids as $rule_id) {
                $rule = Rule::findOne($rule_id);
                if ($rule) {
                    $this->link('rules', $rule);
                }
        }

        parent::afterSave($insert, $changedAttributes);
    }
}
