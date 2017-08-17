<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/13/17
 * Time: 20:21
 */

/**
 * @var $model \shoxabbos\localpages\models\Page
 */

$this->title = $model->title;
?>

<div class="container"><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> <?=$this->title?> </h2>
        </div>

        <div class="panel-body">
            <?=$model->content?>
        </div>
    </div>
</div>
