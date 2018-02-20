<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taskstatus".
 *
 * @property int $id
 * @property string $name
 * @property int $finally
 *
 * @property Task[] $tasks
 */
class Taskstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taskstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['finally'], 'required'],
            [['finally'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'finally' => 'Finally',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['taskstatus_id' => 'id']);
    }
}
