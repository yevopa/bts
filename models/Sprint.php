<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sprint".
 *
 * @property int $id
 * @property string $name
 * @property int $version_id
 *
 * @property Version $version
 * @property Task[] $tasks
 */
class Sprint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sprint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['version_id'], 'exist', 'skipOnError' => true, 'targetClass' => Version::className(), 'targetAttribute' => ['version_id' => 'id']],
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
            'version_id' => 'Version ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVersion()
    {
        return $this->hasOne(Version::className(), ['id' => 'version_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['sprint_id' => 'id']);
    }
}
