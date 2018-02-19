<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teamusers".
 *
 * @property int $team_id
 * @property int $user_id
 * @property int $teamrole_id
 */
class Teamusers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teamusers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_id', 'user_id', 'teamrole_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'team_id' => 'Team ID',
            'user_id' => 'User ID',
            'teamrole_id' => 'Teamrole ID',
        ];
    }
}
