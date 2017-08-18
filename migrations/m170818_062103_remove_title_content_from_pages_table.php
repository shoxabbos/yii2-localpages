<?php

use yii\db\Migration;
use \shoxabbos\localpages\Module;

class m170818_062103_remove_title_content_from_pages_table extends Migration
{
    public function safeUp()
    {
        $this->dropColumn(Module::getInstance()->pagesTableName, "title");
        $this->dropColumn(Module::getInstance()->pagesTableName, "content");
    }

    public function safeDown()
    {
        $this->addColumn(Module::getInstance()->pagesTableName, "title", $this->string(255)->notNull());
        $this->addColumn(Module::getInstance()->pagesTableName, "content", $this->text()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170818_062103_remove_title_content_from_pages_table cannot be reverted.\n";

        return false;
    }
    */
}
