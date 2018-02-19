<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teamrole".
 *
 * @property int $id
 * @property string $rolename
 *
 * @property Teamusers[] $teamusers
 */
class Teamrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teamrole';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rolename' => 'Rolename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamusers()
    {
        return $this->hasMany(Teamusers::className(), ['teamrole_id' => 'id']);
    }
}
