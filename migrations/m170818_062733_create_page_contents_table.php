<?php

use yii\db\Migration;
use shoxabbos\localpages\Module;

/**
 * Handles the creation of table `page_contents`.
 */
class m170818_062733_create_page_contents_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(Module::getInstance()->pagesContentTableName, [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-'.Module::getInstance()->pagesContentTableName.'-page_id',
            Module::getInstance()->pagesContentTableName,
            'page_id',
            Module::getInstance()->pagesTableName,
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Module::getInstance()->pagesContentTableName);
    }
}
