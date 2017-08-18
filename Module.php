<?php

namespace shoxabbos\localpages;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @var $langs array
     */
    public $langs;
    public $defaultLang;
    public $defaultRoute;
    public $pagesTableName;
    public $pagesContentTableName;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        \Yii::configure($this, require __DIR__ . '/config.php');
    }
    
    public static function config() {
        return require __DIR__ . '/config.php';
    }
    
}
