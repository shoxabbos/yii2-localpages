<?php

namespace shoxabbos\localpages;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    public $defaultRoute = "page";

    /*
     * Pagelar tablitsasi nomi
     */
    public static $pagesTableName = "pages";


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
