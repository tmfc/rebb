<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\User;

/**
 * This is the model class for table "biz_object".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $scene_id
 * @property string $definition
 * @property int $author_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $author
 * @property Scene $scene
 */
class BizObject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biz_object';
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
            [['name', 'scene_id', 'definition', 'author_id'], 'required'],
            [['scene_id', 'author_id'], 'integer'],
            [['definition'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
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
            'scene_id' => Yii::t('app', 'Scene ID'),
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
}
