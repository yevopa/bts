<?php

use yii\db\Migration;

/**
 * Class m180222_140356_addLogoColumnToProgect
 */
class m180222_140356_addLogoColumnToProgect extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('project', 'logo', 'LONGTEXT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('project', 'logo');
    }
}
