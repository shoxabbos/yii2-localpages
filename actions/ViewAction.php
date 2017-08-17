<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/3/17
 * Time: 14:23
 */

namespace shoxabbos\localpages\actions;

use shoxabbos\localpages\models\Page;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class ViewAction extends Action {

    public $viewFile = "@vendor/shoxabbos/yii2-localpages/views/action/view";

    public function run($slug) {
        $page = Page::findOne(['slug' => $slug]);

        if (!$page) {
            throw new NotFoundHttpException("Page not found!");
        }

        return $this->controller->render($this->viewFile, [
            'model' => $page
        ]);
    }

}