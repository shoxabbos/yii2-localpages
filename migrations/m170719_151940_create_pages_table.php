<?php

use shoxabbos\localpages\Module;
use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m170719_151940_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(Module::$pagesTableName, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Module::$pagesTableName);
    }
}
