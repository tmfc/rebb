<?php
namespace app\models\behaviors;

use app\models\enums\EnableStatus;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class EnableStatusBehavior extends Behavior
{
    public $statusAttribute = 'status';

    public $statusValue = EnableStatus::ENABLED;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate'
        ];
    }

    public function beforeValidate($event)
    {
        $statusName = $this->statusAttribute;
        if (is_string($statusName)) {
            if ($this->owner->$statusName == null) {
                $this->owner->$statusName = $this->statusValue;
            }
            else {
                if(ArrayHelper::isIn($this->owner->$statusName, EnableStatus::getConstantsByName()))
                    return true;
                else
                    return false;
            }
        }
    }
}