<?php

use yii\db\Migration;

/**
 * Class m180222_115155_addDescrToProject
 */
class m180222_115155_addDescrToProject extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('project', 'description', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('project', 'description');
    }
}
