<?php

use yii\db\Migration;

/**
 * Class m180219_203716_add_primary_key_to_teamusers
 */
class m180219_203716_add_primary_key_to_teamusers extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('teamusers', 'id', $this->integer(11)->notNull() . ' primary key AUTO_INCREMENT FIRST');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('teamusers', 'id');
    }
}
