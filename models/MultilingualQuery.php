<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/18/17
 * Time: 12:03
 */

use yii\db\ActiveQuery;

class MultilingualQuery extends ActiveQuery
{
    use MultilingualTrait;
}