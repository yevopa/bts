<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "version".
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $description
 * @property string $create_date
 * @property string $finish_date
 */
class Version extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'version';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['description'], 'string'],
            [['create_date', 'finish_date'], 'safe'],
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
            'project_id' => 'Project ID',
            'name' => 'Name',
            'description' => 'Description',
            'create_date' => 'Create Date',
            'finish_date' => 'Release Date',
        ];
    }
}
