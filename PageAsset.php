<?php

namespace shoxabbos\localpages;

use yii\web\AssetBundle;

/**
 * @author Shoxabbos
 */
class PageAsset extends AssetBundle
{
    public $sourcePath = __DIR__."/assets";

    public $js = [
        'js/tinymce/tinymce.min.js',
    ];
}
